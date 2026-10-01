<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | Indus Resort</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
<div class="admin-shell">
    @include('admin.partials.sidebar')

    <main class="content" id="dashboard">
        @include('admin.partials.topbar')

        <section class="welcome">
            <div><p>Welcome Back,</p><h1>Admin!</h1><span>Manage your website content, rooms, gallery and more —<br>all from one place.</span></div>
            <div class="date"><i class="ri-calendar-2-line"></i><div><small>Today</small><strong>Wednesday, 30 Sep 2026</strong></div></div>
        </section>

        <section class="stats" aria-label="Website summary">
            <article><div class="stat-icon green"><i class="ri-hotel-bed-line"></i></div><div><small>Total Rooms &amp; Suites</small><b>{{ $roomCount ?? 0 }}</b><a href="{{ route('admin.rooms') }}">Manage Rooms <i class="ri-arrow-right-line"></i></a></div></article>
            <article><div class="stat-icon gold"><i class="ri-image-line"></i></div><div><small>Gallery Images</small><b>{{ $imageCount ?? 0 }}</b><a href="{{ route('admin.gallery') }}">Manage Gallery <i class="ri-arrow-right-line"></i></a></div></article>
            <article><div class="stat-icon blue"><i class="ri-file-text-line"></i></div><div><small>Total Pages</small><b>12</b><a href="{{ route('admin.home-settings') }}">Manage Home <i class="ri-arrow-right-line"></i></a></div></article>
            <article><div class="stat-icon rose"><i class="ri-mail-line"></i></div><div><small>Contact Submissions</small><b>{{ $messageCount ?? 0 }}</b><a href="{{ route('admin.messages') }}">View Messages <i class="ri-arrow-right-line"></i></a></div></article>
        </section>

        <section class="dashboard-grid">
            <article class="panel quick"><h2><i class="ri-flashlight-fill"></i> Quick Actions</h2><div class="quick-grid"><a href="{{ route('admin.rooms') }}"><i class="ri-hotel-bed-line"></i>Manage<br>Rooms &amp; Suites</a><a href="{{ route('admin.gallery') }}"><i class="ri-image-line"></i>Update<br>Gallery</a><a href="{{ route('admin.home-settings') }}"><i class="ri-home-5-line"></i>Edit<br>Home Page</a><a href="{{ route('admin.contact-settings') }}"><i class="ri-mail-line"></i>Update<br>Contact Details</a><a href="{{ route('admin.footer-settings') }}"><i class="ri-layout-bottom-line"></i>Footer Settings</a><a href="{{ route('admin.change-password') }}"><i class="ri-lock-password-line"></i>Change<br>Password</a></div></article>
            <article class="panel preview"><div class="panel-heading"><h2><i class="ri-eye-line"></i> Website Preview</h2><a href="{{ url('/') }}" target="_blank">Open Website <i class="ri-external-link-line"></i></a></div><a href="{{ url('/') }}" target="_blank" class="site-shot"><img src="{{ asset('images/hero-image.png') }}" alt="Indus Resort website preview"><span><small>INDUS RESORT</small><b>A Peaceful Getaway<br>in the Heart of Nature</b><em>Experience comfortable stays, delicious food<br>and unforgettable mountain views.</em></span></a></article>
            <article class="panel updates" id="gallery"><div class="panel-heading"><h2><i class="ri-file-list-3-line"></i> Recent Updates</h2><a href="{{ route('admin.rooms') }}">View All</a></div><div class="update-list"><div><img src="{{ asset('images/bedroom-image.png') }}"><span><b>Executive Room</b><small>Updated room details and images</small></span><time>2 hours ago</time><a href="{{ route('admin.rooms') }}"><i class="ri-pencil-line"></i> Edit</a></div><div><img src="{{ asset('images/view-imge.png') }}"><span><b>Gallery Images</b><small>Added 5 new images</small></span><time>5 hours ago</time><a href="{{ route('admin.gallery') }}"><i class="ri-pencil-line"></i> Edit</a></div><div><img src="{{ asset('images/hero-image.png') }}"><span><b>Home Settings</b><small>Updated hero banner and content</small></span><time>1 day ago</time><a href="{{ route('admin.home-settings') }}"><i class="ri-pencil-line"></i> Edit</a></div></div></article>
            <article class="panel site-info" id="contact"><div class="panel-heading"><h2><i class="ri-settings-3-line"></i> Site Information</h2><a href="{{ route('admin.contact-settings') }}"><i class="ri-pencil-line"></i> Edit</a></div><div class="info-status"><img src="{{ asset('images/web-logo.svg') }}" alt="Indus Resort"><div><span class="online">●</span><b>Website Status</b><small>Online</small><hr><b>Last Updated</b><small>30 Sep 2026, 10:45 AM</small></div></div><div class="contact-info"><span><i class="ri-phone-line"></i><b>Phone Number</b><small>{{ $contactSettings['phone'] ?? '' }}</small></span><span><i class="ri-map-pin-line"></i><b>Location</b><small>{{ $contactSettings['location'] ?? '' }}</small></span><span><i class="ri-mail-line"></i><b>Email Address</b><small>{{ $contactSettings['email'] ?? '' }}</small></span></div></article>
        </section>
        <div id="rooms" class="anchor"></div><div id="footer" class="anchor"></div>
    </main>
</div>
<script>
const sidebar=document.getElementById('sidebar'); document.querySelector('.menu-toggle').onclick=()=>sidebar.classList.add('open'); document.querySelector('.sidebar-close').onclick=()=>sidebar.classList.remove('open'); document.querySelectorAll('.menu a').forEach(a=>a.onclick=()=>{document.querySelectorAll('.menu a').forEach(x=>x.classList.remove('active'));a.classList.add('active');sidebar.classList.remove('open')});
const adminSearch=document.querySelector('.search input');if(adminSearch){adminSearch.addEventListener('keydown',function(e){if(e.key!=='Enter')return;e.preventDefault();const q=this.value.toLowerCase().trim();const destinations=[['room','{{ route('admin.rooms') }}'],['suite','{{ route('admin.rooms') }}'],['gallery','{{ route('admin.gallery') }}'],['photo','{{ route('admin.gallery') }}'],['message','{{ route('admin.messages') }}'],['contact','{{ route('admin.contact-settings') }}'],['footer','{{ route('admin.footer-settings') }}'],['seo','{{ route('admin.seo-settings') }}'],['meta','{{ route('admin.seo-settings') }}'],['home','{{ route('admin.home-settings') }}']];const found=destinations.find(item=>q.includes(item[0]));if(found)window.location.href=found[1];else this.setCustomValidity('Try: rooms, gallery, messages, contact, footer, SEO or home.');});adminSearch.addEventListener('input',function(){this.setCustomValidity('')});}
</script>
</body>
</html>
