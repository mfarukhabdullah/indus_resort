<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <title>{{ $seo['rooms']['title'] }}</title><meta name="description" content="{{ $seo['rooms']['description'] }}"><meta name="keywords" content="{{ $seo['rooms']['keywords'] }}"><meta name="robots" content="{{ $seo['rooms']['robots'] }}"><link rel="canonical" href="{{ url()->current() }}">
    <meta name="description" content="Elegant, comfortable spaces designed to make every moment of your stay memorable.">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Libre+Baskerville:wght@400;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');
    
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }
    body {
        background-color: #fcfbf9;
        margin: 0;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .page-wrapper {
        width: 100%;
        background-color: #fff;
        overflow: hidden;
    }
    
    /* Typography */
    h1, h2, h3, h4 {
        font-family: 'Libre Baskerville', serif;
        color: #000;
    }
    p {
        color: #000;
        line-height: 1.6;
    }
    
    /* Inner Container */
    .inner-container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        box-sizing: border-box;
    }

    /* About Hero Section */
    .about-hero {
        position: relative;
        height: 430px;
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        padding-top: 80px; /* Offset for header */
        width: 100%;
    }
    .about-hero::before {
        display: none;
    }
    .about-hero-content {
        position: relative;
        z-index: 10;
        color: #fff;
        text-align: left;
    }
    .about-hero-content h1 {
        color: #fff;
        font-size: 48px;
        margin-bottom: 15px;
        font-family: 'Libre Baskerville', serif;
    }
    .about-hero-content p {
        color: #FFFF;
        font-size: 18px;
    }

    /* Rooms Intro Section */
    .rooms-intro {
        text-align: center;
        padding: 15px 0 20px 0;
    }
    .rooms-intro h2 {
        font-size: 36px;
        margin-bottom: 8px;
    }
    .rooms-intro p {
        font-size: 16px;
        max-width: 600px;
        margin: 0 auto;
        color: #333;
    }

    /* Room Cards */
    .rooms-list {
        padding-bottom: 0;
    }
    .room-card {
        display: flex;
        background: #FAF6EC;
        border-radius: 20px;
        overflow: hidden;
        margin-bottom: 15px;
        flex-direction: row;
        align-items: stretch;
        height: 450px;
    }
    .room-card:nth-child(even) {
        flex-direction: row-reverse;
    }
    .room-image-slider {
        position: relative;
        flex: 1;
        max-width: 50%;
    }
    .room-image-slider img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        display: block;
    }
    .slider-dots {
        position: absolute;
        bottom: 15px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 12px;
        z-index: 10;
        padding: 5px;
    }
    .dot {
        width: 10px;
        height: 10px;
        background: rgba(255, 255, 255, 0.5);
        border-radius: 50%;
        cursor: pointer;
        position: relative;
    }
    .dot::after {
        content: '';
        position: absolute;
        top: -10px; left: -10px; right: -10px; bottom: -10px;
    }
    .dot.active {
        background: #C9A84C;
        width: 20px;
        border-radius: 4px;
    }

    .room-info {
        flex: 1;
        padding: 25px 30px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .room-info h3 {
        font-family: 'Libre Baskerville', serif;
        font-weight: 600;
        font-size: 24px;
        line-height: 30px;
        color: #362618;
        margin-bottom: 10px;
    }
    .room-info > p {
        font-family: 'Inter', sans-serif;
        font-weight: 400;
        font-size: 16px;
        line-height: 24px;
        color: #414141;
        margin-bottom: 15px;
    }
    .room-price {
        font-family: 'Libre Baskerville', serif;
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 15px;
        color: #362618;
    }

    .room-stats {
        display: flex;
        gap: 20px;
        margin-bottom: 15px;
        flex-wrap: wrap;
    }
    .stat-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #fff;
        padding: 6px 12px 6px 6px;
        border-radius: 6px;
        font-family: 'Libre Baskerville', serif;
        font-size: 13px;
        font-weight: 600;
        color: #362618;
    }
    .stat-badge i {
        background-color: #133827;
        color: #fff;
        font-size: 16px;
        width: 26px;
        height: 26px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
    }

    .room-amenities {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        margin-bottom: 20px;
    }
    .amenity-item {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
        color: #333;
    }
    .amenity-item i {
        color: #133827;
    }

    .btn-reserve {
        width: 250px;
        height: 52px;
        background-color: #ffffff;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        padding: 0 4px;
        text-decoration: none;
        flex-shrink: 0;
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
        z-index: 1;
        margin-top: 10px;
    }
    .btn-reserve::before {
        content: '';
        position: absolute;
        top: 4px;
        left: 4px;
        height: calc(100% - 8px);
        width: 0%;
        background-color: #133827;
        border-radius: 6px;
        transition: width 0.4s cubic-bezier(0.25, 1, 0.5, 1);
        z-index: 1;
    }
    .btn-reserve:hover::before {
        width: calc(100% - 8px);
    }
    .btn-reserve:hover {
        background-color: #ffffff !important;
    }
    .btn-reserve-icon {
        width: 36px;
        height: 44px;
        background-color: #133827;
        color: #fff;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        left: 4px;
        top: 4px;
        flex-shrink: 0;
        z-index: 2;
        font-size: 18px;
        transition: left 0.4s cubic-bezier(0.25, 1, 0.5, 1), background-color 0.4s;
    }
    .btn-reserve:hover .btn-reserve-icon {
        left: calc(100% - 40px);
        background-color: #133827 !important;
    }
    .btn-reserve-text {
        font-family: 'Libre Baskerville', serif;
        font-weight: 700;
        font-size: 14px;
        color: #133827;
        white-space: nowrap;
        position: relative;
        z-index: 2;
        margin-left: 52px;
        transition: color 0.3s ease, transform 0.4s cubic-bezier(0.25, 1, 0.5, 1);
    }
    .btn-reserve:hover .btn-reserve-text {
        color: #ffffff !important;
        transform: translateX(-40px);
    }

    /* Policies Section */
    .stay-policies {
        padding: 0 0 30px 0;
        text-align: center;
    }
    .stay-policies h2 {
        font-family: 'Libre Baskerville', serif;
        font-size: 32px;
        font-weight: 700;
        color: #111;
        margin-bottom: 8px;
    }
    .stay-policies .inner-container > p {
        margin-bottom: 30px;
        color: #000;
    }
    .policies-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }
    .policy-card {
        background: #fff;
        border: 0.5px solid rgba(0, 0, 0, 0.3);
        border-radius: 12px;
        padding: 40px 20px;
        box-shadow: 0 0 14px rgba(0, 0, 0, 0.13);
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .policy-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.08);
    }
    .policy-icon {
        width: 50px;
        height: 50px;
        background: #f0f6f3;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px auto;
    }
    .policy-icon i {
        font-size: 24px;
        color: #133827;
    }
    .policy-card h4 {
        font-family: 'Libre Baskerville', serif;
        font-size: 16px;
        font-weight: 700;
        color: #111;
        margin-bottom: 12px;
    }
    .policy-card p {
        font-family: 'Inter', sans-serif;
        font-size: 13px;
        color: #444;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .room-card {
            flex-direction: column !important;
            height: auto;
            padding: 12px;
        }
        .room-image-slider {
            max-width: 100%;
            height: 246px;
            border-radius: 12px;
            overflow: hidden;
        }
        .room-info {
            padding: 20px 8px 10px 8px;
        }
    }
    @media (max-width: 768px) {
        .about-hero {
            height: auto;
            min-height: 380px;
            padding-top: 110px;
            padding-bottom: 45px;
            text-align: center;
        }
        .about-hero-content {
            text-align: center;
        }
        .about-hero-content h1 {
            font-size: 32px;
            line-height: 1.25;
            margin-bottom: 12px;
        }
        .about-hero-content p {
            font-size: 18px;
            line-height: 1.5;
        }
        .about-hero-content p br {
            display: none;
        }
        .rooms-intro h2 {
            font-size: 24px;
            line-height: 1.3;
        }
        .stay-policies h2 {
            font-size: 24px;
            line-height: 1.3;
        }
        .policies-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }
        .policy-card {
            padding: 25px 20px;
            border: 0.5px solid rgba(0, 0, 0, 0.3);
            box-shadow: 0 0 14px rgba(0, 0, 0, 0.1);
        }
        .room-image-slider {
            flex: none;
            width: 100%;
            height: 246px !important;
            min-height: 246px;
        }
        .room-info h3 {
            font-size: 22px;
        }
        .room-info > p {
            font-size: 14px;
            line-height: 22px;
        }
        .room-amenities {
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }
        .btn-reserve {
            width: 100%;
        }
    }
