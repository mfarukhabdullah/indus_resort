<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Messages | Indus Resort</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css">
    <style>
        .messages { display: grid; gap: 12px; }
        .message-card { background: #fff; border: 1px solid #e8e7e1; border-radius: 8px; padding: 16px; }
        .message-card h3 { margin: 0; color: #173f35; }
        .message-card .meta { color: #70807d; font-size: 11px; margin: 5px 0 12px; }
        .message-card p { margin: 7px 0; white-space: pre-wrap; }
        .badge { float: right; background: #eaf6ef; color: #0b6e48; border-radius: 12px; padding: 4px 9px; font-size: 10px; }
    </style>
</head>
<body>
<div class="admin-shell">
    @include('admin.partials.sidebar')

    <main class="content">
        @include('admin.partials.topbar', ['hideSearch' => true])

        <div class="page-title">
            <a href="{{ route('admin.login') }}"><i class="ri-arrow-left-line"></i> Back to Dashboard</a>
            <h1>Messages</h1>
            <p>Messages submitted from the website contact form.</p>
        </div>

        <div class="messages">
            @forelse($messages as $message)
                <article class="message-card">
                    <span class="badge">{{ $message['read'] ? 'Read' : 'New message' }}</span>
                    <h3>{{ $message['subject'] }}</h3>
                    <div class="meta">{{ $message['name'] }} · {{ $message['email'] }} · {{ $message['phone'] }} · {{ $message['created_at'] }}</div>
                    <p>{{ $message['message'] }}</p>
                    <form method="POST" action="{{ route('admin.messages.destroy', $message['id']) }}" onsubmit="return confirm('Delete this message?')" style="margin-top:12px">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="border:1px solid #efb5b5;background:#fff4f4;color:#a42531;border-radius:6px;padding:7px 11px;cursor:pointer">
                            <i class="ri-delete-bin-line"></i> Delete
                        </button>
                    </form>
                </article>
            @empty
                <div class="panel">No messages yet.</div>
            @endforelse
        </div>
    </main>
</div>

<script>
    const sidebar = document.getElementById('sidebar');
    const menuToggle = document.querySelector('.menu-toggle');
    const sidebarClose = document.querySelector('.sidebar-close');
    if (menuToggle && sidebar) menuToggle.onclick = () => sidebar.classList.add('open');
    if (sidebarClose && sidebar) sidebarClose.onclick = () => sidebar.classList.remove('open');
</script>
</body>
</html>
