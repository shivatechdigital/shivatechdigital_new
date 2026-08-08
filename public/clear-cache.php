<?php
/**
 * HOSTINGER CACHE CLEARER
 * Usage: Visit https://yourdomain.com/clear-cache.php?secret=shiva2025
 * DELETE THIS FILE after use for security!
 */

$secret = $_GET['secret'] ?? '';
if ($secret !== 'shiva2025') {
    http_response_code(403);
    die('Access denied.');
}

define('LARAVEL_START', microtime(true));

// Bootstrap Laravel
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

$results = [];

$commands = [
    'view:clear'   => 'Blade view cache',
    'cache:clear'  => 'Application cache',
    'config:clear' => 'Config cache',
    'route:clear'  => 'Route cache',
    'event:clear'  => 'Event cache',
];

foreach ($commands as $cmd => $label) {
    try {
        $kernel->call($cmd);
        $results[] = "✅ $label cleared";
    } catch (\Exception $e) {
        $results[] = "❌ $label failed: " . $e->getMessage();
    }
}

// Also try to touch the CSS file to update its timestamp
$cssFile = __DIR__ . '/web_assets/css/style.css';
if (file_exists($cssFile)) {
    touch($cssFile);
    $results[] = "✅ CSS file timestamp updated (cache busted)";
}

echo '<!DOCTYPE html><html><head><meta charset="utf-8">
<title>Cache Cleared - Shiva Tech Digital</title>
<style>
    body { font-family: monospace; background: #0f172a; color: #94a3b8; padding: 40px; }
    h2 { color: #60a5fa; }
    .ok { color: #34d399; }
    .err { color: #f87171; }
    .warn { color: #fbbf24; margin-top: 30px; padding: 15px; border: 1px solid #fbbf24; border-radius: 8px; }
</style></head><body>';
echo '<h2>🚀 Laravel Cache Cleared</h2><pre>';
echo implode("\n", $results);
echo '</pre>';
echo '<p class="warn">⚠️ <strong>SECURITY:</strong> Delete this file immediately from Hostinger File Manager after use!<br>Path: <code>/public_html/clear-cache.php</code></p>';
echo '</body></html>';
