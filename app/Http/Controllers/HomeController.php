<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOtpMail;
use App\Mail\WelcomeEmail;
use App\Mail\KycVerifyMail;
use App\Models\KycVerify;
use App\Models\UserPlan;
use App\Models\Wallet;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Trade;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Mail\DepositConfirmationMail;
use Illuminate\Support\Facades\DB; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getCryptoPrices()
    {
        try {
            // Check if prices are cached
            $cryptoData = Cache::remember('crypto_prices', 60, function () {
                // Fetch from API with a longer timeout
                $response = Http::timeout(30)->get('https://api.coingecko.com/api/v3/simple/price', [
                    'ids' => 'bitcoin,ethereum,tether',
                    'vs_currencies' => 'gbp',
                ]);

                // Log the response body for debugging
                \Log::info('API Response:', ['response' => $response->body()]);

                // Check if response is JSON
                if ($response->ok()) {
                    $json = $response->json(); // Try parsing JSON
                    return $json;
                } else {
                    throw new \Exception('Unable to fetch data from the API');
                }
            });

            return response()->json($cryptoData);

        } catch (\Exception $e) {
            \Log::error('Error fetching crypto prices:', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        $user = Auth::user();

        $kyc = KycVerify::where('user_id', $user->id)->first();
        $user_balance = Deposit::where('user_id', $user->id)->where('deposit_status', 'confirmed')->first();

        $status = $kyc ? $kyc->status : 'pending';

        $user_trades_open = Trade::where('user_id', $user->id)->where('trade_status', 'open')->get();
        $user_trades_closed = Trade::where('user_id', $user->id)->where('trade_status', 'closed')->get();

        return view('user.home', [
            'status' => $status,
            'user_balance' => $user_balance,
            'user_trades_open' => $user_trades_open,
            'user_trades_closed' => $user_trades_closed,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function copyTrading(): View
    {
        $user = Auth::user();

        $user_balance = Deposit::where('user_id', $user->id)->first();

        return view('copy-trading', [
            'user_balance' => $user_balance,
        ]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function openTrades(): View
    {
        return view('open-trade');
    }
    public function closedTrades(): View
    {
        return view('close-trade');
    }
    public function miningHome(): View
    {
        return view('mining');
    }
    public function miningPlans(): View
    {
        return view('mining-plans');
    }
    public function userAccount(): View
    {
        return view('user.profile.index');
    }
    /**
     * Show the OTP verification form.
     */
    public function showOtpForm()
    {
        return view('auth.otp-verify');
    }

    /**
     * Verify the OTP.
     */
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric|digits:6',
        ]);

        $user = Auth::user();

        // Check if the OTP is correct
        if ($user->otp == $request->otp) {
            // Check if the OTP has expired
            $otpSentAt = $user->otp_sent_at;
            $otpExpirationTime = Carbon::parse($otpSentAt)->addMinutes(10);

            if (Carbon::now()->gt($otpExpirationTime)) {
                // OTP expired
                return back()->withErrors(['otp' => 'The OTP has expired. Please request a new one.']);
            }

            // Mark OTP as verified
            $user->otp_verified = true;
            $user->save();

            // Send welcome email
            Mail::to($user->email)->queue(new WelcomeEmail($user));

            return redirect()->route('home')->with('success', 'OTP verified successfully.');
        }

        return back()->withErrors(['otp' => 'The OTP you entered is incorrect.']);
    }

    public function requestOtp()
    {
        $user = Auth::user();

        // Convert otp_sent_at to a Carbon instance
        $otpSentAt = $user->otp_sent_at ? Carbon::parse($user->otp_sent_at) : null;

        // Check if the OTP was sent within the last 10 minutes
        if ($otpSentAt && $otpSentAt->gt(Carbon::now()->subMinutes(10))) {
            // Resend the last OTP
            Mail::to($user->email)->queue(new SendOtpMail($user->otp));
        } else {
            // Generate a new OTP
            $otp = mt_rand(100000, 999999);
            $user->otp = $otp;
            $user->otp_sent_at = Carbon::now(); // Update the OTP sent timestamp
            $user->save();

            // Send the new OTP
            Mail::to($user->email)->queue(new SendOtpMail($otp));
        }

        return back()->with('status', 'OTP has been sent to your email.');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $users = User::where('type', 0)->get();
        $revenue = Deposit::where('deposit_status', 'confirmed')->sum('amount');
        $countPlans = UserPlan::where('status', 'Active')->count();
        $countUsers = User::where('type', 0)->count();
        $viewOrders = UserPlan::all();
        return view('admin.home', compact('users', 'viewOrders', 'countUsers', 'countPlans', 'revenue'));
    }
    public function userDeposit()
    {
        $deposits = Deposit::get();
        return view('admin.deposits', compact('deposits'));
    }
    public function updateStatus(Request $request)
    {
        // Validate the input
        $request->validate([
            'id' => 'required|exists:deposits,id',
            'deposit_status' => 'required|string|in:confirmed,unconfirmed',
        ]);

        // Find the deposit record
        $deposit = Deposit::find($request->id);

        // Update the deposit status
        $deposit->deposit_status = $request->deposit_status;
        $deposit->save();

        // Check if status is confirmed
        if ($request->deposit_status == 'confirmed') {
            // Fetch the user's email using the user_id from the deposits table
            $user = $deposit->user; // Assuming there is a relationship defined in the Deposit model

            // Send a confirmation email
            Mail::to($user->email)->queue(new DepositConfirmationMail($deposit));
        }

        return response()->json(['success' => true, 'message' => 'Deposit status updated successfully.']);
    }
    public function viewWallets()
    {
        $wallets = Wallet::get();

        return view('admin.wallet-address', compact('wallets'));
    }
    public function saveWallet(Request $request)
    {
        $request->validate([
            'qr_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'wallet_name' => 'required|string',
            'wallet_address' => 'required|string',
        ]);

        $wallet = new Wallet();
        $wallet->wallet_name = $request->wallet_name;
        $wallet->wallet_address = $request->wallet_address;
        if ($request->hasFile('qr_image')) {
            $image = $request->file('qr_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $imageName);
            $wallet->qr_image = 'uploads/' . $imageName;
        }
        $wallet->save();

        return response()->json(['success' => true, 'message' => 'Wallet saved successfully.']);
    }
    public function deleteWallet(string $id)
    {
        $wallet = Wallet::findOrFail($id);
        $wallet->delete();
        return back();
    }
    public function viewUsers()
    {
        $users = User::where('type', 0)->get();
        return view('admin.users', compact('users'));
    }
    public function deleteUser(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back();
    }
    public function viewUsersKYC()
    {
        $userskyc = KycVerify::get();
        return view('admin.kyc-verification', compact('userskyc'));
    }
    public function verifyKYC(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:kyc_verifies,id',
            'status' => 'required|string|in:pending,verified,rejected',
        ]);

        $kyc = KycVerify::find($request->id);
        $previousStatus = $kyc->status;  // Capture the previous status

        $kyc->status = $request->status;
        $kyc->save();

        // Send email only if the status changes to 'verified' or 'rejected'
        if ($previousStatus !== $request->status) {
            $user = $kyc->user();

            if ($user) {
                Mail::to($user->email)->queue(new KycVerifyMail($request->status, $user->f_name));
            }
        }

        return response()->json(['success' => true, 'message' => 'KYC status updated successfully.']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome(): View
    {
        return view('manager.home');
    }
}
