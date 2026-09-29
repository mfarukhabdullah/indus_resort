<style>
    .cta-section {
        position: relative;
        padding: 100px 0;
        background-image: url('/images/view-imge.png');
        background-size: cover;
        background-position: center;
    }
    .cta-section::before {
        content: '';
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.3);
    }
    .cta-container {
        position: relative;
        z-index: 10;
        display: flex;
        justify-content: center;
    }
    .cta-card {
        background-color: #e8edea;
        padding: 50px 60px;
        border-radius: 12px;
        text-align: center;
        max-width: 700px;
        width: 100%;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    }
    .cta-tag {
        display: inline-block;
        background-color: #1e453e;
        color: #fff;
        font-size: 0.8rem;
        padding: 6px 12px;
        border-radius: 4px;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .cta-card h2 {
        font-size: 2.2rem;
        color: #1c2826;
        margin-bottom: 15px;
    }
    .cta-card p {
        font-size: 1rem;
        color: #555;
        margin-bottom: 30px;
    }
    .cta-card .btn-primary {
        display: block;
        width: 100%;
        padding: 15px;
        font-size: 1.1rem;
    }

    /* Responsive Media Queries */
    @media (max-width: 768px) {
        .cta-card {
            padding: 40px 30px;
        }
        .cta-card h2 {
            font-size: 1.8rem;
        }
        .cta-section {
            padding: 60px 0;
        }
    }
</style>

<section class="cta-section">
    <div class="inner-container cta-container">
        <div class="cta-card">
            <span class="cta-tag">Book Your Stay Now</span>
            <h2>Ready for Your Mountain Escape?</h2>
            <p>Reserve your suite today and experience the true luxury of Murree at Indus Resort.</p>
            <a href="#" class="btn btn-primary">Book Your Stay With Us</a>
        </div>
    </div>
</section>
