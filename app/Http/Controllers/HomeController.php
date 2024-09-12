<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOtpMail;
use App\Mail\WelcomeEmail;
use Carbon\Carbon;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        return view('user.home');
    }
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function plansList(): View
    {
        return view('plans');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function copyTrading(): View
    {
        return view('copy-trading');
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
        } else {
            // Generate a new OTP
            $otp = mt_rand(100000, 999999);
            $user->otp = $otp;
            $user->otp_sent_at = Carbon::now(); // Update the OTP sent timestamp
            $user->save();

            // Send the new OTP
            Mail::to($user->email)->send(new SendOtpMail($otp));
        }

        return back()->with('status', 'OTP has been sent to your email.');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome(): View
    {
        return view('admin.home');
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
