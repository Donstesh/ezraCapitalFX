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
use App\Models\EmailTemplate;
use App\Models\Trade;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Mail\DepositConfirmationMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Log;

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
    public function triggerQueue()
    {
        Artisan::call('queue:work --queue=default --once');
        return response()->json(['status' => 'Queue processed']);
    }

    // public function getCryptoPrices()
    // {
    //     try {
    //         // Check if prices are cached
    //         $cryptoData = Cache::remember('crypto_prices', 60, function () {
    //             // Fetch from API with a longer timeout
    //             $response = Http::timeout(30)->get('https://api.coingecko.com/api/v3/simple/price', [
    //                 'ids' => 'bitcoin,ethereum,tether',
    //                 'vs_currencies' => 'gbp',
    //             ]);

    //             // Log the response body for debugging
    //             \Log::info('API Response:', ['response' => $response->body()]);

    //             // Check if response is JSON
    //             if ($response->ok()) {
    //                 $json = $response->json(); // Try parsing JSON
    //                 return $json;
    //             } else {
    //                 throw new \Exception('Unable to fetch data from the API');
    //             }
    //         });

    //         return response()->json($cryptoData);

    //     } catch (\Exception $e) {
    //         \Log::error('Error fetching crypto prices:', ['error' => $e->getMessage()]);
    //         return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
    //     }
    // }

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
                    return $response->json(); // Return the decoded JSON directly
                } else {
                    throw new \Exception('Unable to fetch data from the API');
                }
            });

            return $cryptoData; // Return the cached data directly

        } catch (\Exception $e) {
            \Log::error('Error fetching crypto prices:', ['error' => $e->getMessage()]);
            return null; // Return null in case of error
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
            Mail::to($user->email)->send(new WelcomeEmail($user));

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
            Mail::to($user->email)->send(new SendOtpMail($user->otp));

            // Log the resend action
            Log::info('OTP resent to user.', [
                'user_id' => $user->id,
                'email' => $user->email,
                'otp' => $user->otp,
                'otp_sent_at' => $otpSentAt->toDateTimeString(),
            ]);
        } else {
            // Generate a new OTP
            $otp = mt_rand(100000, 999999);
            $user->otp = $otp;
            $user->otp_sent_at = Carbon::now(); // Update the OTP sent timestamp
            $user->save();

            // Send the new OTP
            Mail::to($user->email)->send(new SendOtpMail($otp));

            // Log the new OTP generation and email sent
            Log::info('New OTP generated and sent to user.', [
                'user_id' => $user->id,
                'email' => $user->email,
                'otp' => $otp,
                'otp_sent_at' => $user->otp_sent_at->toDateTimeString(),
            ]);
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
            Mail::to($user->email)->send(new DepositConfirmationMail($deposit));
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
        if ($previousStatus !== $request->status && in_array($request->status, ['verified', 'rejected'])) {
            // Send the email using the email field in KycVerify
            $userEmail = $kyc->email;
            $userName = $kyc->f_name;  // Assuming f_name is the user's first name

            if ($userEmail) {
                try {
                    // Send the email with the updated status
                    Mail::to($userEmail)->send(new KycVerifyMail($request->status, $userName));
                    Log::info('KYC status email sent successfully', ['email' => $userEmail, 'status' => $request->status]);
                } catch (\Exception $e) {
                    // Log the error if email sending fails
                    Log::error('Failed to send KYC status email', [
                        'email' => $userEmail,
                        'status' => $request->status,
                        'error' => $e->getMessage(),
                    ]);
                }
            }
        }

        return response()->json(['success' => true, 'message' => 'KYC status updated successfully.']);
    }
    public function getUser($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }
    public function storeEmail(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'userEmail' => 'required|email',
            'userFullName' => 'required|string', // Validate that userFullName is required
            'recipientId' => 'required|exists:users,id',
        ]);

        // Save email template with mass assignment
        $emailTemplate = EmailTemplate::create([
            'subject' => $request->input('title'),
            'body' => $request->input('description'),
            'user_id' => $request->input('recipientId'), // Save the recipient's user ID
            'user_email' => $request->input('userEmail'),
            'user_full_name' => $request->input('userFullName'), // Make sure to store the full name
        ]);

        // Send the email
        Mail::raw($request->input('description'), function ($message) use ($emailTemplate) {
            $message->to($emailTemplate->user_email)
                    ->subject($emailTemplate->subject);
        });

        return response()->json(['message' => 'Email sent successfully!']);
    }

    public function generateTrxId()
    {
        $numbers = strtoupper(substr(str_shuffle('0123456789'), 0, 4));
        $letters = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3));
        return 'DEP-' . $numbers . '-' . $letters;
    }
    public function storeDirectBalance(Request $request)
    {
        // Validate request data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount_in_gbp' => 'required|numeric',
        ]);

        // Fetch the current Bitcoin price in GBP
        $cryptoPrices = $this->getCryptoPrices(); // Call your method to get crypto prices

        // Check if we successfully fetched the prices
        if ($cryptoPrices === null || !isset($cryptoPrices['bitcoin']['gbp'])) {
            return response()->json(['error' => 'Unable to fetch Bitcoin price.'], 500);
        }

        // Get BTC price from the response
        $btcPriceInGbp = $cryptoPrices['bitcoin']['gbp'];

        // Calculate the amount in BTC
        $amountInBtc = $request->amount_in_gbp / $btcPriceInGbp; // Convert GBP to BTC

        // Create a new deposit entry
        $deposit = new Deposit();
        $deposit->user_id = $request->user_id;
        $deposit->deposit_method = 'direct_deposit';
        $deposit->amount_in_gbp = $request->amount_in_gbp;
        $deposit->amount = $amountInBtc; // Store the calculated BTC amount
        $deposit->trx_id = $this->generateTrxId(); // Call the function here
        $deposit->deposit_status = 'confirmed'; // or whatever logic you need

        // Save the deposit
        $deposit->save();

        return response()->json(['message' => 'Balance added successfully.']);
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
