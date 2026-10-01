<!-- Footer Component: Indus Resort Murree -->
<footer class="indus-footer" id="contact">
    <div class="inner-container">
            
            <!-- Footer Main Content Grid -->
            <div class="footer-main-grid">
                
                <!-- Column 1: Brand & Socials -->
                <div class="footer-col-brand">
                    <a href="{{ url('/') }}" class="header-logo-container" style="margin-bottom: 1.25rem;">
                        <img src="{{ asset('images/web-logo.svg') }}" alt="Indus Resort Murree" class="header-logo-img">
                        <div class="logo-text-group">
                            <span class="logo-brand-title">INDUS RESORT</span>
                            <span class="logo-location-subtitle">MURREE</span>
                        </div>
                    </a>

                    <p class="footer-brand-desc">
                        {{ $footerSettings['description'] }}
                    </p>

                    <div class="footer-social-links">
                        <a href="{{ $footerSettings['instagram'] ?: '#' }}" target="_blank" class="social-icon-btn" aria-label="Instagram">
                            <i class="ri-instagram-line"></i>
                        </a>
                        <a href="{{ $footerSettings['facebook'] ?: '#' }}" target="_blank" class="social-icon-btn" aria-label="Facebook">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="{{ $footerSettings['whatsapp'] ?: '#' }}" target="_blank" class="social-icon-btn" aria-label="WhatsApp">
                            <i class="ri-whatsapp-line"></i>
                        </a>
                    </div>
                </div>

                <!-- Column 2: Quick Links (Exact Size: 127px x 221.95px) -->
                <div class="footer-col-quicklinks">
                    <h3 class="footer-heading">Quick Links</h3>
                    <ul class="footer-nav-list">
                        @php($footerLinks = ['home' => ['Home', url('/')], 'about' => ['About', url('/about')], 'rooms' => ['Rooms & Suites', url('/rooms')], 'gallery' => ['Gallery', url('/#gallery')], 'contact' => ['Contact Us', url('/contact')]])
                        @foreach($footerSettings['quick_links'] as $key)
                            @if(isset($footerLinks[$key]))<li><a href="{{ $footerLinks[$key][1] }}">{{ $footerLinks[$key][0] }}</a></li>@endif
                        @endforeach
                    </ul>
                </div>

                <!-- Column 3: Get in Touch (Exact Size: 302.81px x 173px) -->
                <div class="footer-col-contact">
                    <h3 class="footer-heading">Get in Touch</h3>
                    <ul class="footer-contact-list">
                        <li class="contact-item">
                            <i class="ri-map-pin-line contact-icon"></i>
                            <span>{{ $contactSettings['location'] }}</span>
                        </li>
                        <li class="contact-item">
                            <i class="ri-phone-line contact-icon"></i>
                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', $contactSettings['phone']) }}">{{ $contactSettings['phone'] }}</a>
                        </li>
                        <li class="contact-item">
                            <i class="ri-mail-line contact-icon"></i>
                            <a href="mailto:{{ $contactSettings['email'] }}">{{ $contactSettings['email'] }}</a>
                        </li>
                    </ul>
                </div>

            </div>

            <!-- Footer Bottom Line -->
            <div class="footer-bottom-bar">
                <p class="copyright-text">© 2026 Indus Resort Murree. All rights reserved.</p>
                <p class="tagline-text">Crafted with care for unforgettable mountain stays.</p>
            </div>

    </div>
</footer>

<!-- Floating WhatsApp Button -->
<a href="https://wa.me/923000053333" target="_blank" class="floating-whatsapp" aria-label="Chat on WhatsApp">
    <i class="ri-whatsapp-line"></i>
</a>

<style>
    .floating-whatsapp {
        position: fixed;
        bottom: 25px;
        right: 25px;
        background-color: #25d366;
        color: white;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 35px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        z-index: 1000;
        transition: transform 0.3s ease;
        text-decoration: none;
    }
    .floating-whatsapp:hover {
        transform: scale(1.1);
        color: white;
    }
    @media (max-width: 768px) {
        .floating-whatsapp {
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            font-size: 30px;
        }
    }
</style>
