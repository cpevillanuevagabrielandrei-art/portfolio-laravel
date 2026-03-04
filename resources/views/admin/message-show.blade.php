{{-- messages/show.blade.php --}}
@extends('layouts.admin')

@section('page-title', 'Message from ' . $message->name)

@section('topbar-actions')
    <a href="{{ route('admin.messages') }}" class="btn-admin btn-admin-outline btn-admin-sm">
        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
        Back
    </a>
@endsection

@section('content')

<div class="admin-card" style="max-width:720px">
    <h3>
        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
        Message Details
    </h3>

    <div class="message-meta-grid">
        <div class="meta-item">
            <div class="meta-label">From</div>
            <div class="meta-value">{{ $message->name }}</div>
        </div>
        <div class="meta-item">
            <div class="meta-label">Email</div>
            <div class="meta-value"><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></div>
        </div>
        <div class="meta-item">
            <div class="meta-label">Subject</div>
            <div class="meta-value">{{ $message->subject ?? '(no subject)' }}</div>
        </div>
        <div class="meta-item">
            <div class="meta-label">Received</div>
            <div class="meta-value">{{ $message->created_at->format('M j, Y \a\t g:i A') }}</div>
        </div>
    </div>

    <div style="margin-bottom:0.6rem;font-size:0.7rem;font-weight:600;text-transform:uppercase;letter-spacing:0.1em;color:var(--a-muted)">Message</div>
    <div class="message-body">{{ $message->message }}</div>

    <div style="display:flex;gap:0.75rem">
        <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}"
           class="btn-admin btn-admin-primary">
            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
            Reply via Email
        </a>
        <form method="POST" action="{{ route('admin.messages.destroy', $message) }}"
              onsubmit="return confirm('Delete this message permanently?')">
            @csrf @method('DELETE')
            <button type="submit" class="btn-admin btn-admin-danger">
                <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/></svg>
                Delete
            </button>
        </form>
    </div>
</div>

@endsection