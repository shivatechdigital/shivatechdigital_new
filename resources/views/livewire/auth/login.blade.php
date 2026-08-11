<x-layouts.auth>
    <style>
        .auth-card { border: 1px solid #e2e8f0; border-radius: 16px; padding: 24px; background: #fff; }
        .auth-title { font-size: 1.6rem; font-weight: 800; color: #0f172a; margin: 0 0 6px; }
        .auth-sub { color: #64748b; margin: 0 0 18px; font-size: .92rem; }
        .auth-label { display: block; font-weight: 600; color: #334155; margin-bottom: 6px; font-size: .86rem; }
        .auth-input { width: 100%; border: 1px solid #cbd5e1; border-radius: 10px; padding: 11px 12px; font-size: .95rem; }
        .auth-input:focus { outline: none; border-color: #2563eb; box-shadow: 0 0 0 3px rgba(37,99,235,.15); }
        .auth-row { margin-bottom: 14px; }
        .auth-btn { width: 100%; border: 0; border-radius: 10px; background: #2563eb; color: #fff; padding: 12px; font-weight: 700; cursor: pointer; }
        .auth-btn:hover { background: #1d4ed8; }
        .auth-help { display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; font-size: .88rem; }
        .auth-error { border: 1px solid #fecaca; background: #fef2f2; color: #b91c1c; padding: 10px 12px; border-radius: 10px; margin-bottom: 14px; font-size: .86rem; }
    </style>

    <div class="auth-card">
        <h1 class="auth-title">Log in to your account</h1>
        <p class="auth-sub">Enter your email and password below to log in.</p>

        @if (session('status'))
            <div class="auth-error" style="border-color:#bbf7d0;background:#f0fdf4;color:#166534;">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="auth-error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <div class="auth-row">
                <label class="auth-label" for="email">Email address</label>
                <input class="auth-input" id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="email" placeholder="email@example.com">
            </div>

            <div class="auth-row">
                <label class="auth-label" for="password">Password</label>
                <input class="auth-input" id="password" name="password" type="password" required autocomplete="current-password" placeholder="Password">
            </div>

            <div class="auth-help">
                <label style="display:flex;align-items:center;gap:8px;color:#475569;">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    Remember me
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="color:#2563eb;text-decoration:none;">Forgot your password?</a>
                @endif
            </div>

            <button class="auth-btn" type="submit" data-test="login-button">Log in</button>
        </form>

        @if (Route::has('register'))
            <p style="margin:14px 0 0;text-align:center;color:#64748b;font-size:.88rem;">
                Don't have an account?
                <a href="{{ route('register') }}" style="color:#2563eb;text-decoration:none;">Sign up</a>
            </p>
        @endif
    </div>
</x-layouts.auth>
