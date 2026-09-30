<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&display=swap');
    
    /* Reset & Base */
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: 'Inter', 'Roboto', sans-serif;
    }
    body {
        background-color: #fcfbf9;
        color: #333;
    }
    /* Layout */
    .page-wrapper {
        width: 100%;
        background-color: #fff;
        overflow: hidden;
    }
    .inner-container {
        width: 100%;
        max-width: 1350px;
        margin: 0 auto;
        text-align: left;
        padding: 0 20px;
    }
    
    /* Typography */
    h1, h2, h3 {
        font-family: 'Playfair Display', serif; /* Or similar elegant serif */
        color: #1c2826;
    }
    p {
        line-height: 1.6;
        color: #555;
    }
    .btn {
        display: inline-block;
        padding: 12px 24px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    .btn-primary {
        background-color: #1F5F41;
        color: #fff;
        border: 1px solid #1F5F41;
    }
    .btn-primary:hover {
        background-color: #15452f;
    }
    .btn-outline {
        background-color: transparent;
        color: #fff;
        border: 1px solid #fff;
    }
    .btn-outline:hover {
        background-color: #fff;
        color: #1e453e;
    }
    .text-gold {
        color: #E8C06D;
    }

    /* Hero Section */
    .hero-section {
        position: relative;
        height: 720px;
        background-image: url('/images/hero-image.png');
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: flex-start; /* Aligns content to the top instead of centering */
        padding-top: 230px; /* Forces content down to make room for the absolute header */
        box-sizing: border-box;
    }
    .hero-section::before {
        content: '';
        position: absolute;
        inset: 0;
        top: -0.44px;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.8) 17.84%, rgba(0, 0, 0, 0.24) 99.36%, rgba(52, 65, 60, 0) 100%);
        opacity: 1;
    }
    .hero-content {
        position: relative;
        z-index: 10;
        display: flex;
        justify-content: space-between;
        align-items: flex-start; /* Aligns items to the top initially */
        flex-wrap: nowrap; /* Forces card to stay on the right side on desktop */
        gap: 30px;
        width: 100%;
    }
    .hero-text {
        max-width: 720px; /* Reduced slightly so both text and card fit in 1350px container */
        color: #fff;
    }
    .hero-text h1 {
        font-family: 'Libre Baskerville', serif;
        font-weight: 700;
        font-size: 64px;
        line-height: 84.38px;
        letter-spacing: 0px;
        white-space: nowrap; /* Forces text to stay on one line */
        color: #fff;
        margin-bottom: 20px;
    }
    .hero-text p {
        font-family: 'Inter', sans-serif;
        font-weight: 400;
        font-size: 20px;
        line-height: 30px;
        letter-spacing: 0px;
        color: #FFFFFF;
        max-width: 701px;
        margin-bottom: 30px;
    }
    .hero-buttons {
        display: flex;
        gap: 22px;
    }
    .hero-btn-primary {
        display: flex;
        align-items: center;
        background-color: #FFFFFF;
        width: 215px;
        height: 60px;
        border-radius: 12px;
        text-decoration: none;
        box-sizing: border-box;
        padding: 4px;
        transition: all 0.3s ease;
    }
    .hero-btn-primary .icon-box {
        width: 40px;
        height: 52px;
        background-color: #1F5F41;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
    }
    .hero-btn-primary span {
        font-family: 'Libre Baskerville', serif;
        font-weight: 700;
        font-size: 18px;
        color: #1F5F41;
    }
    .hero-btn-outline {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: transparent;
        color: #fff;
        border: 1px solid #fff;
        border-radius: 12px;
        height: 60px;
        padding: 0 30px;
        text-decoration: none;
        font-family: 'Libre Baskerville', serif;
        font-weight: 700;
        font-size: 18px;
        transition: all 0.3s ease;
    }
    .hero-btn-outline:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }
    .hero-card {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(34px);
        width: 470px;
        height: 180px;
        border-radius: 20px;
        padding: 16px;
        display: flex;
        align-items: center;
        gap: 16px;
        margin-top: 215px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        max-width: 100%;
        color: #fff;
        flex-shrink: 0;
    }
    .hero-card img {
        width: 148px;
        height: 148px;
        object-fit: cover;
        border-radius: 12px;
    }
    .hero-card h3 {
        font-family: 'Libre Baskerville', serif;
        font-weight: 400;
        font-size: 20px;
        line-height: 1.4;
        letter-spacing: 0px;
        color: #FFFFFF;
        white-space: nowrap;
        margin-bottom: 6px;
    }
    .hero-card p {
        font-family: 'Inter', sans-serif;
        font-weight: 400;
        font-size: 14px;
        line-height: 22px;
        letter-spacing: 0px;
        color: #FFFFFF;
        max-width: 250px;
        text-align: justify;
    }

    /* About Section */
    .about-section {
        padding: 45px 0;
        text-align: center;
        background-color: #fff;
    }
    .about-section > .inner-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .about-section h2 {
        font-family: 'Libre Baskerville', serif;
        font-weight: 700;
        font-size: 40px;
        line-height: 54px;
        color: #000000;
        margin-bottom: 50px;
        max-width: 695px;
        text-align: center;
    }
    .about-grid {
        display: grid;
        grid-template-columns: auto 1fr auto; /* Middle column expands, left/right size to images */
        gap: 40px;
        align-items: start; /* Aligns both images and the text to the top edge */
        width: 100%;
    }
    .about-img-left {
        width: 303px;
        height: 432px;
        object-fit: cover;
        border-radius: 16px;
    }
    .about-img-right {
        width: 302.5px;
        height: 349.28px;
        object-fit: cover;
        border-radius: 16px;
    }
    .about-text {
        text-align: left;
    }
    .about-text p {
        font-family: 'Inter', sans-serif;
        font-weight: 400;
        font-size: 16px;
        line-height: 32px;
        color: #000000;
        text-align: left; /* Changed from justify to match 4-line natural wrapping */
        margin-bottom: 15px; /* Reduced from 20px to compress height */
    }
    .about-list {
        list-style: none;
        margin-bottom: 15px; /* Reduced from 30px to compress height */
    }
    .about-list li {
        font-family: 'Inter', sans-serif;
        font-weight: 400;
        font-size: 16px;
        line-height: 32px;
        color: #000000;
        margin-bottom: 5px; /* Reduced from 10px to compress height */
        position: relative;
        padding-left: 25px;
    }
    .about-list li::before {
        content: '';
        position: absolute;
        left: 0;
        top: 11px;
        width: 10px;
        height: 10px;
        background-color: #E8C06D;
        transform: rotate(45deg);
    }
    .stats {
        display: flex;
        justify-content: flex-start; /* Shifted the service quantity to the left */
        gap: 40px;
        border-top: 1px solid #ddd;
        padding-top: 15px; /* Reduced from 30px */
        margin-top: 10px; /* Reduced from 20px */
        align-items: center;
        padding-left: 40px; /* Indents the stats text */
        padding-right: 40px; /* Extends the line slightly past the right side */
        width: fit-content; /* Fixes the overflow and natively shortens the border */
    }
    .stat-item:first-child {
        padding-right: 40px;
        border-right: 1px solid #ddd;
    }
    .stat-item h4 {
        font-family: 'Libre Baskerville', serif;
        font-weight: 400;
        font-size: 60px;
        line-height: 66px;
        color: #000000;
        margin: 0; /* Removed bottom margin */
    }
    .stat-item span {
        font-family: 'Inter', sans-serif;
        font-weight: 500;
        font-size: 16px;
        line-height: 1.2; /* Tighter line height for the label */
        color: #000000;
        margin: 0;
        display: block;
    }
    .img-right-wrapper {
        position: relative;
    }
    .badge-stamp {
        position: absolute;
        bottom: -70px;
        left: -89.5px;
        width: 179px;
        height: 179px;
        background: #FFFFFF;
        border: 1px solid #C97A4F;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10;
    }
    .badge-text-svg {
        position: absolute;
        width: 100%;
        height: 100%;
        transform: rotate(-60.38deg); /* Match rotation from specs */
    }
    .badge-icon {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Rooms Section */
    .rooms-section {
        padding: 45px 0;
        background-color: #FAF6EC;
        margin-bottom: 45px;
    }
    .rooms-header {
        text-align: center;
        margin-bottom: 50px;
    }
    .rooms-header h2 {
        font-family: 'Libre Baskerville', serif;
        font-weight: 700;
        font-size: 40px;
        line-height: 54px;
        color: #000000;
        margin-bottom: 20px;
    }
    .rooms-header p {
        font-family: 'Inter', sans-serif;
        font-weight: 400;
        font-size: 16px;
        line-height: 32px;
        color: #000000;
        max-width: 700px;
        margin: 0 auto;
    }
    .rooms-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 15px; /* Reduced from 30px to make them closer */
    }
    .room-card {
        background: #FFFFFF;
        border-radius: 16px;
        overflow: hidden;
        width: 100%;
        max-width: 440px; /* Increased from 399px to make them wider */
        height: 494px;
        margin: 0 auto;
        box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.15);
        border: 0.44px solid rgba(54, 38, 24, 0.1);
        display: flex;
        flex-direction: column;
    }
    .room-img {
        position: relative;
        width: calc(100% - 12px); /* Leaves exactly 6px on each side */
        height: 200px; /* Reduced to give text more space */
        margin: 11px auto 0; /* 11px space from top, auto handles the sides */
    }
    .room-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 11.77px;
    }
    .price-tag {
        position: absolute;
        top: 15px;
        left: 15px;
        background: #1F5F41;
        color: #FFFFFF;
        padding: 6px 12px;
        border-radius: 4px;
        font-family: 'Libre Baskerville', serif;
        font-weight: 400;
        font-size: 14px;
        line-height: 20px;
        letter-spacing: 0px;
    }
    .room-info {
        padding: 10px 17px;
    }
    .room-amenities {
        display: flex;
        gap: 15px;
        margin-bottom: 15px;
    }
    .amenity-badge {
        display: flex;
        align-items: center;
        gap: 8px;
        background-color: #f3f2f1;
        padding: 4px 10px 4px 4px;
        border-radius: 4px;
        font-family: 'Libre Baskerville', serif;
        font-weight: 400;
        font-size: 16px;
        line-height: 24px;
        letter-spacing: 0px;
        color: #000;
    }
    .amenity-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 28px;
        height: 28px;
        background-color: #1F5F41;
        border-radius: 4px;
        color: #fff;
    }
    .amenity-icon svg {
        width: 16px;
        height: 16px;
        fill: currentColor;
    }
    .room-info h3 {
        font-family: 'Libre Baskerville', serif;
        font-weight: 600;
        font-size: 20px;
        line-height: 30px;
        letter-spacing: 0px;
        color: #362618;
        margin-bottom: 10px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .room-info p {
        font-family: 'Inter', sans-serif;
        font-weight: 400;
        font-size: 14px;
        line-height: 24px;
        letter-spacing: 0px;
        color: #414141;
        margin-bottom: 20px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .room-btn-primary {
        display: flex;
        align-items: center;
        background-color: #FAF6EC;
        width: 100%;
        height: 52px;
        border-radius: 10px;
        text-decoration: none;
        box-sizing: border-box;
        padding: 4px;
        transition: all 0.3s ease;
        margin-top: 5px;
    }
    .room-btn-primary .icon-box {
        width: 50px;
        height: 42px;
        background-color: #1F5F41;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .room-btn-primary span {
        font-family: 'Libre Baskerville', serif;
        font-size: 16px;
        font-weight: 600;
        color: #1F5F41;
        margin-left: 15px;
        padding-right: 25px;
    }
    .room-btn-primary:hover {
        background-color: #f2e9d8;
    }

    /* Responsive Media Queries */
    @media (max-width: 1366px) {
        .inner-container {
            max-width: 1200px; /* Adjusts for laptops like 1355px */
        }
    }
    @media (max-width: 1024px) {
        .inner-container {
            max-width: 960px;
        }
        .hero-content {
            flex-wrap: wrap; /* Allow wrapping on smaller screens */
        }
        .hero-card {
            margin-top: 50px; /* Adjust margin for smaller screens */
        }
        .hero-text h1 {
            font-size: 2.8rem;
            white-space: normal; /* Allow wrapping on smaller screens */
        }
        .about-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }
        .about-img-left {
            height: 300px;
        }
        .about-img-right {
            height: 300px;
            border-radius: 12px;
        }
        .rooms-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (max-width: 768px) {
        .hero-section {
            height: 610px;
            padding: 130px 0 60px 0;
            background-position: center;
        }
        .hero-content {
            flex-direction: column;
        }
        .hero-text {
            text-align: center;
            margin: 0 auto;
            width: 100%;
        }
        .hero-buttons {
            flex-direction: column;
            width: 100%;
            gap: 15px;
            align-items: center;
        }
        .hero-btn-primary, .hero-btn-outline {
            width: 350px;
            max-width: 90%;
            justify-content: center;
        }
        .hero-btn-primary {
            background-color: #1F5F41;
            position: relative;
            padding: 0;
        }
        .hero-btn-primary .icon-box {
            position: absolute;
            left: 20px;
            background-color: transparent;
            width: auto;
            height: auto;
            margin-right: 0;
        }
        .hero-btn-primary span {
            color: #FFFFFF;
        }
        .hero-btn-outline {
            background-color: #FFFFFF;
            color: #1F5F41;
        }
        .hero-text h1 {
            font-size: 2.2rem;
            white-space: normal;
        }
        .hero-text p {
            margin: 0 auto 30px auto;
        }

        .hero-card {
            display: none; /* Hide the hero card on mobile */
        }
        .about-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        .about-text p {
            text-align: justify;
        }
        .about-section h2, .rooms-header h2 {
            font-size: 28px;
            line-height: 38px;
            margin-bottom: 30px;
        }
        .about-img-left {
            height: 350px;
            width: 100%;
            object-position: center;
        }
        .img-right-wrapper {
            display: none; /* Hidden on mobile as per design */
        }
        .stats {
            flex-direction: row;
            justify-content: center;
            gap: 20px;
            border-top: none;
            width: 100%;
            padding: 15px 0 0 0;
        }
        .rooms-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        .room-card {
            margin: 0 auto;
            max-width: 100%;
            height: auto;
            padding-bottom: 10px;
        }
        .room-img {
            height: 260px;
        }
        .room-btn-primary {
            background-color: #1F5F41;
            position: relative;
            padding: 0;
            justify-content: center;
            width: 320px;
            max-width: 100%;
            margin: 0 auto;
        }
        .room-btn-primary .icon-box {
            position: absolute;
            left: 20px;
            background-color: transparent;
            width: auto;
            height: auto;
        }
        .room-btn-primary span {
            color: #FFFFFF;
            margin-left: 0;
            padding-right: 0;
        }
    }
</style>

@include('components.header')
<div class="page-wrapper">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="inner-container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Indus Resort <span class="text-gold">Murree</span></h1>
                    <p>A luxury mountain retreat where pine-scented air, misty valleys and warm hospitality come together for an unforgettable stay.</p>
                    <div class="hero-buttons">
                        <a href="#" class="hero-btn-primary">
                            <div class="icon-box">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 2L10 7L5 12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <span>Book Your Stay</span>
                        </a>
                        <a href="#" class="hero-btn-outline">Explore Rooms</a>
                    </div>
                </div>
                <div class="hero-card">
                    <img src="{{ asset('images/bedroom-image.png') }}" alt="Cozy Bedroom">
                    <div>
                        <h3>Book Your Stay Now</h3>
                        <p>Effortlessly manage your stay with our seamless hotel reservations — easy booking</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="inner-container">
            <h2>Your Peaceful Escape in the Hills of Murree</h2>
            <div class="about-grid">
                <img src="{{ asset('images/pool-image.jpg') }}" alt="Pool View" class="about-img-left">
                
                <div class="about-text">
                    <p>Perched amid pine forests and rolling green hills, Indus Resort blends modern comfort with the natural charm of Murree. From cozy rooms with valley views to fine dining under the stars, every detail is designed for a relaxing, memorable getaway with family and friends.</p>
                    <ul class="about-list">
                        <li>Panoramic valley & pine forest views.</li>
                        <li>Spacious family friendly rooms.</li>
                        <li>In-house restaurant & bonfire nights.</li>
                        <li>Warm, attentive staff around the clock.</li>
                    </ul>
                    <div class="stats">
                        <div class="stat-item">
                            <h4>12+</h4>
                            <span>Years of Service</span>
                        </div>
                        <div class="stat-item">
                            <h4>20k+</h4>
                            <span>SATISFIED VISITORS</span>
                        </div>
                    </div>
                </div>

                <div class="img-right-wrapper">
                    <img src="{{ asset('images/servent-image.jpg') }}" alt="Hospitality Staff" class="about-img-right">
                    <div class="badge-stamp">
                        <!-- Circular Text -->
                        <svg viewBox="0 0 179 179" class="badge-text-svg">
                            <defs>
                                <path id="circlePath" d="M 89.5, 89.5 m -64, 0 a 64,64 0 1,1 128,0 a 64,64 0 1,1 -128,0" />
                            </defs>
                            <text font-family="Inter, sans-serif" font-size="14" font-weight="400" fill="#000000">
                                <textPath href="#circlePath" textLength="400" lengthAdjust="spacing">
                                    LEARN MORE ABOUT SAFAR
                                </textPath>
                            </text>
                        </svg>
                        <!-- Center 12-point star -->
                        <div class="badge-icon">
                            <svg width="45" height="45" viewBox="0 0 40 40">
                                <g fill="#C97A4F">
                                    <path d="M20,0 L21.5,18.5 L40,20 L21.5,21.5 L20,40 L18.5,21.5 L0,20 L18.5,18.5 Z" />
                                    <path d="M20,4 L21,19 L36,20 L21,21 L20,36 L19,21 L4,20 L19,19 Z" transform="rotate(30 20 20)" />
                                    <path d="M20,4 L21,19 L36,20 L21,21 L20,36 L19,21 L4,20 L19,19 Z" transform="rotate(60 20 20)" />
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Rooms Section -->
    <section class="rooms-section">
        <div class="inner-container">
            <div class="rooms-header">
                <h2>Rooms & Suites Designed for Comfort</h2>
                <p>Choose from a range of elegant rooms and suites, each thoughtfully designed to make your stay in Murree unforgettable.</p>
            </div>
            
            <div class="rooms-grid">
                <!-- Room Card 1 -->
                <div class="room-card">
                    <div class="room-img">
                        <span class="price-tag">PKR 30,000/ Night</span>
                        <img src="{{ asset('images/bed-image.jpg') }}" alt="3 Room Portion">
                    </div>
                    <div class="room-info">
                        <div class="room-amenities">
                            <div class="amenity-badge">
                                <div class="amenity-icon">
                                    <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                </div>
                                5.0
                            </div>
                            <div class="amenity-badge">
                                <div class="amenity-icon">
                                    <svg viewBox="0 0 24 24"><path d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z"/></svg>
                                </div>
                                3 Bedrooms
                            </div>
                        </div>
                        <h3>3 Room Portion (Mountain View)</h3>
                        <p>A spacious 3-bedroom portion with a cozy TV lounge and dining area, opening onto a private balcony with breathtaking mountain views.</p>
                        <a href="#" class="room-btn-primary">
                            <div class="icon-box">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 2L10 7L5 12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <span>Book Your Stay Now</span>
                        </a>
                    </div>
                </div>

                <!-- Room Card 2 -->
                <div class="room-card">
                    <div class="room-img">
                        <span class="price-tag">PKR 30,000/ Night</span>
                        <img src="{{ asset('images/bed-image.jpg') }}" alt="3 Room Portion">
                    </div>
                    <div class="room-info">
                        <div class="room-amenities">
                            <div class="amenity-badge">
                                <div class="amenity-icon">
                                    <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                </div>
                                5.0
                            </div>
                            <div class="amenity-badge">
                                <div class="amenity-icon">
                                    <svg viewBox="0 0 24 24"><path d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z"/></svg>
                                </div>
                                3 Bedrooms
                            </div>
                        </div>
                        <h3>3 Room Portion (Mountain View)</h3>
                        <p>A spacious 3-bedroom portion with a cozy TV lounge and dining area, opening onto a private balcony with breathtaking mountain views.</p>
                        <a href="#" class="room-btn-primary">
                            <div class="icon-box">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 2L10 7L5 12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <span>Book Your Stay Now</span>
                        </a>
                    </div>
                </div>

                <!-- Room Card 3 -->
                <div class="room-card">
                    <div class="room-img">
                        <span class="price-tag">PKR 30,000/ Night</span>
                        <img src="{{ asset('images/bed-image.jpg') }}" alt="3 Room Portion">
                    </div>
                    <div class="room-info">
                        <div class="room-amenities">
                            <div class="amenity-badge">
                                <div class="amenity-icon">
                                    <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                </div>
                                5.0
                            </div>
                            <div class="amenity-badge">
                                <div class="amenity-icon">
                                    <svg viewBox="0 0 24 24"><path d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z"/></svg>
                                </div>
                                3 Bedrooms
                            </div>
                        </div>
                        <h3>3 Room Portion (Mountain View)</h3>
                        <p>A spacious 3-bedroom portion with a cozy TV lounge and dining area, opening onto a private balcony with breathtaking mountain views.</p>
                        <a href="#" class="room-btn-primary">
                            <div class="icon-box">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 2L10 7L5 12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <span>Book Your Stay Now</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Include Testimonial Component -->
    @include('testimonial')

    <!-- Include CTA Component -->
    @include('cta')
</div>

@include('components.footer')
