<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Settings | Indus Resort</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-home-editor.css') }}">
</head>
<body>
<div class="admin-shell">
    @include('admin.partials.sidebar')

    <main class="content">
        @include('admin.partials.topbar')

        <div class="page-title">
            <a href="{{ route('admin.login') }}"><i class="ri-arrow-left-line"></i> Back to Dashboard</a>
            <h1>Home Settings</h1>
            <p>Manage the content displayed on your website home page.</p>
        </div>

        <section class="home-editor panel">
            <div class="editor-heading">
                <div>
                    <span class="eyebrow">HERO SECTION</span>
                    <h2><i class="ri-home-5-line"></i> Edit Home Hero Section</h2>
                    <p>Update the main heading, description and hero background image shown on your website.</p>
                </div>
                <a href="{{ url('/') }}" target="_blank"><i class="ri-external-link-line"></i> Preview website</a>
            </div>

            @if(session('success'))
                <p class="save-notice show"><i class="ri-checkbox-circle-line"></i> {{ session('success') }}</p>
            @endif

            <form class="editor-form" method="POST" action="{{ route('admin.home-settings.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="editor-fields">
                    <label>Hero Heading
                        <input type="text" name="heading" value="{{ old('heading', $homeSettings['heading']) }}" required>
                    </label>
                    <label>Highlighted Word
                        <input type="text" name="highlight" value="{{ old('highlight', $homeSettings['highlight']) }}">
                    </label>
                    <label class="full-field">Hero Description
                        <textarea name="description" rows="4" required>{{ old('description', $homeSettings['description']) }}</textarea>
                    </label>
                    <div class="form-actions">
                        <button type="reset" class="cancel-btn">Cancel</button>
                        <button type="submit" class="save-btn"><i class="ri-save-line"></i> Save Changes</button>
                    </div>
                </div>

                <div class="image-control">
                    <span>Hero Background Image</span>
                    <div class="image-preview">
                        <img id="heroPreview" src="{{ asset($homeSettings['hero_image']) }}" alt="Current hero background">
                        <label for="heroImage">
                            <i class="ri-image-edit-line"></i><b>Change image</b>
                            <small>JPG, PNG or WEBP · recommended 1920 × 900</small>
                        </label>
                    </div>
                    <input id="heroImage" name="hero_image" type="file" accept="image/png,image/jpeg,image/webp" hidden>
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
    document.getElementById('heroImage').onchange = function() {
        const file = this.files[0];
        if (file) document.getElementById('heroPreview').src = URL.createObjectURL(file);
    };
</script>
</body>
</html>
