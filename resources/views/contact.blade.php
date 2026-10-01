<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Indus Resort Murree</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Inter:wght@400;500;600;700&display=swap');
        
        /* Reset & Base */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }
        body {
            background-color: #fcfbf9;
            color: #000000;
        }
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

        h1, h2, h3, h4 {
            font-family: 'Libre Baskerville', serif;
            color: #000000;
        }

        /* --- Hero Section --- */
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

        /* --- Main Contact Section --- */
        .contact-main-section {
            padding-top: 50px;
            background-color: #fff;
        }
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: start;
        }

        /* Left Side: Contact Info */
        .contact-info-wrap h2 {
            font-size: 36px;
            margin-bottom: 12px;
        }
        .contact-info-wrap > p {
            color: #000000;
            margin-bottom: 40px;
            font-size: 15px;
        }
        .info-cards-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .info-card {
            background-color: #FAF6EC;
            border-radius: 16px;
            padding: 24px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 0.2px solid rgba(0, 0, 0, 0.1);
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.13);
        }
        .info-icon {
            width: 48px;
            height: 48px;
            background-color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            color: #1F5F41;
            font-size: 20px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }
        .info-card h4 {
            font-family: 'Libre Baskerville', serif;
            font-weight: 700;
            font-size: 16px;
            margin-bottom: 8px;
            color: #0E2A1E;
        }
        .info-card p {
            font-size: 14px;
            color: #000000;
            line-height: 1.5;
        }

        /* Right Side: Form Card */
        .contact-form-card {
            background: #ffffff;
            border-radius: 18px;
            padding: 50px;
            border: none;
            border-top: 0.67px solid rgba(24, 48, 37, 0.12);
            box-shadow: 0px 14px 45px 0px rgba(24, 48, 37, 0.06);
        }
        .contact-form-card h3 {
            font-size: 28px;
            margin-bottom: 12px;
            color: #133827;
        }
        .contact-form-card p {
            color: #000000;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
        }
        .form-group label {
            font-family: 'Libre Baskerville', serif;
            font-size: 14px;
            font-weight: 700;
            color: #000000;
            margin-bottom: 8px;
        }
        .form-group input, .form-group textarea {
            background-color: #faf9f5;
            border: 1px solid #e5e0d8;
            border-radius: 8px;
            padding: 14px 16px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            color: #000000;
            transition: border-color 0.3s;
        }
        .form-group input:focus, .form-group textarea:focus {
            outline: none;
            border-color: #1F5F41;
        }
        .form-group textarea {
            height: 120px;
            resize: vertical;
        }
        .submit-btn {
            background-color: #1F5F41;
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 16px 40px;
            font-size: 16px;
            font-family: 'Libre Baskerville', serif;
            font-weight: 700;
            cursor: pointer;
            width: fit-content;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: background-color 0.3s;
            margin: 20px auto 0;
        }
        .submit-btn:hover {
            background-color: #15452f;
        }

        /* --- Map Section --- */
        .map-section {
            background-color: #FAF6EC;
            padding: 40px 0;
            margin: 50px 0;
        }
        .map-card {
            background: #fff;
            border-radius: 20px;
            display: flex;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border: 1px solid #eaeaea;
            min-height: 420px;
        }
        .map-text-side {
            padding: 60px 50px;
            flex: 0 0 35%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .map-text-side h3 {
            font-family: 'Libre Baskerville', serif;
            font-weight: 700;
            font-size: 28px;
            line-height: 38px;
            color: #183025;
            margin-bottom: 16px;
        }
        .map-text-side p {
            font-size: 14px;
            color: #000000;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        .map-location-info {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 30px;
        }
        .map-location-info i {
            color: #1F5F41;
            font-size: 18px;
            margin-top: 2px;
        }
        .map-location-info span {
            font-size: 13px;
            font-weight: 600;
            color: #000000;
            line-height: 1.5;
        }
        .directions-btn {
            background-color: #1F5F41;
            color: #fff;
            text-decoration: none;
            padding: 16px 20px;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            text-align: center;
            display: block;
            transition: 0.3s;
            width: 85%;
            max-width: 300px;
            margin: 15px auto 0;
        }
        .directions-btn:hover {
            background-color: #15452f;
        }
        .map-img-side {
            flex: 1;
        }
        .map-img-side img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* --- Info Bar Section --- */
        .info-bar-section {
            background-color: #183025;
            padding: 50px 0;
            color: #fff;
            margin-bottom: 50px;
        }
        .info-bar-grid {
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: center;
        }
        .info-item {
            flex: 1;
            position: relative;
        }
        .info-item:not(:last-child)::after {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            height: 40px;
            width: 1px;
            background-color: rgba(255, 255, 255, 0.2);
        }
        .info-item h4 {
            color: #dfb56c;
            font-family: 'Libre Baskerville', serif;
            font-size: 24px;
            margin-bottom: 8px;
        }
        .info-item p {
            color: #e0e0e0;
            font-size: 13px;
            font-weight: 500;
        }

        /* Responsive */
        @media (max-width: 1366px) {
            .inner-container {
                max-width: 1200px;
            }
        }
        @media (max-width: 1024px) {
            .inner-container {
                max-width: 960px;
            }
        }
        @media (max-width: 992px) {
            .contact-grid {
                grid-template-columns: 1fr;
            }
            .map-card {
                flex-direction: column-reverse;
            }
            .map-img-side {
                height: 450px;
                flex: none;
            }
        }
    @media (max-width: 768px) {
        .about-hero {
            height: auto;
            min-height: 380px;
            padding-top: 110px;
            padding-bottom: 45px;
        }
        .about-hero-content {
            text-align: center;
            width: 90%;
            max-width: 340px;
            margin: 0 auto;
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
        .form-row, .info-cards-grid {
            grid-template-columns: 1fr;
        }
        .info-bar-grid {
            flex-direction: column;
            gap: 30px;
        }
        .info-item:not(:last-child)::after {
            display: none;
        }
        .contact-form-card {
            padding: 30px 20px;
        }
        .map-text-side {
            padding: 30px 20px;
        }
        .map-text-side h3 {
            font-size: 22px;
        }
        .map-text-side h3 br {
            display: none;
        }
        .map-section {
            background-color: transparent;
            margin: 20px 0;
            padding: 0;
        }
        .submit-btn, .directions-btn {
            width: 100%;
            max-width: none;
        }
        .info-bar-section {
            display: none;
        }
        .contact-info-wrap h2, .contact-info-wrap > p {
            text-align: center;
        }
        .contact-form-card h3, .contact-form-card > p {
            text-align: center;
        }
        .form-group textarea {
            height: 80px;
        }
    }
    @media (max-width: 576px) {
        .about-hero-content h1 {
            font-size: 26px;
        }
    }
    </style>
</head>
<body>

@include('components.header')
<div class="page-wrapper">
    
    <!-- Hero Section -->
    @include('components.hero', [
        'title' => 'Contact Us',
        'subtitle' => 'Have a question or ready to book? <br> Reach out and our team will get back to you shortly.',
        'image' => 'images/hero-image.png'
    ])

    <!-- Main Contact Grid -->
    <section class="contact-main-section">
        <div class="inner-container">
            <div class="contact-grid">
                
                <!-- Left: Info Cards -->
                <div class="contact-info-wrap">
                    <h2>Get in Touch</h2>
                    <p>Have a question or planning your stay? Reach out to our team anytime.</p>
                    
                    <div class="info-cards-grid">
                        <div class="info-card">
                            <div class="info-icon">
                                <i class="ri-mail-fill"></i>
                            </div>
                            <h4>Email Address</h4>
                            <p>indusresort7861@gmail.com</p>
                        </div>
                        <div class="info-card">
                            <div class="info-icon">
                                <i class="ri-phone-fill"></i>
                            </div>
                            <h4>Phone Number</h4>
                            <p>0300-0053333</p>
                        </div>
                        <div class="info-card">
                            <div class="info-icon">
                                <i class="ri-map-pin-2-fill"></i>
                            </div>
                            <h4>Our Location</h4>
                            <p>Governor House Road, Aliot<br>Bazar, Kohala Road, Murree</p>
                        </div>
                        <div class="info-card">
                            <div class="info-icon">
                                <i class="ri-time-fill"></i>
                            </div>
                            <h4>Reception Hours</h4>
                            <p>Open 24 hours<br>Every day of the week</p>
                        </div>
                    </div>
                </div>

                <!-- Right: Form -->
                <div class="contact-form-wrap">
                    <div class="contact-form-card">
                        <h3>Plan Your Stay With Us</h3>
                        <p>Tell us how we can help and our team will get back to you as soon as possible.</p>
                        
                        <form action="#" method="POST">
                            <div class="form-row">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" placeholder="Enter your name">
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" placeholder="+92 300 0000000">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" placeholder="you@example.com">
                                </div>
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" placeholder="Room booking inquiry">
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label>Message</label>
                                <textarea placeholder="Tell us about your stay, dates or any questions..."></textarea>
                            </div>
                            <button type="submit" class="submit-btn">
                                Send Your Message <i class="ri-send-plane-line"></i>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="inner-container">
            <div class="map-card">
                <div class="map-text-side">
                    <h3>Indus Resort <br>Murree</h3>
                    <p>Surrounded by the calm of the hills, yet conveniently accessible for families and travelers.</p>
                    <div class="map-location-info">
                        <i class="ri-map-pin-line"></i>
                        <span>Governor House Road, Aliot<br>Bazar, Kohala Road, Murree</span>
                    </div>
                    <a href="https://www.google.com/maps/dir/?api=1&destination=Governor+House+Road,+Aliot+Bazar,+Kohala+Road,+Murree" target="_blank" class="directions-btn">Get Directions</a>
                </div>
                <div class="map-img-side">
                    <iframe src="https://maps.google.com/maps?q=Indus+Resort,+Governor+House+Road,+Aliot+Bazar,+Kohala+Road,+Murree&t=&z=15&ie=UTF8&output=embed" width="100%" height="100%" style="border:0; min-height: 100%; display: block;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Info Bar Section -->
    <section class="info-bar-section">
        <div class="inner-container">
            <div class="info-bar-grid">
                <div class="info-item">
                    <h4>24/7</h4>
                    <p>Front Desk Assistance</p>
                </div>
                <div class="info-item">
                    <h4>2:00 PM</h4>
                    <p>Check-in From</p>
                </div>
                <div class="info-item">
                    <h4>12:00 PM</h4>
                    <p>Check-out Until</p>
                </div>
                <div class="info-item">
                    <h4>48 Hours</h4>
                    <p>Free Cancellation Before Arrival</p>
                </div>
            </div>
        </div>
    </section>

</div>

@include('components.footer')

</body>
</html>
