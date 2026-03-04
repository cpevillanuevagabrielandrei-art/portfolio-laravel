@extends('layouts.admin')

@section('page-title', 'Edit Project')

@section('topbar-actions')
    <a href="{{ route('admin.projects') }}" class="btn-admin btn-admin-outline btn-admin-sm">
        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
        Back
    </a>
@endsection

@section('content')

<div class="admin-card" style="max-width:720px">
    <h3>
        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
        Edit — {{ $project->title }}
    </h3>

    <form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data" class="admin-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Project Title *</label>
            <input type="text" name="title" value="{{ old('title', $project->title) }}" required />
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="3">{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>GitHub URL</label>
                <input type="url" name="github_url" value="{{ old('github_url', $project->github_url) }}" />
            </div>
            <div class="form-group">
                <label>Live Demo URL</label>
                <input type="url" name="live_url" value="{{ old('live_url', $project->live_url) }}" />
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $project->sort_order) }}" />
            </div>
            <div class="form-group form-check" style="padding-top:1.5rem">
                <input type="checkbox" name="is_active" id="is_active" value="1"
                       {{ old('is_active', $project->is_active) ? 'checked' : '' }} />
                <label for="is_active">Active (visible on portfolio)</label>
            </div>
        </div>

        <div class="form-group">
            <label>Project Image</label>
            @if($project->image)
                <div style="margin-bottom:0.75rem">
                    <img src="{{ asset('storage/'.$project->image) }}"
                         style="width:140px;height:88px;object-fit:cover;border-radius:8px;border:1px solid var(--a-border)" />
                </div>
            @endif
            <input type="file" name="image" accept="image/*" />
            <p class="form-hint">Leave blank to keep existing image</p>
        </div>

        <div style="display:flex;gap:0.75rem;padding-top:0.25rem">
            <button type="submit" class="btn-admin btn-admin-primary">
                <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                Update Project
            </button>
            <a href="{{ route('admin.projects') }}" class="btn-admin btn-admin-outline">Cancel</a>
        </div>
    </form>
</div>

@endsection