</style>
</head>
<body>

@include('components.header')

<div class="page-wrapper">
    <!-- Hero component reused from about, with different data -->
    @include('components.hero', [
        'title' => 'Rooms & Suites',
        'subtitle' => 'Elegant, comfortable spaces designed to make every moment of your stay <br> memorable.',
        'image' => 'images/room-banner.webp'
    ])

    <section class="rooms-intro">
        <div class="inner-container">
            <h2>Choose Your Perfect Retreat</h2>
            <p>Every room and cabin at Indus Resort is designed with comfort, warmth, and mountain views in mind.</p>
        </div>
    </section>

    <section class="rooms-list">
        <div class="inner-container">
            @if(false)
            <!-- Original room samples kept for layout reference -->
            <div class="room-card">
                <div class="room-image-slider" data-images="{{ asset('images/mountain-view-one.webp') }},{{ asset('images/mountain-view-two.webp') }},{{ asset('images/mountain-view-five.webp') }},{{ asset('images/mountain-view-six.webp') }},{{ asset('images/bedroom-balcony-Cradtk-four.webp') }}">
                    <img src="{{ asset('images/mountain-view-one.webp') }}" alt="3 Room Portion">
                    <div class="slider-dots">
                        <div class="dot active" onclick="changeSlide(this, 0)"></div>
                        <div class="dot" onclick="changeSlide(this, 1)"></div>
                        <div class="dot" onclick="changeSlide(this, 2)"></div>
                        <div class="dot" onclick="changeSlide(this, 3)"></div>
                        <div class="dot" onclick="changeSlide(this, 4)"></div>
                    </div>
                </div>
                <div class="room-info">
                    <h3>3 Room Portion (Mountain View)</h3>
                    <p>A spacious 3-bedroom portion with a cozy TV lounge and dining area, opening onto a private balcony with breathtaking mountain views.</p>
                    <div class="room-price">PKR 35,000 / Night</div>
                    
                    <div class="room-stats">
                        <div class="stat-badge"><i class="ri-star-fill"></i> 5.0</div>
                        <div class="stat-badge"><i class="ri-hotel-bed-line"></i> 3 Bedrooms</div>
                        <div class="stat-badge"><i class="ri-group-line"></i> 6 Persons</div>
                    </div>

                    <div class="room-amenities">
                        <div class="amenity-item"><i class="ri-check-line"></i> TV Lounge</div>
                        <div class="amenity-item"><i class="ri-check-line"></i> Dining Area</div>
                        <div class="amenity-item"><i class="ri-check-line"></i> Balcony with Mountain View</div>
                    </div>

                    <a href="https://wa.me/923000053333?text=Hi%2C%20I%20want%20to%20reserve%20a%20room%20at%20Indus%20Resort%20Murree" target="_blank" class="btn-reserve">
                        <div class="btn-reserve-icon"><i class="ri-arrow-right-s-line"></i></div>
                        Reserve This Room
                    </a>
                </div>
            </div>

            <!-- Room 2 (Flipped via CSS) -->
            <div class="room-card">
                <div class="room-image-slider" data-images="{{ asset('images/lawn-access-one.webp') }},{{ asset('images/lawn-access-two.webp') }},{{ asset('images/lawn-access-three.webp') }},{{ asset('images/lawn-access-four.webp') }},{{ asset('images/lawn-access-five.webp') }}">
                    <img src="{{ asset('images/lawn-access-one.webp') }}" alt="3 Room Portion">
                    <div class="slider-dots">
                        <div class="dot active" onclick="changeSlide(this, 0)"></div>
                        <div class="dot" onclick="changeSlide(this, 1)"></div>
                        <div class="dot" onclick="changeSlide(this, 2)"></div>
                        <div class="dot" onclick="changeSlide(this, 3)"></div>
                        <div class="dot" onclick="changeSlide(this, 4)"></div>
                    </div>
                </div>
                <div class="room-info">
                    <h3>3 Room Portion (Lawn Access)</h3>
                    <p>Perfect for families and groups, this 3-bedroom portion features a TV lounge, dining area and direct access to a private lawn.</p>
                    <div class="room-price">PKR 35,000 / Night</div>
                    
                    <div class="room-stats">
                        <div class="stat-badge"><i class="ri-star-fill"></i> 5.0</div>
                        <div class="stat-badge"><i class="ri-hotel-bed-line"></i> 3 Bedrooms</div>
                        <div class="stat-badge" style="color: #e53e3e;"><i class="ri-close-line" style="background-color: transparent; color: #e53e3e; font-size: 18px; width: auto; height: auto;"></i> No Kitchen</div>
                    </div>

                    <div class="room-amenities">
                        <div class="amenity-item"><i class="ri-check-line"></i> TV Lounge</div>
                        <div class="amenity-item"><i class="ri-check-line"></i> Dining Area</div>
                        <div class="amenity-item"><i class="ri-check-line"></i> Balcony with Mountain View</div>
                    </div>

                    <a href="https://wa.me/923000053333?text=Hi%2C%20I%20want%20to%20reserve%20a%20room%20at%20Indus%20Resort%20Murree" target="_blank" class="btn-reserve">
                        <div class="btn-reserve-icon"><i class="ri-arrow-right-s-line"></i></div>
                        Reserve This Room
                    </a>
                </div>
            </div>

            <!-- Room 3 -->
            <div class="room-card">
                <div class="room-image-slider" data-images="{{ asset('images/suite-three.webp') }},{{ asset('images/mountain-view-one.webp') }},{{ asset('images/mountain-view-two.webp') }},{{ asset('images/mountain-view-five.webp') }}">
                    <img src="{{ asset('images/suite-three.webp') }}" alt="2 Rooms Suite">
                    <div class="slider-dots">
                        <div class="dot active" onclick="changeSlide(this, 0)"></div>
                        <div class="dot" onclick="changeSlide(this, 1)"></div>
                        <div class="dot" onclick="changeSlide(this, 2)"></div>
                        <div class="dot" onclick="changeSlide(this, 3)"></div>
                    </div>
                </div>
                <div class="room-info">
                    <h3>2 Rooms Suite</h3>
                    <p>A comfortable 2-bedroom suite with its own kitchen, TV lounge, dining area and a huge balcony to relax and enjoy the view.</p>
                    <div class="room-price">PKR 35,000 / Night</div>
                    
                    <div class="room-stats">
                        <div class="stat-badge"><i class="ri-star-fill"></i> 5.0</div>
                        <div class="stat-badge"><i class="ri-hotel-bed-line"></i> 2 Bedrooms</div>
                        <div class="stat-badge"><i class="ri-cup-hot-line"></i> Kitchen Available</div>
                    </div>

                    <div class="room-amenities">
                        <div class="amenity-item"><i class="ri-check-line"></i> TV Lounge</div>
                        <div class="amenity-item"><i class="ri-check-line"></i> Dining Area</div>
                        <div class="amenity-item"><i class="ri-check-line"></i> Balcony with Mountain View</div>
                    </div>

                    <a href="https://wa.me/923000053333?text=Hi%2C%20I%20want%20to%20reserve%20a%20room%20at%20Indus%20Resort%20Murree" target="_blank" class="btn-reserve">
                        <div class="btn-reserve-icon"><i class="ri-arrow-right-s-line"></i></div>
                        Reserve This Room
                    </a>
                </div>
            </div>
            @endif
            @foreach($rooms as $room)
                <div class="room-card">
                    <div class="room-image-slider" data-images="{{ implode(',', array_map('asset', $room['images'])) }}">
                        <img src="{{ asset($room['images'][0] ?? 'images/bed-image.jpg') }}" alt="{{ $room['title'] }}">
                        @if(count($room['images']) > 1)<div class="slider-dots">@foreach($room['images'] as $index => $image)<div class="dot {{ $index === 0 ? 'active' : '' }}" onclick="changeSlide(this, {{ $index }})"></div>@endforeach</div>@endif
                    </div>
                    <div class="room-info"><h3>{{ $room['title'] }}</h3><p>{{ $room['description'] }}</p><div class="room-price">PKR {{ $room['price'] }} / Night</div><div class="room-stats">@if(!empty($room['rating']))<div class="stat-badge"><i class="ri-star-fill"></i> {{ $room['rating'] }}</div>@endif<div class="stat-badge"><i class="ri-hotel-bed-line"></i> {{ $room['bedrooms'] }} Bedrooms</div>@if(!empty($room['persons']))<div class="stat-badge"><i class="ri-group-line"></i> {{ $room['persons'] }} Persons</div>@endif @if(($room['kitchen'] ?? 'no') === 'yes')<div class="stat-badge"><i class="ri-restaurant-line"></i> Kitchen Available</div>@else <div class="stat-badge" style="color:#e53e3e"><i class="ri-close-line"></i> No Kitchen</div>@endif</div><div class="room-amenities">@foreach($room['features'] as $feature)@if(!in_array(strtolower(trim($feature)), ['kitchen','kitchen available','no kitchen']))<div class="amenity-item"><i class="ri-check-line"></i> {{ $feature }}</div>@endif @endforeach</div><a href="https://wa.me/923000053333?text=Hi%2C%20I%20want%20to%20reserve%20a%20room%20at%20Indus%20Resort%20Murree" target="_blank" class="btn-reserve"><div class="btn-reserve-icon"><i class="ri-arrow-right-s-line"></i></div><span class="btn-reserve-text">Reserve This Room</span></a></div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Policies -->
    <section class="stay-policies">
        <div class="inner-container">
            <h2>Your Stay, Seamlessly Planned</h2>
            <p>Check-in, check-out, and cancellation information for a smooth stay.</p>
            
            <div class="policies-grid">
                <div class="policy-card">
                    <div class="policy-icon">
                        <i class="ri-login-box-line"></i>
                    </div>
                    <h4>Check-in</h4>
                    <p>From 2:00 PM onwards</p>
                </div>
                <div class="policy-card">
                    <div class="policy-icon">
                        <i class="ri-logout-box-r-line"></i>
                    </div>
                    <h4>Check-out</h4>
                    <p>Until 12:00 PM noon</p>
                </div>
                <div class="policy-card">
                    <div class="policy-icon">
                        <i class="ri-close-circle-line"></i>
                    </div>
                    <h4>Cancellation</h4>
                    <p>Free up to 48 hours before arrival</p>
                </div>
            </div>
        </div>
    </section>
</div>

@include('components.footer')

<script>
    function changeSlide(dotElement, index) {
        const slider = dotElement.closest('.room-image-slider');
        const images = slider.getAttribute('data-images').split(',');
        const imgElement = slider.querySelector('img');

        if (images[index]) {
            imgElement.src = images[index].trim();
        }

        const dots = slider.querySelectorAll('.dot');
        dots.forEach(d => d.classList.remove('active'));
        dotElement.classList.add('active');
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Automatically remove # from URL if it exists
        if (window.location.hash) {
            history.replaceState(null, null, window.location.href.split('#')[0]);
        }

        const sliders = document.querySelectorAll('.room-image-slider');
        
        sliders.forEach(slider => {
            const dots = slider.querySelectorAll('.dot');
            if (dots.length > 1) {
                let currentIndex = 0;
                setInterval(() => {
                    currentIndex = (currentIndex + 1) % dots.length;
                    changeSlide(dots[currentIndex], currentIndex);
                }, 3000); // 3 seconds interval
            }
        });
    });
</script>

</body>
</html>
