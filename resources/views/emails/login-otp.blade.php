<!DOCTYPE html>
<html>
<head>
    <title>OTP Verification</title>
</head>
<body style="font-family:Arial;background:#f4f4f4;padding:20px;">

<div style="max-width:500px;margin:auto;background:#fff;padding:30px;border-radius:10px;text-align:center;box-shadow:0 2px 10px rgba(0,0,0,0.1);">

    <h2>Login OTP Verification</h2>

    <p>Your login OTP is:</p>

    <div style="background:#007bff;color:white;padding:15px 25px;border-radius:8px;font-size:28px;font-weight:bold;display:inline-block;">
        {{ $otp }}
    </div>

    <p style="margin-top:20px;color:#666;">
        OTP valid for 5 minutes
    </p>

</div>

</body>
</html>