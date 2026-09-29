<style>
    .testimonial-section {
        background-color: #17362f;
        padding: 80px 0;
        color: #fff;
    }
    .testimonial-header {
        text-align: center;
        margin-bottom: 50px;
    }
    .testimonial-header h2 {
        color: #fff;
        font-size: 2.5rem;
        margin-bottom: 10px;
    }
    .testimonial-header p {
        color: #c4d4d1;
        font-size: 1rem;
    }
    .testimonial-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }
    .testimonial-card {
        background-color: #21433b;
        padding: 30px;
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    .stars {
        color: #c99a4e;
        font-size: 1.2rem;
        margin-bottom: 15px;
    }
    .testimonial-card p {
        color: #e2e8e6;
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 25px;
    }
    .guest-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }
    .guest-avatar {
        width: 40px;
        height: 40px;
        background-color: #fff;
        border-radius: 50%;
    }
    .guest-details h5 {
        font-size: 1rem;
        color: #fff;
    }
    .guest-details span {
        font-size: 0.8rem;
        color: #9cb5b0;
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
    }
</style>

<section class="testimonial-section">
    <div class="inner-container">
        <div class="testimonial-header">
            <h2>What Our Guests Say</h2>
            <p>Authentic reviews from our previous guests to help you choose the best stay.</p>
        </div>
        
        <div class="testimonial-grid">
            <div class="testimonial-card">
                <div class="stars">★★★★★</div>
                <p>"Beautiful, stunning views and warm hospitality. The staff goes out of their way to make our family trip memorable."</p>
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
                <p>"Beautiful, stunning views and warm hospitality. The staff goes out of their way to make our family trip memorable."</p>
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
                <p>"Beautiful, stunning views and warm hospitality. The staff goes out of their way to make our family trip memorable."</p>
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
