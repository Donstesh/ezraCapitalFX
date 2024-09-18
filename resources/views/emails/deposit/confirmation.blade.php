<x-mail::message>
# Deposit Confirmation

Hello {{ $deposit->user ? $deposit->user->f_name : 'User' }},

We are pleased to inform you that your deposit with the Transaction ID **{{ $deposit->trx_id }}** has been successfully confirmed.

### Deposit Details:
- **Amount**: {{ $deposit->amount }} {{ strtoupper($deposit->deposit_method) }}
- **Status**: Confirmed
- **Date**: {{ $deposit->created_at->format('Y-m-d H:i:s') }}

<x-mail::button :url="url('/home')">
View Deposit
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
