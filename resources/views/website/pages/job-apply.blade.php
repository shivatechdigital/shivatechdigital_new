@extends('website.index')
@section('seo_slug', 'job-apply-' . ($job->slug ?? 'career'))

@section('website.content')
<section style="background:linear-gradient(130deg,#0f172a,#1d4ed8);padding:105px 0 55px;">
    <div class="container text-white">
        <a href="{{ route('careers') }}" style="color:#bfdbfe;text-decoration:none;font-size:.85rem;">Back to careers</a>
        <h1 class="mt-2" style="font-weight:900;">Apply for {{ $job->title }}</h1>
        <p style="opacity:.88;max-width:760px;">Please fill all mandatory details and upload your resume.</p>
    </div>
</section>

<section style="padding:55px 0;background:#f8fafc;">
    <div class="container" style="max-width:780px;">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white border rounded-4 p-4 p-lg-5">
            <form action="{{ route('careers.apply.store', $job->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Phone Number <span class="text-danger">*</span></label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">Address <span class="text-danger">*</span></label>
                        <input type="text" name="address" class="form-control" value="{{ old('address') }}" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">Email ID <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">Upload Resume <span class="text-danger">*</span></label>
                        <input type="file" name="resume" class="form-control" accept=".pdf,.doc,.docx" required>
                        <div class="form-text">Allowed: PDF, DOC, DOCX. Max size 4MB.</div>
                    </div>
                    <div class="col-12 pt-1">
                        <button type="submit" class="btn btn-primary px-4">Submit Application</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
