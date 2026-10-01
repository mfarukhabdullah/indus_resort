<style>
    .testimonial-section {
        position: relative;
        background-color: #0c251c;
        padding: 80px 0;
        color: #fff;
        overflow: hidden;
        margin-top:55px;
    }
    .testimonial-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: url('{{ asset("images/guest-bg-img.png") }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        opacity: 0.15;
        z-index: 1;
    }
    .testimonial-section > * {
        position: relative;
        z-index: 2;
    }
    .testimonial-header {
        text-align: center;
        margin-bottom: 50px;
    }
    .testimonial-header h2 {
        color: #fff;
        font-family: 'Libre Baskerville', 'Playfair Display', serif;
        font-size: 2.5rem;
        margin-bottom: 10px;
        font-weight: 400;
    }
    .testimonial-header p {
        color: rgba(255, 255, 255, 0.85);
        font-size: 1rem;
    }
    .testimonial-header h2,
    .testimonial-header p,
    .testimonial-card {
        opacity: 0;
        transform: translateY(65px);
        transition: opacity 1.2s cubic-bezier(0.16, 1, 0.3, 1), transform 1.2s cubic-bezier(0.16, 1, 0.3, 1);
        will-change: opacity, transform;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
    }
    .testimonial-header h2.is-visible,
    .testimonial-header p.is-visible,
    .testimonial-card.is-visible {
        opacity: 1 !important;
        transform: translateY(0) !important;
    }
    .testimonial-header p {
        transition-delay: 0.15s;
    }
    .testimonial-grid .testimonial-card:nth-child(1) {
        transition-delay: 0.1s;
    }
    .testimonial-grid .testimonial-card:nth-child(2) {
        transition-delay: 0.3s;
    }
    .testimonial-grid .testimonial-card:nth-child(3) {
        transition-delay: 0.5s;
    }
    .testimonial-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }
    .testimonial-card {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        padding: 30px;
        border-radius: 16px;
        border: 1.13px solid rgba(255, 255, 255, 0.10);
        box-shadow: 0 0 0 1.13px rgba(255, 255, 255, 0.10);
    }
    .stars {
        color: #dfb56c;
        font-size: 1.2rem;
        margin-bottom: 15px;
        letter-spacing: 2px;
    }
    .testimonial-card p {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1rem;
        line-height: 1.6;
        margin-bottom: 25px;
    }
    .guest-info {
        display: flex;
        align-items: center;
        gap: 15px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        padding-top: 20px;
    }
    .guest-avatar {
        width: 44px;
        height: 44px;
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 50%;
        flex-shrink: 0;
    }
    .guest-details h5 {
        font-size: 1rem;
        color: #fff;
        font-weight: 600;
    }
    .guest-details span {
        font-size: 0.8rem;
        color: rgba(255, 255, 255, 0.65);
    }

    /* Responsive Media Queries */
    @media (max-width: 1024px) {
        .testimonial-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (max-width: 768px) {
        .testimonial-grid {
            grid-template-columns: 1fr;
        }
        .testimonial-header h2 {
            font-size: 2rem;
        }
        .testimonial-header p {
            max-width: 320px;
            margin: 0 auto;
            line-height: 1.6;
        }
        .testimonial-card:not(:first-child) {
            display: none;
        }
    }
</style>

<section class="testimonial-section" id="testimonials">
    <div class="inner-container">
        <div class="testimonial-header">
            <h2>What Our Guests Say</h2>
            <p>Real stories from families and travellers who found their peaceful escape at Indus Resort.</p>
        </div>
        
        <div class="testimonial-grid">
            <div class="testimonial-card">
                <div class="stars">★★★★★</div>
                <p>"Absolutely stunning views and warm hospitality. The staff went out of their way to make our family trip memorable."</p>
                <div class="guest-info">
                    <div class="guest-avatar"></div>
                    <div class="guest-details">
                        <h5>Ahmed Raza</h5>
                        <span>Lahore</span>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="stars">★★★★★</div>
                <p>"Absolutely stunning views and warm hospitality. The staff went out of their way to make our family trip memorable."</p>
                <div class="guest-info">
                    <div class="guest-avatar"></div>
                    <div class="guest-details">
                        <h5>Ahmed Raza</h5>
                        <span>Lahore</span>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="stars">★★★★★</div>
                <p>"Absolutely stunning views and warm hospitality. The staff went out of their way to make our family trip memorable."</p>
                <div class="guest-info">
                    <div class="guest-avatar"></div>
                    <div class="guest-details">
                        <h5>Ahmed Raza</h5>
                        <span>Lahore</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
