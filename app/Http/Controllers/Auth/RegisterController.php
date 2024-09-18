<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOtpMail; // Import the SendOtpMail Mailable

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        // Step 1: Generate a 6-digit OTP
        $otp = mt_rand(100000, 999999);

        // Step 2: Create the user in the database and store the OTP
        $user = User::create([
            'f_name' => $data['f_name'],
            'm_name' => $data['m_name'] ?? null,  // Optional middle name
            'l_name' => $data['l_name'],
            'country' => $data['country'],
            'city' => $data['city'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'type' => 0,
            'otp' => $otp, // Save the OTP in the database
            'password' => Hash::make($data['password']),
        ]);

        // Step 3: Send the OTP to the user's email via queue
        Mail::to($user->email)->queue(new SendOtpMail($otp));

        return $user;
    }
}
