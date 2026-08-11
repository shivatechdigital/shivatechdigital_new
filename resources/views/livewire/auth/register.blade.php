<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Shiva Tech Digital</title>
    <style>
        :root {
            --ink: #0f172a;
            --muted: #5b6474;
            --line: #d8deea;
            --brand-a: #0f766e;
            --brand-b: #1d4ed8;
            --brand-c: #ea580c;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            background:
                radial-gradient(circle at 14% 16%, rgba(234,88,12,.24), transparent 35%),
                radial-gradient(circle at 86% 20%, rgba(29,78,216,.26), transparent 36%),
                linear-gradient(140deg, #0f172a 0%, #1e3a8a 42%, #0f766e 100%);
            display: grid;
            place-items: center;
            padding: 28px 16px;
        }
        .shell {
            width: min(1040px, 100%);
            display: grid;
            grid-template-columns: 1fr 1fr;
            border-radius: 24px;
            overflow: hidden;
            background: #ffffff;
            box-shadow: 0 26px 84px rgba(2, 8, 23, .46);
        }
        .promo {
            padding: 42px;
            color: #eef6ff;
            background:
                linear-gradient(165deg, rgba(3,7,18,.88), rgba(30,64,175,.84)),
                url('https://images.unsplash.com/photo-1551434678-e076c223a692?w=1400&q=80') center/cover no-repeat;
            display: grid;
            align-content: space-between;
            gap: 18px;
        }
        .badge {
            display: inline-flex;
            width: fit-content;
            padding: 6px 12px;
            border-radius: 999px;
            border: 1px solid rgba(255,255,255,.35);
            font-size: .76rem;
            letter-spacing: .6px;
            text-transform: uppercase;
            font-weight: 700;
        }
        .promo h2 { margin: 0; font-size: clamp(1.65rem, 3vw, 2.2rem); line-height: 1.2; }
        .promo p { margin: 0; color: rgba(255,255,255,.82); line-height: 1.68; }
        .list { margin: 0; padding-left: 18px; color: rgba(255,255,255,.88); line-height: 1.7; font-size: .92rem; }

        .panel { padding: 38px 34px; }
        .brand { font-weight: 800; color: var(--ink); text-decoration: none; letter-spacing: .2px; }
        .title { margin: 18px 0 8px; font-size: 1.7rem; color: var(--ink); }
        .sub { margin: 0 0 20px; color: var(--muted); font-size: .93rem; }

        .alert {
            border-radius: 12px;
            padding: 10px 12px;
            margin-bottom: 14px;
            font-size: .86rem;
            border: 1px solid;
        }
        .alert.error { border-color: #fecaca; background: #fff1f2; color: #9f1239; }
        .alert.ok { border-color: #bbf7d0; background: #f0fdf4; color: #166534; }

        .grid { display: grid; gap: 12px; }
        .field label { display: block; font-size: .84rem; font-weight: 700; color: #243449; margin-bottom: 6px; }
        .field input {
            width: 100%;
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 12px 13px;
            font-size: .94rem;
            transition: .2s;
        }
        .field input:focus {
            outline: none;
            border-color: var(--brand-b);
            box-shadow: 0 0 0 3px rgba(29,78,216,.14);
        }

        .btn {
            margin-top: 6px;
            width: 100%;
            border: 0;
            border-radius: 12px;
            padding: 12px 14px;
            background: linear-gradient(135deg, #1d4ed8, #0f766e);
            color: #fff;
            font-weight: 800;
            cursor: pointer;
            box-shadow: 0 10px 26px rgba(15,118,110,.3);
            transition: transform .2s, box-shadow .2s;
        }
        .btn:hover { transform: translateY(-1px); box-shadow: 0 14px 30px rgba(15,118,110,.34); }

        .foot { margin-top: 14px; text-align: center; font-size: .88rem; color: var(--muted); }
        .foot a { color: #1d4ed8; text-decoration: none; font-weight: 700; }

        @media (max-width: 980px) {
            .shell { grid-template-columns: 1fr; }
            .promo { padding: 26px; }
            .panel { padding: 30px 20px; }
        }
    </style>
</head>
<body>
    <section class="shell">
        <aside class="promo">
            <div>
                <span class="badge">Join The Portal</span>
                <h2>Create Your Account and Start Tracking Project Progress</h2>
                <p>Register karke aap project updates, deliverables aur team communication ko single dashboard me manage kar sakte hain.</p>
            </div>
            <ul class="list">
                <li>Live project status and timeline</li>
                <li>Milestone-wise updates from team</li>
                <li>Priority support for active clients</li>
            </ul>
        </aside>

        <main class="panel">
            <a class="brand" href="{{ route('home') }}">Shiva Tech Digital</a>
            <h1 class="title">Create an account</h1>
            <p class="sub">Fill your details below to continue.</p>

            @if (session('status'))
                <div class="alert ok">{{ session('status') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert error">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('register.store') }}" class="grid">
                @csrf

                <div class="field">
                    <label for="name">Full name</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Your full name">
                </div>

                <div class="field">
                    <label for="email">Email address</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email" placeholder="name@company.com">
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" required autocomplete="new-password" placeholder="Create strong password">
                </div>

                <div class="field">
                    <label for="password_confirmation">Confirm password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" placeholder="Re-enter password">
                </div>

                <button class="btn" type="submit" data-test="register-user-button">Create Account</button>
            </form>

            <p class="foot">Already registered? <a href="{{ route('login') }}">Log in now</a></p>
        </main>
    </section>
</body>
</html>
