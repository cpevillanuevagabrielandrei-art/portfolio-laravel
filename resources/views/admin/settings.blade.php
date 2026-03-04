@extends('layouts.admin')

@section('page-title', 'Profile & Settings')

@section('content')

<form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="admin-form">
    @csrf

    <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.25rem">

        {{-- Personal Info --}}
        <div class="admin-card">
            <h3>
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                Personal Information
            </h3>

            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" value="{{ $settings['name'] ?? '' }}" placeholder="John Doe" />
            </div>
            <div class="form-group">
                <label>Job Title / Subtitle</label>
                <input type="text" name="subtitle" value="{{ $settings['subtitle'] ?? '' }}" placeholder="Frontend Developer" />
            </div>
            <div class="form-group">
                <label>Experience Label</label>
                <input type="text" name="title" value="{{ $settings['title'] ?? '' }}" placeholder="Frontend Development" />
            </div>
            <div class="form-group">
                <label>Years of Experience</label>
                <input type="text" name="experience_years" value="{{ $settings['experience_years'] ?? '' }}" placeholder="2+ years" />
            </div>
            <div class="form-group">
                <label>Education</label>
                <textarea name="education" placeholder="B.Sc. Bachelors Degree&#10;M.Sc. Masters Degree">{{ $settings['education'] ?? '' }}</textarea>
            </div>
            <div class="form-group">
                <label>About Me</label>
                <textarea name="about_text" rows="5" placeholder="Tell visitors about yourself...">{{ $settings['about_text'] ?? '' }}</textarea>
            </div>
        </div>

        {{-- Right column --}}
        <div>
            <div class="admin-card">
                <h3>
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    Contact & Social Links
                </h3>

                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" value="{{ $settings['email'] ?? '' }}" placeholder="you@example.com" />
                </div>
                <div class="form-group">
                    <label>LinkedIn URL</label>
                    <input type="url" name="linkedin_url" value="{{ $settings['linkedin_url'] ?? '' }}" placeholder="https://linkedin.com/in/..." />
                </div>
                <div class="form-group">
                    <label>GitHub URL</label>
                    <input type="url" name="github_url" value="{{ $settings['github_url'] ?? '' }}" placeholder="https://github.com/..." />
                </div>
                <div class="form-group">
                    <label>Resume / CV URL</label>
                    <input type="url" name="resume_url" value="{{ $settings['resume_url'] ?? '' }}" placeholder="https://..." />
                    <p class="form-hint">Link to hosted PDF — leave blank to hide the button</p>
                </div>
            </div>

            <div class="admin-card">
                <h3>
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                    Profile Images
                </h3>

                {{-- Hero pic --}}
                <div class="form-group">
                    <label>Hero Profile Picture</label>
                    <div class="image-preview-wrap">
                        <img id="profile_pic_preview"
                            src="{{ !empty($settings['profile_pic']) ? asset('storage/'.$settings['profile_pic']) : asset('assets/profile-pic.png') }}"
                            style="width:72px;height:72px;border-radius:50%;" />
                        <div class="preview-meta">
                            <p class="preview-label">Current photo</p>
                            <p class="preview-hint">Upload to replace</p>
                        </div>
                    </div>
                    <input type="file" name="profile_pic" accept="image/*"
                           onchange="previewImage(event,'profile_pic_preview')" />
                    <p class="form-hint">Recommended: 400×400px square</p>
                </div>

                {{-- About pic --}}
                <div class="form-group" style="margin-top:1.25rem">
                    <label>About Section Picture</label>
                    <div class="image-preview-wrap">
                        <img id="about_pic_preview"
                            src="{{ !empty($settings['about_pic']) ? asset('storage/'.$settings['about_pic']) : asset('assets/about-pic.png') }}"
                            style="width:72px;height:72px;border-radius:8px;" />
                        <div class="preview-meta">
                            <p class="preview-label">Current photo</p>
                            <p class="preview-hint">Upload to replace</p>
                        </div>
                    </div>
                    <input type="file" name="about_pic" accept="image/*"
                           onchange="previewImage(event,'about_pic_preview')" />
                    <p class="form-hint">Recommended: 400×400px</p>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top:0.5rem">
        <button type="submit" class="btn-admin btn-admin-primary" style="padding:0.7rem 2rem">
            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
            Save Settings
        </button>
    </div>
</form>

@push('scripts')
<script>
function previewImage(event, previewId) {
    const file = event.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = e => document.getElementById(previewId).src = e.target.result;
    reader.readAsDataURL(file);
}
</script>
@endpush

@endsection