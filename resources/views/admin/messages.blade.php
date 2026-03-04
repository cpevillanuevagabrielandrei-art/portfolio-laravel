{{-- ===================== messages/index.blade.php ===================== --}}
@extends('layouts.admin')

@section('page-title', 'Contact Messages')

@section('content')

<div class="admin-card">
    @if($messages->isEmpty())
        <div style="text-align:center;padding:3rem;color:var(--a-muted)">
            <svg width="40" height="40" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" style="margin:0 auto 1rem;opacity:0.3"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
            <p>No messages yet.</p>
        </div>
    @else
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Sender</th>
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $msg)
                <tr style="{{ !$msg->is_read ? 'font-weight:600' : '' }}">
                    <td>
                        <strong>{{ $msg->name }}</strong>
                        <br><small>{{ $msg->email }}</small>
                    </td>
                    <td>{{ $msg->subject ?? '(no subject)' }}</td>
                    <td style="white-space:nowrap">{{ $msg->created_at->format('M j, Y g:i A') }}</td>
                    <td>
                        @if($msg->is_read)
                            <span class="badge badge-secondary">Read</span>
                        @else
                            <span class="badge badge-danger">Unread</span>
                        @endif
                    </td>
                    <td>
                        <div style="display:flex;gap:0.4rem">
                            <a href="{{ route('admin.messages.show', $msg) }}" class="btn-admin btn-admin-outline btn-admin-sm">View</a>
                            <form method="POST" action="{{ route('admin.messages.destroy', $msg) }}"
                                  onsubmit="return confirm('Delete this message?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-admin btn-admin-danger btn-admin-sm">
                                    <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6M14 11v6"/></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="margin-top:1.25rem;padding-top:1rem;border-top:1px solid var(--a-border)">
            {{ $messages->links() }}
        </div>
    @endif
</div>

@endsection


{{-- ===================== messages/show.blade.php ===================== --}}
{{-- (Save as separate file in practice) --}}