<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
@php
    try {
        // Vite se load karo (agar manifest exist kare)
        $manifest = public_path('build/manifest.json');
        if (file_exists($manifest)) {
            $data = json_decode(file_get_contents($manifest), true);
            $cssPath = $data['resources/css/website.css']['file'] ?? null;
        } else {
            $cssPath = null;
        }
    } catch (\Exception $e) {
        $cssPath = null;
    }
@endphp
@if($cssPath)
    <link rel="stylesheet" href="{{ asset('build/' . $cssPath) }}">
@else
    {{-- Fallback: old static CSS --}}
    @php
        $cssFile = public_path('web_assets/css/style.css');
        clearstatcache(true, $cssFile);
        $cssVer = file_exists($cssFile) ? filemtime($cssFile) : '1.0';
    @endphp
    <link rel="stylesheet" href="{{ asset('web_assets/css/style.css') }}?v={{ $cssVer }}">
@endif