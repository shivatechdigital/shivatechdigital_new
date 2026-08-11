<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
</head>
<body style="margin:0;padding:0;background:#f3f7ff;font-family:Arial,Helvetica,sans-serif;color:#0f172a;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background:#f3f7ff;padding:24px 0;">
        <tr>
            <td align="center">
                <table width="640" cellpadding="0" cellspacing="0" style="max-width:640px;background:#ffffff;border:1px solid #dbeafe;border-radius:14px;overflow:hidden;">
                    <tr>
                        <td style="background:linear-gradient(135deg,#1d4ed8,#0f766e);padding:24px 28px;color:#ffffff;">
                            <h1 style="margin:0;font-size:24px;line-height:1.3;">Shiva Tech Digital</h1>
                            <p style="margin:8px 0 0;font-size:14px;opacity:.92;">Email Verification</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:28px;">
                            <p style="margin:0 0 14px;font-size:15px;line-height:1.7;">Hello {{ $name }},</p>
                            <p style="margin:0 0 14px;font-size:15px;line-height:1.7;">Thanks for signing up. Please verify your email address to activate your account.</p>
                            <p style="margin:20px 0;">
                                <a href="{{ $verificationUrl }}" style="display:inline-block;padding:12px 20px;background:#1d4ed8;color:#ffffff;text-decoration:none;border-radius:10px;font-weight:700;font-size:14px;">Verify Email Address</a>
                            </p>
                            <p style="margin:0 0 10px;font-size:14px;line-height:1.7;color:#475569;">If the button does not work, copy and paste this URL in your browser:</p>
                            <p style="margin:0;word-break:break-all;font-size:13px;line-height:1.6;color:#0f172a;">{{ $verificationUrl }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:16px 28px;border-top:1px solid #e2e8f0;color:#64748b;font-size:12px;line-height:1.6;">
                            If you did not create this account, you can safely ignore this email.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
