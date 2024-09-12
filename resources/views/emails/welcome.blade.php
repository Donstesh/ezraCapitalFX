<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <p>Hello {{ $user->f_name }},</p>
    <p>Welcome to {{ config('app.name') }}!</p>
    <p>We are excited to have you on board. If you have any questions, feel free to contact us.</p>
    <p>Best regards,<br>{{ config('app.name') }} Team</p>
</body>
</html>
