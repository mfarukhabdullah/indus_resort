<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | Indus Resort</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
<div class="admin-shell">
    <aside class="sidebar" id="sidebar">
        <button class="sidebar-close" aria-label="Close menu"><i class="ri-close-line"></i></button>
        <a href="{{ url('/') }}" class="brand">
            <img src="{{ asset('images/web-logo.svg') }}" alt="Indus Resort">
            <span>ADMIN PANEL</span>
        </a>
        <nav class="menu" aria-label="Admin navigation">
            <a class="active" href="#dashboard"><i class="ri-home-5-line"></i> Dashboard</a>
            <a href="{{ route('admin.home-settings') }}"><i class="ri-settings-3-line"></i> Home Settings</a>
            <a href="{{ route('admin.rooms') }}"><i class="ri-hotel-bed-line"></i> Rooms &amp; Suites</a>
            <a href="#gallery"><i class="ri-image-line"></i> Gallery</a>
            <a href="{{ route('admin.contact-settings') }}"><i class="ri-mail-line"></i> Contact Us</a>
            <a href="{{ route('admin.footer-settings') }}"><i class="ri-layout-bottom-line"></i> Footer Settings</a>
        </nav>
        <div class="sidebar-footer"><span>Indus Resort &amp; Restaurant</span><span>Admin Panel · v1.0.0</span></div>
    </aside>

    <main class="content" id="dashboard">
        <header class="topbar">
            <button class="menu-toggle" aria-label="Open menu"><i class="ri-menu-line"></i></button>
            <label class="search"><i class="ri-search-line"></i><input type="search" placeholder="Search here..." aria-label="Search"></label>
            <div class="top-actions"><button class="icon-btn notification" aria-label="Notifications"><i class="ri-notification-3-line"></i></button><div class="user-avatar">AR</div><div class="user"><strong>Admin</strong><span>Super Admin</span></div><i class="ri-arrow-down-s-line"></i></div>
        </header>

        <section class="welcome">
            <div><p>Welcome Back,</p><h1>Admin!</h1><span>Manage your website content, rooms, gallery and more —<br>all from one place.</span></div>
            <div class="date"><i class="ri-calendar-2-line"></i><div><small>Today</small><strong>Wednesday, 30 Sep 2026</strong></div></div>
        </section>

        <section class="stats" aria-label="Website summary">
            <article><div class="stat-icon green"><i class="ri-hotel-bed-line"></i></div><div><small>Total Rooms &amp; Suites</small><b>14</b><a href="#rooms">Manage Rooms <i class="ri-arrow-right-line"></i></a></div></article>
            <article><div class="stat-icon gold"><i class="ri-image-line"></i></div><div><small>Gallery Images</small><b>48</b><a href="#gallery">Manage Gallery <i class="ri-arrow-right-line"></i></a></div></article>
            <article><div class="stat-icon blue"><i class="ri-file-text-line"></i></div><div><small>Total Pages</small><b>12</b><a href="#home-settings">Manage Home <i class="ri-arrow-right-line"></i></a></div></article>
            <article><div class="stat-icon rose"><i class="ri-mail-line"></i></div><div><small>Contact Submissions</small><b>8</b><a href="#contact">View Messages <i class="ri-arrow-right-line"></i></a></div></article>
        </section>

        <section class="dashboard-grid">
            <article class="panel quick"><h2><i class="ri-flashlight-fill"></i> Quick Actions</h2><div class="quick-grid"><a href="{{ route('admin.rooms') }}"><i class="ri-hotel-bed-line"></i>Manage<br>Rooms &amp; Suites</a><a href="#gallery"><i class="ri-image-line"></i>Update<br>Gallery</a><a href="{{ route('admin.home-settings') }}"><i class="ri-home-5-line"></i>Edit<br>Home Page</a><a href="{{ route('admin.contact-settings') }}"><i class="ri-mail-line"></i>Update<br>Contact Details</a><a href="{{ route('admin.footer-settings') }}"><i class="ri-layout-bottom-line"></i>Footer Settings</a><a href="{{ url('/') }}" target="_blank"><i class="ri-eye-line"></i>View Website <i class="ri-external-link-line mini"></i></a></div></article>
            <article class="panel preview"><div class="panel-heading"><h2><i class="ri-eye-line"></i> Website Preview</h2><a href="{{ url('/') }}" target="_blank">Open Website <i class="ri-external-link-line"></i></a></div><a href="{{ url('/') }}" target="_blank" class="site-shot"><img src="{{ asset('images/hero-image.png') }}" alt="Indus Resort website preview"><span><small>INDUS RESORT</small><b>A Peaceful Getaway<br>in the Heart of Nature</b><em>Experience comfortable stays, delicious food<br>and unforgettable mountain views.</em></span></a></article>
            <article class="panel updates" id="gallery"><div class="panel-heading"><h2><i class="ri-file-list-3-line"></i> Recent Updates</h2><button>View All</button></div><div class="update-list"><div><img src="{{ asset('images/bedroom-image.png') }}"><span><b>Executive Room</b><small>Updated room details and images</small></span><time>2 hours ago</time><button><i class="ri-pencil-line"></i> Edit</button></div><div><img src="{{ asset('images/view-imge.png') }}"><span><b>Gallery Images</b><small>Added 5 new images</small></span><time>5 hours ago</time><button><i class="ri-pencil-line"></i> Edit</button></div><div><img src="{{ asset('images/fresh-food-icon.svg') }}"><span><b>Restaurant Menu</b><small>Updated menu items and prices</small></span><time>1 day ago</time><button><i class="ri-pencil-line"></i> Edit</button></div></div></article>
            <article class="panel site-info" id="contact"><div class="panel-heading"><h2><i class="ri-settings-3-line"></i> Site Information</h2><button><i class="ri-pencil-line"></i> Edit</button></div><div class="info-status"><img src="{{ asset('images/web-logo.svg') }}" alt="Indus Resort"><div><span class="online">●</span><b>Website Status</b><small>Online</small><hr><b>Last Updated</b><small>30 Sep 2026, 10:45 AM</small></div></div><div class="contact-info"><span><i class="ri-phone-line"></i><b>Phone Number</b><small>0300-0533333</small></span><span><i class="ri-map-pin-line"></i><b>Location</b><small>Governor House Road, Aliot Bazar,<br>Kohala Road, Murree</small></span><span><i class="ri-mail-line"></i><b>Email Address</b><small>indusresort7861@gmail.com</small></span></div></article>
        </section>
        <div id="rooms" class="anchor"></div><div id="footer" class="anchor"></div>
    </main>
</div>
<script>
const sidebar=document.getElementById('sidebar'); document.querySelector('.menu-toggle').onclick=()=>sidebar.classList.add('open'); document.querySelector('.sidebar-close').onclick=()=>sidebar.classList.remove('open'); document.querySelectorAll('.menu a').forEach(a=>a.onclick=()=>{document.querySelectorAll('.menu a').forEach(x=>x.classList.remove('active'));a.classList.add('active');sidebar.classList.remove('open')});
</script>
</body>
</html>
