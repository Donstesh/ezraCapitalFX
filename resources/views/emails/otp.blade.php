<x-mail::message>
# Your One-Time Password (OTP)

Hello,

Your one-time password (OTP) is: **{{ $otp }}**

This OTP will expire in 10 minutes. Please use it to complete your registration.

<x-mail::button :url="url('/home')">
Complete Registration
</x-mail::button>

Thanks,  
{{ config('app.name') }}
</x-mail::message>
