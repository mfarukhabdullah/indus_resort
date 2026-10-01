<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Settings | Indus Resort</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <style>
        .contact-editor { max-width: 820px; padding: 30px; }
        .contact-editor h2 { margin: 0 0 8px; }
        .contact-editor p { color: #718096; }
        .contact-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; margin-top: 24px; }
        .contact-grid label { display: grid; gap: 8px; font-weight: 700; color: #173f35; }
        .contact-grid input, .contact-grid textarea { border: 1px solid #d7e1dc; border-radius: 9px; padding: 13px; font: inherit; }
        .contact-grid .wide { grid-column: 1/-1; }
        .contact-grid textarea { resize: vertical; }
        .contact-actions { display: flex; justify-content: flex-end; margin-top: 22px; }
        .contact-actions button { border: 0; border-radius: 8px; background: #126a4b; color: white; padding: 12px 18px; font-weight: 700; cursor: pointer; }
        .save-notice { padding: 12px; background: #eaf6ef; color: #0b6e48; border-radius: 8px; }
        @media(max-width: 650px) { .contact-grid { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
<div class="admin-shell">
    @include('admin.partials.sidebar')

    <main class="content">
        @include('admin.partials.topbar', ['hideSearch' => true])

        <div class="page-title">
            <a href="{{ route('admin.login') }}"><i class="ri-arrow-left-line"></i> Back to Dashboard</a>
            <h1>Contact Us</h1>
            <p>These details appear on the Contact page and in the website footer.</p>
        </div>

        <section class="panel contact-editor">
            <h2><i class="ri-contacts-line"></i> Contact Details</h2>
            <p>Update the information your guests use to reach the resort.</p>

            @if(session('success'))
                <p class="save-notice">{{ session('success') }}</p>
            @endif

            <form method="POST" action="{{ route('admin.contact-settings.update') }}">
                @csrf
                <div class="contact-grid">
                    <label>Email Address
                        <input type="email" name="email" value="{{ old('email', $contactSettings['email']) }}" required>
                    </label>
                    <label>Phone Number
                        <input name="phone" value="{{ old('phone', $contactSettings['phone']) }}" required>
                    </label>
                    <label class="wide">Our Location
                        <textarea name="location" rows="3" required>{{ old('location', $contactSettings['location']) }}</textarea>
                    </label>
                    <label class="wide">Reception Hours
                        <textarea name="hours" rows="3" required>{{ old('hours', $contactSettings['hours']) }}</textarea>
                    </label>
                </div>
                <div class="contact-actions">
                    <button type="submit"><i class="ri-save-line"></i> Save Contact Details</button>
                </div>
            </form>
        </section>
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
