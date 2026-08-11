<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'email'  => 'required|email|max:255',
            'name'   => 'nullable|string|max:100',
            'source' => 'nullable|string|max:50',
        ]);

        $email = strtolower(trim($validated['email']));

        $existing = Subscriber::where('email', $email)->first();

        if ($existing) {
            if ($existing->status === 'unsubscribed') {
                $existing->update([
                    'status'          => 'active',
                    'name'            => $validated['name'] ?? $existing->name,
                    'source'          => $validated['source'] ?? $existing->source,
                    'subscribed_at'   => now(),
                    'unsubscribed_at' => null,
                ]);
                return $this->successResponse($request, 'Welcome back! You have been re-subscribed.');
            }
            return $this->successResponse($request, 'You are already subscribed. Thank you!');
        }

        Subscriber::create([
            'email'  => $email,
            'name'   => $validated['name'] ?? null,
            'source' => $validated['source'] ?? 'blog',
        ]);

        return $this->successResponse($request, 'Thank you for subscribing! You will receive our latest updates.');
    }

    public function unsubscribe(string $token)
    {
        $subscriber = Subscriber::where('unsubscribe_token', $token)->firstOrFail();

        if ($subscriber->status === 'active') {
            $subscriber->update([
                'status'          => 'unsubscribed',
                'unsubscribed_at' => now(),
            ]);
        }

        return view('website.pages.newsletter-unsubscribed', compact('subscriber'));
    }

    private function successResponse(Request $request, string $message)
    {
        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => $message]);
        }
        return redirect()->back()->with('newsletter_success', $message);
    }
}
