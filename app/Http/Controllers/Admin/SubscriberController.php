<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:subscribers.manage');
    }

    public function index(Request $request)
    {
        $search  = trim((string) $request->input('search', ''));
        $status  = (string) $request->input('status', 'all');
        $source  = (string) $request->input('source', 'all');
        $perPage = (int) $request->input('per_page', 20);

        if (!in_array($perPage, [20, 50, 100], true)) {
            $perPage = 20;
        }

        $query = Subscriber::query();

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('email', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%");
            });
        }

        if ($status !== 'all') {
            $query->where('status', $status);
        }

        if ($source !== 'all') {
            $query->where('source', $source);
        }

        $subscribers = $query->orderByDesc('subscribed_at')
                             ->paginate($perPage)
                             ->appends($request->query());

        $totalActive       = Subscriber::where('status', 'active')->count();
        $totalUnsubscribed = Subscriber::where('status', 'unsubscribed')->count();
        $sources           = Subscriber::distinct()->pluck('source')->filter()->sort()->values();

        return view('adminDashboard.pages.subscribers.index', compact(
            'subscribers', 'search', 'status', 'source', 'perPage',
            'totalActive', 'totalUnsubscribed', 'sources'
        ));
    }

    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();
        return redirect()->back()->with('success', 'Subscriber removed.');
    }

    public function exportCsv(Request $request)
    {
        $status = (string) $request->input('status', 'active');
        $query  = Subscriber::query();

        if ($status !== 'all') {
            $query->where('status', $status);
        }

        $subscribers = $query->orderByDesc('subscribed_at')->get();

        $filename = 'subscribers_' . $status . '_' . now()->format('Y-m-d') . '.csv';

        $headers = [
            'Content-Type'        => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
            'Pragma'              => 'no-cache',
            'Cache-Control'       => 'must-revalidate',
            'Expires'             => '0',
        ];

        $callback = function () use ($subscribers) {
            $handle = fopen('php://output', 'w');
            // BOM for Excel UTF-8
            fwrite($handle, "\xEF\xBB\xBF");
            fputcsv($handle, ['Email', 'Name', 'Source', 'Status', 'Subscribed At', 'Unsubscribed At']);

            foreach ($subscribers as $sub) {
                fputcsv($handle, [
                    $sub->email,
                    $sub->name ?? '',
                    $sub->source,
                    $sub->status,
                    $sub->subscribed_at?->format('Y-m-d H:i:s') ?? '',
                    $sub->unsubscribed_at?->format('Y-m-d H:i:s') ?? '',
                ]);
            }

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }
}
