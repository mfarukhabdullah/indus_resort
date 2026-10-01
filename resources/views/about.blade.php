<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Indus Resort Murree</title>
    <meta name="description" content="Discover the story, values, and mountain sanctuary experience of Indus Resort in Murree.">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');
    
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
    h1, h2, h3 {
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
        background-image: url('{{ asset("images/About-Us-banner.webp") }}');
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

    /* Section 1: Story */
    .about-story {
        padding: 45px 0;
        background-color: #fff;
        width: 100%;
    }
    .story-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
    }
    .story-images {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }
    .story-img-main {
        grid-column: 1 / span 2;
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-radius: 12px;
    }
    .story-img-sub {
        width: 100%;
        height: 160px;
        object-fit: cover;
        border-radius: 12px;
    }
    .story-text h2 {
        font-size: 36px;
        margin-bottom: 8px;
        line-height: 1.3;
        color:#000;
    }
    .story-text p {
        margin-bottom: 12px;
        font-size: 16px;
        color: #000;
        text-align: justify;
    }
    .btn-explore {
        display: inline-flex;
        align-items: center;
        background-color: #F5F1E7;
        color: #133827;
        padding: 6px 16px 6px 6px;
        border-radius: 6px;
        text-decoration: none;
        font-family: 'Libre Baskerville', serif;
        font-size: 14px;
        font-weight: 700;
        margin-top: 15px;
        gap: 12px;
        transition: all 0.3s ease;
    }
    .btn-explore-icon {
        width: 32px;
        height: 32px;
        background-color: #133827;
        color: #ffffff;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }
    .btn-explore:hover {
        background-color: #e8e2d2;
    }

    /* Section 2: What Makes Us Different */
    .about-different {
        padding: 30px 0 50px 0;
        background-color: #FAF6EC;
        text-align: center;
        width: 100%;
    }
    .about-different h2 {
        font-size: 36px;
        margin-bottom: 0px;
    }
    .about-different > .inner-container > p {
        margin-bottom: 16px;
        color: #000;
    }
    .features-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 25px;
    }
    .feature-card {
        background: #fff;
        padding: 35px 25px;
        border-radius: 25px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        border: 1px solid #f0f0f0;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        min-height: 300px;
    }
    .feature-icon {
        width: 63px;
        height: 63px;
        background: #f0f6f3;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
    }
    .feature-icon img {
        width: 27px;
        height: auto;
    }
    .feature-card h3 {
        font-family: 'Libre Baskerville', serif;
        font-weight: 600;
        font-size: 18px;
        line-height: 24px;
        color: #000000;
        margin-bottom: 15px;
    }
    .feature-card p {
        font-family: 'Inter', sans-serif;
        font-weight: 400;
        font-size: 16px;
        line-height: 28px;
        color: #000000;
    }

    /* Section 3: Stats */
    .about-stats {
        background: linear-gradient(rgba(8, 26, 19, 0.6), rgba(8, 26, 19, 0.6)), url('{{ asset("images/numbers-background.png") }}') center/cover;
        height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        margin-top: 50px;
        margin-bottom: 50px;
        width: 100%;
    }
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        text-align: center;
        width: 100%;
    }
    .stat-box h3 {
        color: #E8C06D;
        font-size: 42px;
        margin-bottom: 5px;
        font-family: 'Libre Baskerville', serif;
    }
    .stat-box p {
        color: #fff;
        font-size: 15px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Section 4: Reasons */
    .about-reasons {
        padding: 0px 0;
        background-color: #fff;
        width: 100%;
        margin-bottom:50px;
    }
    .reasons-top {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-bottom: 10px;
        align-items: stretch;
    }
    .reasons-text {
        grid-column: span 2;
        padding-right: 30px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .reasons-text h2 {
        font-family: 'Libre Baskerville', serif;
        font-size: 36px;
        margin-bottom: 20px;
        line-height: 1.3;
        color: #1c2826;
    }
    .reasons-text p {
        color: #000;
        line-height: 1.6;
        font-size: 16px;
    }
    .reasons-cards-top {
        grid-column: span 2;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
    }
    .reasons-cards-bottom {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
    }
    .reason-box {
        background: #FAF6EC;
        padding: 35px 20px;
        border-radius: 16px;
        text-align: center;
        transition: transform 0.3s;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
        min-height: 200px;
    }
    .reason-box:hover {
        transform: translateY(-5px);
    }
    .reason-icon {
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
    }
    .reason-icon img {
        width: 48px;
        height: 48px;
        object-fit: contain;
    }
    .reason-box h4 {
        font-family: 'Libre Baskerville', serif;
        font-size: 16px;
        font-weight: 700;
        color: #1c2826;
        margin: 0;
    }

    /* Responsive Mobile Media Queries */
    @media (max-width: 992px) {
        .story-grid, .reasons-top {
            grid-template-columns: 1fr;
            gap: 35px;
        }
        .reasons-text, .reasons-cards-top {
            grid-column: span 1;
        }
        .features-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
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
        .about-story {
            padding: 40px 0;
        }
        .story-text h2 {
            font-size: 28px;
            margin-bottom: 12px;
        }
        .story-text p {
            font-size: 18px;
            text-align: justify;
            color:#000;
        }
        .btn-explore {
            display: none;
        }
        .about-different {
            padding: 40px 0;
        }
        .about-different h2 {
            font-size: 26px;
        }
        .features-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        .feature-card {
            padding: 30px 20px;
            min-height: auto;
        }
        .about-stats {
            height: auto;
            min-height: 220px;
            padding: 40px 0;
            margin-top: 35px;
            margin-bottom: 35px;
        }
        .stat-box h3 {
            font-size: 34px;
        }
        .stat-box p {
            font-size: 13px;
        }
        .reasons-top {
            margin-bottom: 15px;
            gap: 25px;
        }
        .reasons-text {
            padding-right: 0;
            text-align: center;
        }
        .reasons-text h2 {
            font-size: 28px;
            margin-bottom: 12px;
            text-align: center;
        }
        .reasons-text h2 br {
            display: inline;
        }
        .reasons-text p {
            text-align: center;
            max-width: 480px;
            margin: 0 auto;
        }
        .reasons-cards-top, .reasons-cards-bottom {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
        .reason-box {
            background: #FAF6EC;
            padding: 30px 12px;
            border-radius: 12px;
            text-align: center;
            min-height: 150px;
        }
        .reason-box h4 {
            font-family: 'Libre Baskerville', serif;
            font-size: 15px;
            font-weight: 700;
            color: #1c2826;
            margin: 0;
        }
    }
    @media (max-width: 576px) {
        .about-hero-content h1 {
            font-size: 26px;
        }
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
        .reason-box {
            padding: 24px 10px;
            border-radius: 12px;
        }
        .reason-box h4 {
            font-size: 14px;
        }
        .story-img-main {
            height: 300px;
        }
        .story-img-sub {
            height: 144px;
        }
    }
</style>
</head>
<body>

@include('components.header')

<div class="page-wrapper">
    <!-- Hero -->
    @include('components.hero', [
        'title' => 'The Story of Indus Resort',
        'subtitle' => 'Discover the passion and people behind Murree\'s most cherished mountain <br> retreat',
        'image' => 'images/About-Us-banner.webp'
    ])

    <!-- Story Section -->
    <section class="about-story">
        <div class="inner-container">
            <div class="story-grid">
                <div class="story-images">
                    <img src="{{ asset('images/peace-full-upper.png') }}" class="story-img-main" alt="Resort View">
                    <img src="{{ asset('images/peace-short-first.png') }}" class="story-img-sub" alt="Resort Interior">
                    <img src="{{ asset('images/peace-full-short-second.png') }}" class="story-img-sub" alt="Resort Room">
                </div>
                <div class="story-text">
                    <h2>A Home Away From Home in the Hills</h2>
                    <p>Indus Resort was founded with a simple vision — to give travelers a peaceful, comfortable place to reconnect with nature without compromising on comfort. Located along the scenic hills of Murree, our resort combines traditional hospitality with modern amenities to create an experience guests remember long after they leave.</p>
                    <p>Today, we welcome families, couples and groups from across Pakistan and abroad, offering cozy rooms, delicious food, and unforgettable evenings around the bonfire — all set against the breathtaking backdrop of the Himalayan foothills.</p>
                    <a href="#" class="btn-explore">
                        <div class="btn-explore-icon"><i class="ri-arrow-right-s-line"></i></div>
                        Explore Our Rooms
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- What Makes Us Different -->
    <section class="about-different">
        <div class="inner-container">
            <h2>What Makes Us Different</h2>
            <p>Every detail at Indus Resort is guided by these core principles.</p>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <img src="{{ asset('images/authentic-hospitality.svg') }}" alt="Authentic Hospitality">
                    </div>
                    <h3>Authentic Hospitality</h3>
                    <p>Rooted in Pakistani tradition, we treat every guest like family from arrival to departure.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <img src="{{ asset('images/nature-first.svg') }}" alt="Nature First">
                    </div>
                    <h3>Nature First</h3>
                    <p>Nestled among pine forests, we're committed to preserving the natural beauty that surrounds us.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <img src="{{ asset('images/quality-service.svg') }}" alt="Quality Service">
                    </div>
                    <h3>Quality Service</h3>
                    <p>From housekeeping to dining, our team is trained to deliver a five-star experience at every touchpoint.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <img src="{{ asset('images/trusted-by-families.svg') }}" alt="Trusted by Families">
                    </div>
                    <h3>Trusted by Families</h3>
                    <p>Thousands of families have made Indus Resort their go-to destination for holidays in Murree.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats -->
    <section class="about-stats">
        <div class="inner-container">
            <div class="stats-grid">
                <div class="stat-box">
                    <h3><span class="counter" data-target="12">0</span>+</h3>
                    <p>Years of Service</p>
                </div>
                <div class="stat-box">
                    <h3><span class="counter" data-target="20">0</span>k+</h3>
                    <p>Happy Guests</p>
                </div>
                <div class="stat-box">
                    <h3><span class="counter" data-target="35">0</span></h3>
                    <p>Rooms & Cabins</p>
                </div>
                <div class="stat-box">
                    <h3><span class="counter" data-target="4.8" data-decimals="1">0</span>/5</h3>
                    <p>Average Rating</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Reasons to keep coming back -->
    <section class="about-reasons">
        <div class="inner-container">
            <div class="reasons-top">
                <div class="reasons-text">
                    <h2>Reasons Guests Keep<br>Coming Back</h2>
                    <p>A warm, comfortable stay with peaceful surroundings, thoughtful service, and memorable mountain views that make every visit worth repeating.</p>
                </div>
                <div class="reasons-cards-top">
                    <div class="reason-box">
                        <div class="reason-icon">
                            <img src="{{ asset('images/room-service-icon.svg') }}" alt="Room Service">
                        </div>
                        <h4>Room Service</h4>
                    </div>
                    <div class="reason-box">
                        <div class="reason-icon">
                            <img src="{{ asset('images/wifi-icon.svg') }}" alt="Free Wi-Fi">
                        </div>
                        <h4>Free Wi-Fi</h4>
                    </div>
                </div>
            </div>
            
            <div class="reasons-cards-bottom">
                <div class="reason-box">
                    <div class="reason-icon">
                        <img src="{{ asset('images/fresh-food-icon.svg') }}" alt="Fresh Food">
                    </div>
                    <h4>Fresh Food</h4>
                </div>
                <div class="reason-box">
                    <div class="reason-icon">
                        <img src="{{ asset('images/free-parking-icon.svg') }}" alt="Free Parking">
                    </div>
                    <h4>Free Parking</h4>
                </div>
                <div class="reason-box">
                    <div class="reason-icon">
                        <img src="{{ asset('images/mountain-view-icon.svg') }}" alt="Mountain View">
                    </div>
                    <h4>Mountain View</h4>
                </div>
                <div class="reason-box">
                    <div class="reason-icon">
                        <img src="{{ asset('images/front-desk-icon.svg') }}" alt="24/7 Front Desk">
                    </div>
                    <h4>24/7 Front Desk</h4>
                </div>
            </div>
        </div>
    </section>
</div>

@include('components.footer')

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const counters = document.querySelectorAll('.counter');
        
        const observerOptions = {
            threshold: 0.5
        };
        
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseFloat(counter.getAttribute('data-target'));
                    const isDecimal = counter.hasAttribute('data-decimals');
                    const duration = 2000; // ms
                    const stepTime = 20;
                    const steps = duration / stepTime;
                    const increment = target / steps;
                    let current = 0;
                    
                    const updateCounter = setInterval(() => {
                        current += increment;
                        if (current >= target) {
                            counter.innerText = isDecimal ? target.toFixed(1) : Math.round(target);
                            clearInterval(updateCounter);
                        } else {
                            counter.innerText = isDecimal ? current.toFixed(1) : Math.round(current);
                        }
                    }, stepTime);
                    
                    observer.unobserve(counter);
                }
            });
        }, observerOptions);
        
        counters.forEach(counter => {
            observer.observe(counter);
        });
    });
</script>
</body>
</html>
