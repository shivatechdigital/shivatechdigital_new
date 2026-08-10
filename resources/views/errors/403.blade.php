<!doctype html>
@php
    $locale = app()->getLocale();
    $isHindi = strpos($locale, 'hi') === 0;
@endphp
<html lang="{{ $isHindi ? 'hi' : 'en' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $isHindi ? '403 | पहुंच निषेध' : '403 | Access Denied' }}</title>
    <style>
        :root {
            --bg: #f5f7fb;
            --card: #ffffff;
            --text: #152238;
            --muted: #5b6b82;
            --accent: #c62828;
            --btn: #1f4b99;
            --btn-hover: #173a78;
            --ring: rgba(31, 75, 153, 0.15);
        }

        @media (prefers-color-scheme: dark) {
            :root {
                --bg: #0f1726;
                --card: #16233b;
                --text: #e9f0ff;
                --muted: #b9c6dd;
                --accent: #ff7b7b;
                --btn: #7fb2ff;
                --btn-hover: #a6caff;
                --ring: rgba(127, 178, 255, 0.2);
            }
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: "Segoe UI", "Trebuchet MS", Tahoma, sans-serif;
            background:
                radial-gradient(circle at 12% 18%, rgba(198, 40, 40, 0.12), transparent 38%),
                radial-gradient(circle at 88% 82%, rgba(31, 75, 153, 0.16), transparent 42%),
                var(--bg);
            color: var(--text);
            display: grid;
            place-items: center;
            padding: 24px;
        }

        .card {
            width: min(680px, 100%);
            background: var(--card);
            border-radius: 18px;
            padding: 30px 28px;
            box-shadow: 0 14px 44px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .code {
            display: inline-block;
            color: var(--accent);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        h1 {
            margin: 0 0 10px;
            font-size: clamp(30px, 5vw, 42px);
            line-height: 1.15;
        }

        p {
            margin: 0;
            color: var(--muted);
            font-size: 16px;
            line-height: 1.65;
        }

        .actions {
            margin-top: 24px;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            text-decoration: none;
            font-weight: 600;
            border-radius: 10px;
            padding: 11px 16px;
            transition: all 0.2s ease;
            border: 1px solid transparent;
            display: inline-block;
        }

        .btn-primary {
            background: var(--btn);
            color: #fff;
            box-shadow: 0 0 0 0 var(--ring);
        }

        .btn-primary:hover {
            background: var(--btn-hover);
            box-shadow: 0 0 0 6px var(--ring);
        }

        .btn-secondary {
            border-color: rgba(128, 142, 166, 0.4);
            color: var(--text);
        }

        .btn-secondary:hover {
            border-color: rgba(128, 142, 166, 0.7);
        }
    </style>
</head>
<body>
    <main class="card" role="main" aria-labelledby="title">
        <span class="code">Error 403</span>
        <h1 id="title">{{ $isHindi ? 'पहुंच निषेध' : 'Access Denied' }}</h1>
        <p>
            @if($isHindi)
                आप साइन इन हैं, लेकिन आपकी भूमिका में इस कार्य की अनुमति नहीं है।
                यदि आपको लगता है कि यह गलती है, तो प्रशासक से संपर्क करें।
            @else
                You are signed in, but your role does not include permission for this action.
                Contact an administrator if you believe this is incorrect.
            @endif
        </p>

        <div class="actions">
            <a class="btn btn-primary" href="{{ url()->previous() }}">{{ $isHindi ? 'वापस जाएं' : 'Go Back' }}</a>
            <a class="btn btn-secondary" href="{{ url('/') }}">{{ $isHindi ? 'होम पेज' : 'Go Home' }}</a>
        </div>
    </main>
</body>
</html>
