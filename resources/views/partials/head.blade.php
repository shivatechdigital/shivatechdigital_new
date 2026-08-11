<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>{{ $title ?? config('app.name') }}</title>

<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

@php
    $manifestPath = public_path('build/manifest.json');
    $manifest = file_exists($manifestPath)
        ? json_decode(file_get_contents($manifestPath), true)
        : null;

    $cssEntry = is_array($manifest) ? ($manifest['resources/css/app.css']['file'] ?? null) : null;
    $jsEntry = is_array($manifest) ? ($manifest['resources/js/app.js']['file'] ?? null) : null;
@endphp

@if($cssEntry && $jsEntry)
    <link rel="stylesheet" href="{{ asset('build/' . $cssEntry) }}">
    <script type="module" src="{{ asset('build/' . $jsEntry) }}"></script>
@else
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endif

@php
    $fluxCssPath = base_path('vendor/livewire/flux/dist/flux.css');
@endphp
@if(file_exists($fluxCssPath))
    <style>{!! file_get_contents($fluxCssPath) !!}</style>
@endif

@fluxAppearance
