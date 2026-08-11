@extends('website.index')
@section('title', 'Unsubscribed | Shiva Tech Digital')
@section('meta_description', 'You have been successfully unsubscribed from Shiva Tech Digital newsletter.')

@section('website.content')
<div style="min-height:60vh;display:flex;align-items:center;justify-content:center;padding:60px 20px;">
    <div style="text-align:center;max-width:480px;">
        <div style="width:80px;height:80px;background:linear-gradient(135deg,#667eea,#764ba2);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 24px;">
            <i class="fas fa-envelope-open" style="font-size:1.8rem;color:#fff;"></i>
        </div>
        <h1 style="font-size:1.8rem;font-weight:800;color:#0f172a;margin-bottom:12px;">Unsubscribed</h1>
        <p style="color:#475569;line-height:1.7;margin-bottom:24px;">
            <strong>{{ $subscriber->email }}</strong> has been removed from our mailing list.
            You won't receive any more newsletters from us.
        </p>
        <a href="{{ route('blog.index') }}" class="btn btn-primary" style="background:linear-gradient(135deg,#667eea,#764ba2);border:none;border-radius:30px;padding:12px 28px;font-weight:700;">
            <i class="fas fa-arrow-left me-2"></i>Back to Blog
        </a>
        <p style="font-size:.8rem;color:#94a3b8;margin-top:16px;">
            Changed your mind? <a href="{{ route('blog.index') }}" style="color:#667eea;">Re-subscribe on the blog page.</a>
        </p>
    </div>
</div>
@endsection
