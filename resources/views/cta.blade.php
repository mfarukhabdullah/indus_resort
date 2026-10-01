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
        padding: 45px 65px;
        border-radius: 16px;
        text-align: left;
        box-shadow: 0 15px 40px rgba(0,0,0,0.35);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
        box-sizing: border-box;
    }
    .cta-tag {
        display: inline-block;
        background-color: #1F5F41;
        color: #ffffff;
        font-family: 'Libre Baskerville', 'Playfair Display', serif;
        font-size: 12px;
        font-weight: 500;
        padding: 6px 14px;
        border-radius: 4px;
        margin-bottom: 16px;
        text-transform: uppercase;
        letter-spacing: 1.2px;
    }
    .cta-card h2 {
        font-family: 'Libre Baskerville', 'Playfair Display', serif;
        font-size: 2.5rem;
        font-weight: 600;
        color: #000000;
        margin-bottom: 24px;
        line-height: 1.2;
    }
    .cta-content-row {
        display: flex;
        align-items: stretch;
        gap: 30px;
        width: 100%;
    }
    .cta-lines {
        width: 78px;
        background: repeating-linear-gradient(
            -45deg,
            transparent,
            transparent 6px,
            rgba(255, 255, 255, 0.4) 6px,
            rgba(255, 255, 255, 0.4) 7px
        );
        flex-shrink: 0;
    }
    .cta-text-btn {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        width: 100%;
        justify-content: space-between;
    }
    .cta-card p {
        font-family: 'Inter', sans-serif;
        font-size: 16px;
        color: #000000;
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
        font-family: 'Libre Baskerville', 'Playfair Display', serif;
        font-size: 16px;
        font-weight: 600;
        letter-spacing: 0.2px;
        line-height: 20px;
        text-transform: uppercase;
        padding: 8px 16px 8px 8px;
        border-radius: 8px;
        text-decoration: none;
        box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        display: flex;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        position: relative;
        overflow: hidden;
        z-index: 1;
    }
    .cta-book-btn::before {
        content: '';
        position: absolute;
        top: 8px;
        left: 8px;
        height: calc(100% - 16px);
        width: 0%;
        background-color: #1F5F41;
        border-radius: 6px;
        transition: width 0.4s cubic-bezier(0.25, 1, 0.5, 1);
        z-index: 1;
    }
    .cta-book-btn:hover::before {
        width: calc(100% - 16px);
    }
    .cta-book-btn:hover {
        transform: none !important;
        box-shadow: 0 4px 15px rgba(0,0,0,0.15) !important;
        background-color: #ffffff !important;
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
        position: relative;
        z-index: 2;
    }
    .cta-book-btn span {
        flex: 1;
        text-align: center;
        margin-right: 44px;
        color: #1F5F41;
        font-family: 'Libre Baskerville', 'Playfair Display', serif;
        position: relative;
        z-index: 2;
        transition: color 0.3s ease;
    }
    .cta-book-btn:hover span {
        color: #FFFFFF !important;
    }

    /* Responsive Media Queries */
    @media (max-width: 900px) {
        .cta-section {
            height: auto;
            min-height: 380px;
            padding: 20px 0;
            margin-top: 10px !important;
            margin-bottom: 10px !important;
        }
        .cta-card {
            width: 100% !important;
            height: auto !important;
            padding: 30px 20px !important;
            text-align: left;
            align-items: flex-start;
        }
        .cta-card h2 {
            font-size: 1.8rem;
            margin-bottom: 15px;
        }
        .cta-content-row {
            flex-direction: column;
            gap: 15px;
        }
        .cta-lines {
            display: none;
        }
        .cta-card p {
            font-size: 14px;
            margin-bottom: 25px;
        }
        .cta-text-btn {
            align-items: center; 
            width: 100%;
        }
        .cta-book-btn,
        .cta-book-btn *,
        .cta-book-btn::before,
        .cta-book-btn::after {
            transition: none !important;
            animation: none !important;
        }
        .cta-book-btn,
        .cta-book-btn:hover,
        .cta-book-btn:focus,
        .cta-book-btn:active {
            background-color: #1F5F41 !important;
            color: #FFFFFF !important;
            position: relative !important;
            padding: 0 !important;
            justify-content: center !important;
            width: 320px !important;
            max-width: 100% !important;
            height: 52px !important;
            margin: 0 auto;
            transform: none !important;
            box-shadow: none !important;
        }
        .cta-book-btn::before,
        .cta-book-btn:hover::before,
        .cta-book-btn:focus::before,
        .cta-book-btn:active::before {
            display: none !important;
            width: 0 !important;
        }
        .cta-btn-icon {
            position: absolute !important;
            left: 20px !important;
            background-color: transparent !important;
            width: auto !important;
            height: auto !important;
        }
        .cta-book-btn span,
        .cta-book-btn:hover span,
        .cta-book-btn:focus span,
        .cta-book-btn:active span {
            color: #FFFFFF !important;
            margin-right: 0 !important;
        }
    }
</style>

<section class="cta-section">
    <div class="inner-container cta-container">
        <div class="cta-card">
            <span class="cta-tag">YOUR COMFORT AWAITS</span>
            <h2>Ready for Your Mountain Escape?</h2>
            <div class="cta-content-row">
                <div class="cta-lines"></div>
                <div class="cta-text-btn">
                    <p>Reserve your room today and experience the beauty of Murree at Indus Resort.</p>
                    <a href="https://wa.me/923000053333" target="_blank" class="cta-book-btn">
                        <div class="cta-btn-icon">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 2L10 7L5 12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <span>BOOK YOUR STAY NOW</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
