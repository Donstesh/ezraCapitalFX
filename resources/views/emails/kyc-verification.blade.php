<x-mail::message>
# KYC Status Update

Hello {{ $userName }},

Your KYC has been {{ $status }}.

<x-mail::button :url="url('/home')">
View Details
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
