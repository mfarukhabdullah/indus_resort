<!-- Header Component: Indus Resort Murree -->
<header class="indus-header" id="navbar">
    <div class="inner-container header-wrapper">
            
            <!-- Logo Section -->
            <a href="{{ url('/') }}" class="header-logo-container">
                <img src="{{ asset('images/web-logo.svg') }}" alt="Indus Resort Murree" class="header-logo-img">
                <div class="logo-text-group">
                    <span class="logo-brand-title">INDUS RESORT</span>
                    <span class="logo-location-subtitle">MURREE</span>
                </div>
            </a>

            <!-- Navigation Links Section -->
            <nav class="header-nav">
                <ul class="header-nav-list">
                    <li><a href="{{ url('/') }}" class="header-nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                    <li><a href="{{ url('/about') }}" class="header-nav-link {{ request()->is('about*') ? 'active' : '' }}">About</a></li>
                    <li><a href="{{ url('/#rooms') }}" class="header-nav-link">Rooms & Suites</a></li>
                    <li><a href="{{ url('/#gallery') }}" class="header-nav-link">Gallery</a></li>
                    <li><a href="{{ url('/contact') }}" class="header-nav-link {{ request()->is('contact*') ? 'active' : '' }}">Contact Us</a></li>
                </ul>
            </nav>

            <!-- Book Now Button (Exact Dimension: 198px x 60px) -->
            <a href="https://wa.me/923000053333" target="_blank" class="header-book-btn">
                <div class="book-btn-icon-box">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.5 2.5L8 6L4.5 9.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <span class="book-btn-text">BOOK NOW</span>
            </a>

            <!-- Mobile Hamburger Toggle -->
            <button class="mobile-nav-toggle" aria-label="Toggle Navigation" onclick="toggleMobileNav()">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="8" y="11" width="24" height="2.5" rx="1.25" fill="white"/>
                    <rect x="8" y="19.5" width="24" height="2.5" rx="1.25" fill="white"/>
                    <rect x="8" y="28" width="24" height="2.5" rx="1.25" fill="white"/>
                </svg>
            </button>

    </div>
</header>

<!-- Mobile Menu Modal / Overlay (Matching Figma Design) -->
<div class="mobile-menu-overlay" id="mobileMenuOverlay">
    <div class="mobile-menu-header">
        <a href="{{ url('/') }}" class="header-logo-container">
            <img src="{{ asset('images/web-logo.svg') }}" alt="Indus Resort Murree" class="header-logo-img">
            <div class="logo-text-group">
                <span class="logo-brand-title">INDUS RESORT</span>
                <span class="logo-location-subtitle">MURREE</span>
            </div>
        </a>
        <button class="mobile-menu-close" aria-label="Close Menu" onclick="toggleMobileNav()">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 6L6 18M6 6L18 18" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    </div>
    <div class="mobile-menu-content">
        <div class="mobile-menu-card">
            <ul class="mobile-menu-list">
                <li>
                    <a href="{{ url('/') }}" class="mobile-menu-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                </li>
                <li>
                    <a href="{{ url('/about') }}" class="mobile-menu-link {{ request()->is('about*') ? 'active' : '' }}">About</a>
                </li>
                <li>
                    <a href="{{ url('/#rooms') }}" class="mobile-menu-link {{ request()->is('rooms*') ? 'active' : '' }}">Rooms & Suites</a>
                </li>
                <li>
                    <a href="{{ url('/#gallery') }}" class="mobile-menu-link {{ request()->is('gallery*') ? 'active' : '' }}">Gallery</a>
                </li>
                <li>
                    <a href="{{ url('/contact') }}" class="mobile-menu-link {{ request()->is('contact*') ? 'active' : '' }}">Contact Us</a>
                </li>
            </ul>
            <a href="https://wa.me/923000053333" target="_blank" class="mobile-book-btn" onclick="toggleMobileNav();">
                Book Now
            </a>
        </div>
    </div>
</div>

<script>
    function toggleMobileNav() {
        const overlay = document.getElementById('mobileMenuOverlay');
        if (overlay) {
            overlay.classList.toggle('active');
            document.body.classList.toggle('mobile-menu-open');
        }
    }
</script>
