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
                    <li><a href="{{ url('/') }}" class="header-nav-link">Home</a></li>
                    <li><a href="{{ url('/about') }}" class="header-nav-link">About</a></li>
                    <li><a href="{{ url('/rooms') }}" class="header-nav-link">Rooms & Suites</a></li>
                    <li><a href="{{ url('/#gallery') }}" class="header-nav-link">Gallery</a></li>
                    <li><a href="{{ url('/#contact') }}" class="header-nav-link">Contact Us</a></li>
                </ul>
            </nav>

            <!-- Book Now Button (Exact Dimension: 198px x 60px) -->
            <a href="#booking" class="header-book-btn" onclick="openBookingModal('Deluxe Suite', 350); return false;">
                <div class="book-btn-icon-box">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.5 2.5L8 6L4.5 9.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <span class="book-btn-text">BOOK NOW</span>
            </a>

            <!-- Mobile Hamburger Toggle (Exact Dimension: 40px x 40.19px) -->
            <button class="mobile-nav-toggle" aria-label="Toggle Navigation" onclick="toggleMobileNav()">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="8" y="11" width="24" height="2.5" rx="1.25" fill="white"/>
                    <rect x="8" y="19.5" width="24" height="2.5" rx="1.25" fill="white"/>
                    <rect x="8" y="28" width="24" height="2.5" rx="1.25" fill="white"/>
                </svg>
            </button>

    </div>
</header>
