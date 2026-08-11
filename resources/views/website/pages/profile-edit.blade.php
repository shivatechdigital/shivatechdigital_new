@extends('website.index')
@section('seo_slug', 'profile-edit')

@push('styles')
<style>
.profile-wrap { background: linear-gradient(135deg, #f8fafc, #eef5ff); padding: 110px 0 70px; }
.profile-card { background: #fff; border: 1px solid #e2e8f0; border-radius: 18px; box-shadow: 0 15px 50px rgba(2, 8, 23, .08); }
.profile-label { font-size: .82rem; font-weight: 700; text-transform: uppercase; letter-spacing: .4px; color: #1e3a8a; margin-bottom: 6px; }
.profile-input { border: 1px solid #cbd5e1; border-radius: 12px; padding: 11px 12px; width: 100%; }
.profile-input:focus { outline: none; border-color: #2563eb; box-shadow: 0 0 0 3px rgba(37,99,235,.15); }
</style>
@endpush

@section('website.content')
<section class="profile-wrap">
    <div class="container" style="max-width:760px;">
        <div class="profile-card p-4 p-md-5">
            <h1 style="font-weight:900;color:#0f172a;font-size:1.7rem;">Edit Profile</h1>
            <p style="color:#64748b;">Update your account details below.</p>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('user.profile.update') }}" class="mt-3">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="profile-label" for="name">Full Name</label>
                    <input class="profile-input" id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="profile-label" for="email">Email Address</label>
                    <input class="profile-input" id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required>
                    <small style="color:#64748b;">If you change email, you will need to verify it again.</small>
                </div>

                <div class="d-flex gap-2 flex-wrap mt-4">
                    <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
