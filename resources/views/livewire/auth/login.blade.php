<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Shiva Tech Digital</title>
    <style>
        :root {
            --ink: #0f172a;
            --muted: #5b6474;
            --line: #d8deea;
            --brand-a: #0f766e;
            --brand-b: #1d4ed8;
            --brand-c: #f59e0b;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            background:
                radial-gradient(circle at 12% 20%, rgba(245,158,11,.24), transparent 35%),
                radial-gradient(circle at 88% 15%, rgba(29,78,216,.28), transparent 38%),
                linear-gradient(145deg, #0b1325 0%, #112b58 44%, #0f766e 100%);
            display: grid;
            place-items: center;
            padding: 28px 16px;
        }
        .shell {
            width: min(980px, 100%);
            display: grid;
            grid-template-columns: 1.1fr .9fr;
            border-radius: 24px;
            overflow: hidden;
            background: #ffffff;
            box-shadow: 0 24px 80px rgba(2, 8, 23, .45);
        }
        .promo {
            padding: 44px;
            color: #eef6ff;
            background:
                linear-gradient(165deg, rgba(3,7,18,.88), rgba(15,118,110,.85)),
                url('https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1400&q=80') center/cover no-repeat;
            display: grid;
            align-content: space-between;
            gap: 20px;
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
        .promo h2 { margin: 0; font-size: clamp(1.7rem, 3vw, 2.3rem); line-height: 1.2; }
        .promo p { margin: 0; color: rgba(255,255,255,.82); line-height: 1.7; }
        .stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; }
        .stat { border: 1px solid rgba(255,255,255,.24); border-radius: 12px; padding: 12px; background: rgba(255,255,255,.08); }
        .stat strong { display: block; font-size: 1.1rem; }
        .stat span { font-size: .74rem; opacity: .85; }

        .panel { padding: 40px 34px; }
        .brand { font-weight: 800; color: var(--ink); text-decoration: none; letter-spacing: .2px; }
        .title { margin: 18px 0 8px; font-size: 1.7rem; color: var(--ink); }
        .sub { margin: 0 0 22px; color: var(--muted); font-size: .93rem; }

        .alert {
            border-radius: 12px;
            padding: 10px 12px;
            margin-bottom: 14px;
            font-size: .86rem;
            border: 1px solid;
        }
        .alert.error { border-color: #fecaca; background: #fff1f2; color: #9f1239; }
        .alert.ok { border-color: #bbf7d0; background: #f0fdf4; color: #166534; }

        .field { margin-bottom: 13px; }
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

        .meta { display: flex; justify-content: space-between; align-items: center; margin: 6px 0 18px; font-size: .86rem; }
        .meta a { color: #1d4ed8; text-decoration: none; }
        .meta a:hover { text-decoration: underline; }

        .btn {
            width: 100%;
            border: 0;
            border-radius: 12px;
            padding: 12px 14px;
            background: linear-gradient(135deg, var(--brand-b), #2563eb);
            color: #fff;
            font-weight: 800;
            cursor: pointer;
            box-shadow: 0 10px 26px rgba(37,99,235,.3);
            transition: transform .2s, box-shadow .2s;
        }
        .btn:hover { transform: translateY(-1px); box-shadow: 0 14px 28px rgba(37,99,235,.34); }

        .foot { margin-top: 14px; text-align: center; font-size: .88rem; color: var(--muted); }
        .foot a { color: #1d4ed8; text-decoration: none; font-weight: 700; }

        @media (max-width: 900px) {
            .shell { grid-template-columns: 1fr; }
            .promo { padding: 28px; }
            .panel { padding: 30px 20px; }
        }
    </style>
</head>
<body>
    <section class="shell">
        <aside class="promo">
            <div>
                <span class="badge">Client Portal</span>
                <h2>Track Projects, Updates, and Deliverables in One Place</h2>
                <p>Welcome back. Login karke apne ongoing project ka progress, ETA, aur latest team notes dekh sakte hain.</p>
            </div>
            <div class="stats">
                <div class="stat"><strong>50+</strong><span>Projects</span></div>
                <div class="stat"><strong>4.9/5</strong><span>Client Rating</span></div>
                <div class="stat"><strong>24x7</strong><span>Support</span></div>
            </div>
        </aside>

        <main class="panel">
            <a class="brand" href="{{ route('home') }}">Shiva Tech Digital</a>
            <h1 class="title">Log in to your account</h1>
            <p class="sub">Enter your email and password below to continue.</p>

            @if (session('status'))
                <div class="alert ok">{{ session('status') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert error">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('login.store') }}">
                @csrf

                <div class="field">
                    <label for="email">Email address</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="email" placeholder="name@company.com">
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" required autocomplete="current-password" placeholder="Enter your password">
                </div>

                <div class="meta">
                    <label style="display:flex;gap:8px;align-items:center;color:#334155;">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        Remember me
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Forgot password?</a>
                    @endif
                </div>

                <button class="btn" type="submit" data-test="login-button">Login Securely</button>
            </form>

            @if (Route::has('register'))
                <p class="foot">New here? <a href="{{ route('register') }}">Create an account</a></p>
            @endif
        </main>
    </section>
</body>
</html>
