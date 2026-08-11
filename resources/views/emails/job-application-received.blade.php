<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Received</title>
</head>
<body style="font-family:Arial,Helvetica,sans-serif;background:#f6f9ff;padding:20px;color:#0f172a;">
    <div style="max-width:640px;margin:0 auto;background:#fff;border:1px solid #dbeafe;border-radius:12px;overflow:hidden;">
        <div style="padding:18px 22px;background:linear-gradient(135deg,#1d4ed8,#0f766e);color:#fff;">
            <h2 style="margin:0;font-size:22px;">Shiva Tech Digital</h2>
            <p style="margin:6px 0 0;font-size:13px;opacity:.95;">Job Application Confirmation</p>
        </div>
        <div style="padding:20px 22px;line-height:1.7;font-size:14px;">
            <p>Hello {{ $application->name }},</p>
            <p>Your application has been submitted successfully.</p>
            <p><strong>Company:</strong> Shiva Tech Digital</p>
            <p><strong>Job Title:</strong> {{ $job?->title ?? 'N/A' }}</p>
            <p><strong>Description:</strong> {{ $job?->summary ?? 'Thank you for applying to our team.' }}</p>
            <p>Thank you so much for taking interest. Our team will connect with you shortly.</p>
        </div>
    </div>
</body>
</html>
