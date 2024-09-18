<x-mail::message>
# Deposit Confirmation

Hello {{ $deposit->user ? $deposit->user->f_name : 'User' }},

Your deposit request has been successfully received. Please wait for confirmation. Here are the details:

- **Amount**: {{ number_format($deposit->amount, 8) }} {{ strtoupper($deposit->deposit_method) }}
- **Deposit Method**: {{ strtoupper($deposit->deposit_method) }}
- **Transaction ID**: {{ $deposit->trx_id }}
- **Status**: {{ $deposit->deposit_status }}

You can track your deposit status from your dashboard.

<x-mail::button :url="url('/home')">
Go to Dashboard
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
