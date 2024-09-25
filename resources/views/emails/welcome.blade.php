<x-mail::message>
# Welcome to {{ config('app.name') }}

Hello {{ $user->f_name }},

We are excited to have you on board at **{{ config('app.name') }}**!

### **Action Required: Complete KYC Verification and Fund Your Trading Account**

Thank you for registering with **{{ config('app.name') }}**! We are thrilled to welcome you to our trading platform.

### **Complete Your KYC Verification**
Before you can fund your account and start trading, we kindly ask you to complete the **Know Your Customer (KYC)** verification process. This ensures the security of your account and compliance with global financial regulations.

**To Complete KYC Verification:**
1. Log in to your account: [Login Here]({{ url('/login') }})
2. Navigate to the "KYC Verification" section.
3. Upload the required documents:
   - Proof of Identity (e.g., passport, driver’s license)
   - Proof of Address (e.g., utility bill, bank statement)

Our compliance team will review your documents, and you will receive a confirmation once your account is verified.

### **Fund Your Account**
Once your KYC verification is complete, you can proceed to fund your trading account by following the steps below:

1. Go to the "Deposit Funds" section.
2. Select your preferred payment method.
3. Enter the deposit amount.
4. Complete the transaction.

Once your account is funded, you'll be ready to start trading and explore the wide range of opportunities we offer.

---

### **Need Assistance?**
If you have any questions regarding the KYC process or need help funding your account, please contact us at [support@ezracapitalfxlive.com](mailto:support@ezracapitalfxlive.com).

We appreciate your cooperation and look forward to helping you on your trading journey.

Best regards,
The **{{ config('app.name') }}** Team
</x-mail::message>
