<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verify Email | Shiva Tech Digital</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            display: grid;
            place-items: center;
            padding: 18px;
            background: linear-gradient(135deg, #0f172a, #1e3a8a, #0f766e);
        }
        .box {
            width: min(560px, 100%);
            background: #fff;
            border-radius: 18px;
            padding: 28px;
            box-shadow: 0 22px 60px rgba(2, 8, 23, .4);
            text-align: center;
        }
        h1 { margin: 0 0 10px; color: #0f172a; font-size: 1.55rem; }
        p { margin: 0 0 14px; color: #475569; line-height: 1.7; font-size: .95rem; }
        .ok {
            border: 1px solid #bbf7d0;
            background: #f0fdf4;
            color: #166534;
            border-radius: 10px;
            padding: 9px 11px;
            margin-bottom: 12px;
            font-size: .88rem;
        }
        .btn {
            width: 100%;
            border: 0;
            border-radius: 12px;
            padding: 12px;
            font-weight: 700;
            cursor: pointer;
        }
        .btn-primary {
            color: #fff;
            background: linear-gradient(135deg, #1d4ed8, #0f766e);
            margin-bottom: 10px;
        }
        .btn-ghost {
            background: #f8fafc;
            color: #334155;
            border: 1px solid #cbd5e1;
        }
    </style>
</head>
<body>
    <div class="box">
        <h1>Verify Your Email</h1>
        <p>Please verify your email address by clicking on the link we just sent to your inbox.</p>

        @if (session('status') == 'verification-link-sent')
            <div class="ok">A new verification link has been sent to your email address.</div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-primary">Resend Verification Email</button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-ghost" data-test="logout-button">Log out</button>
        </form>
    </div>
</body>
</html>
