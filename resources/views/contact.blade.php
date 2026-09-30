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
            color: #333;
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
            color: #1c2826;
        }

        /* --- Hero Section --- */
        .contact-hero {
            position: relative;
            width: 100%;
            height: 350px;
            background-image: url('/images/hero-image.png');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: flex-start;
            padding-top: 150px;
            box-sizing: border-box;
        }
        .contact-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }
        .contact-hero-content {
            position: relative;
            z-index: 10;
            color: #fff;
            max-width: 600px;
        }
        .contact-hero-content h1 {
            color: #fff;
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 16px;
        }
        .contact-hero-content p {
            color: #f0f0f0;
            font-size: 16px;
            line-height: 1.6;
        }

        /* --- Main Contact Section --- */
        .contact-main-section {
            padding: 80px 0;
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
            color: #666;
            margin-bottom: 40px;
            font-size: 15px;
        }
        .info-cards-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .info-card {
            background-color: #f7f4ec;
            border-radius: 12px;
            padding: 30px 20px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            border: 1px solid #efeae0;
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
            font-family: 'Inter', sans-serif;
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 8px;
            color: #1a2823;
        }
        .info-card p {
            font-size: 13px;
            color: #555;
            line-height: 1.5;
        }

        /* Right Side: Form Card */
        .contact-form-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 50px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.06);
            border: 1px solid #f0f0f0;
        }
        .contact-form-card h3 {
            font-size: 28px;
            margin-bottom: 12px;
        }
        .contact-form-card p {
            color: #666;
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
            font-size: 13px;
            font-weight: 600;
            color: #1a2823;
            margin-bottom: 8px;
        }
        .form-group input, .form-group textarea {
            background-color: #faf9f5;
            border: 1px solid #e5e0d8;
            border-radius: 8px;
            padding: 14px 16px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            color: #333;
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
            border-radius: 8px;
            padding: 16px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: background-color 0.3s;
            margin-top: 10px;
        }
        .submit-btn:hover {
            background-color: #15452f;
        }

        /* --- Map Section --- */
        .map-section {
            background-color: #fcfbf9;
            padding: 60px 0;
        }
        .map-card {
            background: #fff;
            border-radius: 20px;
            display: flex;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border: 1px solid #eaeaea;
        }
        .map-text-side {
            padding: 60px 50px;
            flex: 0 0 35%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .map-text-side h3 {
            font-size: 26px;
            margin-bottom: 16px;
        }
        .map-text-side p {
            font-size: 14px;
            color: #555;
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
            color: #1a2823;
            line-height: 1.5;
        }
        .directions-btn {
            background-color: #1F5F41;
            color: #fff;
            text-decoration: none;
            padding: 14px 24px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            text-align: center;
            display: inline-block;
            transition: 0.3s;
            width: fit-content;
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
            background-color: #1a2823;
            padding: 50px 0;
            color: #fff;
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
                flex-direction: column;
            }
            .map-img-side {
                height: 300px;
            }
        }
        @media (max-width: 768px) {
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
            .contact-hero h1 {
                font-size: 36px;
            }
        }
    </style>
</head>
<body>

@include('components.header')
<div class="page-wrapper">
    
    <!-- Hero Section -->
    <section class="contact-hero">
        <div class="inner-container">
            <div class="contact-hero-content">
                <h1>Contact Us</h1>
                <p>Have a question or ready to book? Reach out and our team will get back to you shortly.</p>
            </div>
        </div>
    </section>

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
                                <i class="ri-phone-fill"></i>
                            </div>
                            <h4>Phone Number</h4>
                            <p>0300-0053333</p>
                        </div>
                        <div class="info-card">
                            <div class="info-icon">
                                <i class="ri-mail-fill"></i>
                            </div>
                            <h4>Email Address</h4>
                            <p>indusresort7861@gmail.com</p>
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
                    <h3>Indus Resort Murree</h3>
                    <p>Surrounded by the calm of the hills, yet conveniently accessible for families and travelers.</p>
                    <div class="map-location-info">
                        <i class="ri-map-pin-line"></i>
                        <span>Governor House Road, Aliot<br>Bazar, Kohala Road, Murree</span>
                    </div>
                    <a href="https://maps.google.com" target="_blank" class="directions-btn">Get Directions</a>
                </div>
                <div class="map-img-side">
                    <img src="{{ asset('images/map.png') }}" alt="Map Location">
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
