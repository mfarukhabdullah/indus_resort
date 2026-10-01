<aside class="sidebar" id="sidebar">
    <button class="sidebar-close" aria-label="Close menu"><i class="ri-close-line"></i></button>
    <a href="{{ url('/') }}" class="brand">
        <img src="{{ asset('images/web-logo.svg') }}" alt="Indus Resort">
        <span>ADMIN PANEL</span>
    </a>
    <nav class="menu" aria-label="Admin navigation">
        <a class="{{ (isset($active) && $active === 'dashboard') || (!isset($active) && request()->routeIs('admin.login')) ? 'active' : '' }}" href="{{ route('admin.login') }}"><i class="ri-home-5-line"></i> Dashboard</a>
        <a class="{{ (isset($active) && $active === 'home-settings') || (!isset($active) && request()->routeIs('admin.home-settings*')) ? 'active' : '' }}" href="{{ route('admin.home-settings') }}"><i class="ri-settings-3-line"></i> Home Settings</a>
        <a class="{{ (isset($active) && $active === 'rooms') || (!isset($active) && request()->routeIs('admin.rooms*')) ? 'active' : '' }}" href="{{ route('admin.rooms') }}"><i class="ri-hotel-bed-line"></i> Rooms &amp; Suites</a>
        <a class="{{ (isset($active) && $active === 'gallery') || (!isset($active) && request()->routeIs('admin.gallery*')) ? 'active' : '' }}" href="{{ route('admin.gallery') }}"><i class="ri-image-line"></i> Gallery</a>
        <a class="{{ (isset($active) && $active === 'messages') || (!isset($active) && request()->routeIs('admin.messages*')) ? 'active' : '' }}" href="{{ route('admin.messages') }}"><i class="ri-message-3-line"></i> Messages</a>
        <a class="{{ (isset($active) && $active === 'contact-settings') || (!isset($active) && request()->routeIs('admin.contact-settings*')) ? 'active' : '' }}" href="{{ route('admin.contact-settings') }}"><i class="ri-mail-line"></i> Contact Us</a>
        <a class="{{ (isset($active) && $active === 'seo-settings') || (!isset($active) && request()->routeIs('admin.seo-settings*')) ? 'active' : '' }}" href="{{ route('admin.seo-settings') }}"><i class="ri-search-eye-line"></i> SEO Settings</a>
        <a class="{{ (isset($active) && $active === 'footer-settings') || (!isset($active) && request()->routeIs('admin.footer-settings*')) ? 'active' : '' }}" href="{{ route('admin.footer-settings') }}"><i class="ri-layout-bottom-line"></i> Footer Settings</a>
        <a class="{{ (isset($active) && $active === 'change-password') || (!isset($active) && request()->routeIs('admin.change-password*')) ? 'active' : '' }}" href="{{ route('admin.change-password') }}"><i class="ri-lock-password-line"></i> Change Password</a>
    </nav>
    <div class="sidebar-footer">
        <span>Indus Resort &amp; Restaurant</span>
        <span>Admin Panel · v1.0.0</span>
        <form method="POST" action="{{ route('admin.logout') }}" style="margin-top: 6px;">
            @csrf
            <button type="submit" style="background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.18); color: #fff; padding: 5px 8px; border-radius: 4px; font-size: 10px; cursor: pointer; display: flex; align-items: center; gap: 4px; width: 100%; justify-content: center;">
                <i class="ri-logout-box-r-line"></i> Logout
            </button>
        </form>
    </div>
</aside>
