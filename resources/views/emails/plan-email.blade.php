<x-mail::message>
# Plan Purchase Confirmation

Hello, you have successfully purchased the following plan:

**Plan Name:** {{ $planDetails['plan_selected'] }}  
**Amount:** {{ $planDetails['plan_amount'] }}  
**Option:** {{ $planDetails['plan_option'] }}  
**Status:** {{ $planDetails['status'] }}

Thank you for choosing our service!

<x-mail::button :url="url('/home')">
Visit Your Account
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
