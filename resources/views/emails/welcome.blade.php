<x-mail::message>
# Welcome to {{ config('app.name') }}

Hello {{ $user->f_name }},

We are excited to have you on board at **{{ config('app.name') }}**! If you have any questions, feel free to contact us anytime.

Best regards,  
The {{ config('app.name') }} Team
</x-mail::message>
