<style>
    .cta-section {
        position: relative;
        width: 100%;
        height: 447px;
        min-height: 447px;
        background-image: url('{{ asset("images/cta-bg-img.png") }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        margin-top: 55px;
        margin-bottom: 55px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
    }
    .cta-section::before {
        content: '';
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.6); /* 60% opacity #000000 */
        z-index: 1;
    }
    .cta-container {
        position: relative;
        z-index: 10;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }
    .cta-card {
        background-color: #a8a295;
        width: 840px;
        max-width: 100%;
        height: 366px;
        padding: 35px 50px;
        border-radius: 16px;
        text-align: center;
        box-shadow: 0 15px 40px rgba(0,0,0,0.35);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
    }
    .cta-tag {
        display: inline-block;
        background-color: #1F5F41;
        color: #ffffff;
        font-family: 'Inter', sans-serif;
        font-size: 11px;
        font-weight: 600;
        padding: 6px 14px;
        border-radius: 4px;
        margin-bottom: 16px;
        text-transform: uppercase;
        letter-spacing: 1.2px;
    }
    .cta-card h2 {
        font-family: 'Libre Baskerville', 'Playfair Display', serif;
        font-size: 2.2rem;
        font-weight: 600;
        color: #1a2823;
        margin-bottom: 12px;
        line-height: 1.3;
    }
    .cta-card p {
        font-family: 'Inter', sans-serif;
        font-size: 14.5px;
        color: #2b3a34;
        margin-bottom: 24px;
        line-height: 1.5;
        max-width: 520px;
    }
    .cta-book-btn {
        width: 497px;
        max-width: 100%;
        height: 60px;
        background-color: #ffffff;
        color: #133827;
        font-family: 'Inter', sans-serif;
        font-size: 14px;
        font-weight: 700;
        letter-spacing: 0.8px;
        padding: 8px 16px 8px 8px;
        border-radius: 8px;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        display: flex;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
    }
    .cta-book-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.25);
        background-color: #fcfcfc;
    }
    .cta-btn-icon {
        width: 44px;
        height: 44px;
        background-color: #1F5F41;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .cta-book-btn span {
        flex: 1;
        text-align: center;
        margin-right: 44px; /* Balances the left icon to center text perfectly */
        color:#1F5F41;
    }

    /* Responsive Media Queries */
    @media (max-width: 900px) {
        .cta-section {
            height: auto;
            min-height: 380px;
            padding: 40px 15px;
        }
        .cta-card {
            width: 100% !important;
            height: auto !important;
            min-height: auto !important;
            padding: 30px 20px !important;
        }
        .cta-card h2 {
            font-size: 1.6rem;
        }
        .cta-card p {
            font-size: 13.5px;
        }
        .cta-book-btn {
            width: 100% !important;
            height: 54px !important;
        }
        .cta-book-btn span {
            margin-right: 38px !important;
        }
        .cta-btn-icon {
            width: 38px !important;
            height: 38px !important;
        }
    }
</style>

<section class="cta-section">
    <div class="inner-container cta-container">
        <div class="cta-card">
            <span class="cta-tag">YOUR COMFORT AWAITS</span>
            <h2>Ready for Your Mountain Escape?</h2>
            <p>Reserve your room today and experience the beauty of Murree at Indus Resort.</p>
            <a href="#bookingModal" class="cta-book-btn">
                <div class="cta-btn-icon">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 2L10 7L5 12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <span>BOOK YOUR STAY NOW</span>
            </a>
        </div>
    </div>
</section>
