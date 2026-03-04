{{-- projects/create.blade.php --}}
@extends('layouts.admin')

@section('page-title', 'Add New Project')

@section('topbar-actions')
    <a href="{{ route('admin.projects') }}" class="btn-admin btn-admin-outline btn-admin-sm">
        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
        Back to Projects
    </a>
@endsection

@section('content')

<div class="admin-card" style="max-width:720px">
    <h3>
        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        New Project
    </h3>

    <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" class="admin-form">
        @csrf

        <div class="form-group">
            <label>Project Title *</label>
            <input type="text" name="title" value="{{ old('title') }}" placeholder="My Awesome Project" required />
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="3" placeholder="Brief description of the project...">{{ old('description') }}</textarea>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>GitHub URL</label>
                <input type="url" name="github_url" value="{{ old('github_url') }}" placeholder="https://github.com/..." />
            </div>
            <div class="form-group">
                <label>Live Demo URL</label>
                <input type="url" name="live_url" value="{{ old('live_url') }}" placeholder="https://..." />
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" />
                <p class="form-hint">Lower numbers appear first</p>
            </div>
            <div class="form-group form-check" style="padding-top:1.5rem">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} />
                <label for="is_active">Active (visible on portfolio)</label>
            </div>
        </div>

        <div class="form-group">
            <label>Project Image</label>
            <input type="file" name="image" accept="image/*" />
            <p class="form-hint">Max 2MB — Recommended: 16:9 ratio</p>
        </div>

        <div style="display:flex;gap:0.75rem;padding-top:0.25rem">
            <button type="submit" class="btn-admin btn-admin-primary">
                <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                Create Project
            </button>
            <a href="{{ route('admin.projects') }}" class="btn-admin btn-admin-outline">Cancel</a>
        </div>
    </form>
</div>

@endsection


{{-- ===================== projects/edit.blade.php ===================== --}}
{{-- Save as resources/views/admin/projects/edit.blade.php --}}