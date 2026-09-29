<!-- Header Component: Indus Resort Murree -->
<header class="indus-header" id="navbar">
    <div class="outer-container">
        <div class="container-1240 header-wrapper">
            
            <!-- Logo Section (Exact Dimension: 226.07px x 60px) -->
            <a href="{{ url('/') }}" class="header-logo-container">
                <div class="logo-badge-icon">
                    <svg width="60" height="60" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="24" cy="24" r="23" fill="#133827" stroke="#c5a059" stroke-width="1.5"/>
                        <!-- Sun/Moon -->
                        <circle cx="33" cy="15" r="2.5" fill="#e5bd6a"/>
                        <!-- Mountain Peaks -->
                        <path d="M10 33L19 20L25 28L32 17L39 33H10Z" fill="#1d543b"/>
                        <path d="M15 33L22 23L27 30L34 19L39 33H15Z" stroke="#dfb56c" stroke-width="1.2" fill="none"/>
                        <!-- River lines -->
                        <path d="M12 35C16 33 20 37 25 35C30 33 34 36 38 35" stroke="#90c2a5" stroke-width="1" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="logo-text-group">
                    <span class="logo-brand-title">Indus Resort</span>
                    <span class="logo-location-subtitle">M U R R E E</span>
                </div>
            </a>

            <!-- Navigation Links Section -->
            <nav class="header-nav">
                <ul class="header-nav-list">
                    <li><a href="#home" class="header-nav-link">Home</a></li>
                    <li><a href="#about" class="header-nav-link">About</a></li>
                    <li><a href="#rooms" class="header-nav-link">Rooms & Suites</a></li>
                    <li><a href="#gallery" class="header-nav-link">Gallery</a></li>
                    <li><a href="#contact" class="header-nav-link">Contact Us</a></li>
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
    </div>
</header>
