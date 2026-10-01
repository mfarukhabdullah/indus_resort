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
                        @php
                            $socialLinks = $footerSettings['social_list'] ?? [];
                            if (empty($socialLinks)) {
                                $defaults = [
                                    'instagram' => ['name' => 'Instagram', 'icon' => 'ri-instagram-line'],
                                    'facebook'  => ['name' => 'Facebook', 'icon' => 'ri-facebook-fill'],
                                    'whatsapp'  => ['name' => 'WhatsApp', 'icon' => 'ri-whatsapp-line'],
                                    'youtube'   => ['name' => 'YouTube', 'icon' => 'ri-youtube-fill'],
                                    'tiktok'    => ['name' => 'TikTok', 'icon' => 'ri-tiktok-fill'],
                                    'twitter'   => ['name' => 'X (Twitter)', 'icon' => 'ri-twitter-x-line'],
                                    'linkedin'  => ['name' => 'LinkedIn', 'icon' => 'ri-linkedin-fill'],
                                    'pinterest' => ['name' => 'Pinterest', 'icon' => 'ri-pinterest-line'],
                                    'snapchat'  => ['name' => 'Snapchat', 'icon' => 'ri-snapchat-fill'],
                                    'telegram'  => ['name' => 'Telegram', 'icon' => 'ri-telegram-fill'],
                                ];
                                foreach ($defaults as $k => $m) {
                                    if (!empty($footerSettings[$k])) {
                                        $socialLinks[] = ['name' => $m['name'], 'icon' => $m['icon'], 'url' => $footerSettings[$k]];
                                    }
                                }
                                if (!empty($footerSettings['custom_socials'])) {
                                    foreach ($footerSettings['custom_socials'] as $c) {
                                        if (!empty($c['url'])) {
                                            $socialLinks[] = ['name' => $c['title'] ?? 'Social Link', 'icon' => $c['icon'] ?? 'ri-global-line', 'url' => $c['url']];
                                        }
                                    }
                                }
                            }
                        @endphp

                        @foreach($socialLinks as $social)
                            <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer" class="social-icon-btn" aria-label="{{ $social['name'] }}" title="{{ $social['name'] }}">
                                @if(($social['type'] ?? '') === 'svg' && ($social['svg'] ?? '') === 'airbnb')
                                    <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12.001 18.275c-1.353-1.697-2.148-3.184-2.413-4.457-.263-1.027-.16-1.848.291-2.465.477-.71 1.188-1.056 2.121-1.056s1.643.345 2.12 1.063c.446.61.558 1.432.286 2.465-.291 1.298-1.085 2.785-2.412 4.458zm9.601 1.14c-.185 1.246-1.034 2.28-2.2 2.783-2.253.98-4.483-.583-6.392-2.704 3.157-3.951 3.74-7.028 2.385-9.018-.795-1.14-1.933-1.695-3.394-1.695-2.944 0-4.563 2.49-3.927 5.382.37 1.565 1.352 3.343 2.917 5.332-.98 1.085-1.91 1.856-2.732 2.333-.636.344-1.245.558-1.828.609-2.679.399-4.778-2.2-3.825-4.88.132-.345.395-.98.845-1.961l.025-.053c1.464-3.178 3.242-6.79 5.285-10.795l.053-.132.58-1.116c.45-.822.635-1.19 1.351-1.643.346-.21.77-.315 1.222-.315.426 0 .85.105 1.218.315.717.453.902.821 1.353 1.643l.582 1.116.053.132c2.043 4.005 3.82 7.617 5.284 10.795l.026.053c.45.98.713 1.616.845 1.961.953 2.68-1.146 5.279-3.825 4.88-.583-.051-1.192-.265-1.828-.609-.822-.477-1.752-1.248-2.732-2.333 1.565-1.989 2.547-3.767 2.917-5.332.636-2.892-.983-5.382-3.927-5.382-1.461 0-2.599.555-3.394 1.695-1.355 1.99-.772 5.067 2.385 9.018-1.909 2.121-4.139 3.684-6.392 2.704-1.166-.503-2.015-1.537-2.2-2.783z"/></svg>
                                @elseif(($social['type'] ?? '') === 'svg' && ($social['svg'] ?? '') === 'booking')
                                    <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M3 4h7.8c3 0 4.9 1.5 4.9 3.8 0 1.7-1 2.9-2.6 3.4 2 .5 3.3 1.9 3.3 3.9 0 2.6-2.1 4.5-5.3 4.5H3V4zm3.8 3.3v3h3.5c1.2 0 1.9-.6 1.9-1.5s-.7-1.5-1.9-1.5H6.8zm0 5.8v3.4h3.9c1.4 0 2.2-.7 2.2-1.7 0-1-.8-1.7-2.2-1.7H6.8zm12.4 3.7a1.8 1.8 0 110 3.6 1.8 1.8 0 010-3.6z"/></svg>
                                @elseif(($social['type'] ?? '') === 'svg' && ($social['svg'] ?? '') === 'tripadvisor')
                                    <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-5.5 13c-1.38 0-2.5-1.12-2.5-2.5S5.12 10 6.5 10s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5zm5.5-5c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm5.5 5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                                @elseif(($social['type'] ?? '') === 'svg' && ($social['svg'] ?? '') === 'agoda')
                                    <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><circle cx="4" cy="12" r="2.5"/><circle cx="12" cy="6" r="2.5"/><circle cx="20" cy="12" r="2.5"/><circle cx="8" cy="18" r="2.5"/><circle cx="16" cy="18" r="2.5"/></svg>
                                @else
                                    <i class="{{ $social['icon'] ?: 'ri-global-line' }}"></i>
                                @endif
                            </a>
                        @endforeach
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
<div class="whatsapp-container">
    <a href="https://wa.me/923000053333" target="_blank" class="floating-whatsapp" aria-label="Chat on WhatsApp">
        <i class="ri-whatsapp-line"></i>
    </a>
</div>

<style>
    .whatsapp-container {
        position: fixed;
        bottom: 25px;
        left: 0;
        right: 0;
        margin: 0 auto;
        max-width: 1200px;
        pointer-events: none;
        z-index: 1000;
    }
    .floating-whatsapp {
        position: absolute;
        bottom: 0;
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
        transition: transform 0.3s ease;
        text-decoration: none;
        pointer-events: auto;
    }
    .floating-whatsapp:hover {
        transform: scale(1.1);
        color: white;
    }
    @media (max-width: 768px) {
        .whatsapp-container {
            bottom: 20px;
        }
        .floating-whatsapp {
            right: 20px;
            width: 50px;
            height: 50px;
            font-size: 30px;
        }
    }
</style>
