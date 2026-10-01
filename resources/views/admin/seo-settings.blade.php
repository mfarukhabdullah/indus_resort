<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SEO Settings | Indus Resort</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css">
    <style>
        .seo { max-width: 900px; }
        .seo article { background: #fff; border: 1px solid #e5ebe7; border-radius: 8px; padding: 18px; margin: 12px 0; }
        .seo h2 { margin: 0 0 14px; color: #176044; }
        .seo label { display: grid; gap: 5px; font-size: 12px; font-weight: 700; margin: 10px 0; }
        .seo input, .seo textarea, .seo select { padding: 10px; border: 1px solid #d7e1dc; border-radius: 6px; font: inherit; }
        .save { padding: 11px 16px; background: #176044; color: #fff; border: 0; border-radius: 6px; font-weight: 700; cursor: pointer; }
    </style>
</head>
<body>
<div class="admin-shell">
    @include('admin.partials.sidebar')

    <main class="content">
        @include('admin.partials.topbar', ['hideSearch' => true])

        <div class="page-title">
            <a href="{{ route('admin.login') }}"><i class="ri-arrow-left-line"></i> Back to Dashboard</a>
            <h1>SEO Settings</h1>
            <p>Set search engine information for each public page.</p>
        </div>

        <section class="seo panel">
            @if(session('success'))
                <p style="color:#0b6e48">{{ session('success') }}</p>
            @endif
            @if($errors->any())
                <p style="background:#fff0f0;color:#a42531;padding:10px;border-radius:6px">{{ $errors->first() }}</p>
            @endif

            <form method="POST" action="{{ route('admin.seo-settings.update') }}">
                @csrf
                @foreach(['home'=>'Home','about'=>'About Us','rooms'=>'Rooms & Suites','gallery'=>'Gallery','contact'=>'Contact Us'] as $key=>$label)
                    <article>
                        <h2>{{ $label }}</h2>
                        <label>Meta Title
                            <input name="pages[{{ $key }}][title]" value="{{ $seo[$key]['title'] ?? '' }}" required>
                        </label>
                        <label>Meta Description
                            <textarea name="pages[{{ $key }}][description]" rows="2">{{ $seo[$key]['description'] ?? '' }}</textarea>
                        </label>
                        <label>Meta Keywords
                            <input name="pages[{{ $key }}][keywords]" value="{{ $seo[$key]['keywords'] ?? '' }}">
                        </label>
                        <label>Robots Tag
                            <select name="pages[{{ $key }}][robots]">
                                @foreach(['index, follow','noindex, nofollow','index, nofollow','noindex, follow'] as $robot)
                                    <option value="{{ $robot }}" {{ ($seo[$key]['robots'] ?? '') === $robot ? 'selected' : '' }}>{{ $robot }}</option>
                                @endforeach
                            </select>
                        </label>
                    </article>
                @endforeach
                <button class="save" type="submit">Save SEO Settings</button>
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
