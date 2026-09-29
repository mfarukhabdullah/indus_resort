<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Indus Resort - Luxury Hotel & River Sanctuary</title>
    <meta name="description" content="Experience unparalleled luxury at Indus Resort. Book luxury suites, private plunge villas, gourmet dining, and riverfront wellness in Murree.">
    
    <!-- Remixicon for Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    
    <!-- Main Style Sheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- Header Component (226.07x60 Logo, 198x60 Book Now Button, Libre Baskerville Typography) -->
    @include('components.header')

    <!-- Hero Section -->
    <section class="hero" id="hero">
        <div class="outer-container">
            <div class="container-1240 hero-wrapper">
                <div class="hero-content">
                    <span class="hero-subtitle">WELCOME TO UNMATCHED SERENITY</span>
                    <h1 class="hero-title">Where Majestic Nature Meets <span class="gold-gradient-text">Timeless Luxury</span></h1>
                    <p class="hero-description">Nestled along the iconic waters, Indus Resort offers private villas, riverfront infinity pools, organic dining, and bespoke sanctuary experiences tailored for the discerning guest.</p>
                    <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                        <a href="#rooms" class="btn-gold"><i class="ri-hotel-bed-line"></i> Explore Accommodations</a>
                        <a href="#amenities" class="btn-outline-gold"><i class="ri-compass-3-line"></i> View Resort Experiences</a>
                    </div>
                </div>

                <!-- Booking Search Widget (Inside 1240px container) -->
                <div class="booking-search-bar">
                    <div class="search-field">
                        <label class="search-label"><i class="ri-calendar-event-line"></i> Check-In Date</label>
                        <input type="date" id="hero-checkin" class="search-input" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="search-field">
                        <label class="search-label"><i class="ri-calendar-2-line"></i> Check-Out Date</label>
                        <input type="date" id="hero-checkout" class="search-input" value="{{ date('Y-m-d', strtotime('+2 days')) }}">
                    </div>
                    <div class="search-field">
                        <label class="search-label"><i class="ri-user-star-line"></i> Guests</label>
                        <select id="hero-guests" class="search-input">
                            <option value="1">1 Guest</option>
                            <option value="2" selected>2 Guests</option>
                            <option value="3">3 Guests</option>
                            <option value="4">4+ Guests / Family</option>
                        </select>
                    </div>
                    <div class="search-field">
                        <label class="search-label"><i class="ri-building-4-line"></i> Room Category</label>
                        <select id="hero-room-type" class="search-input">
                            <option value="Deluxe River Suite">Deluxe River Suite</option>
                            <option value="Presidential Villa">Presidential Villa</option>
                            <option value="Royal Indus Pavilion">Royal Indus Pavilion</option>
                        </select>
                    </div>
                    <div style="display: flex; align-items: flex-end;">
                        <button class="btn-gold" style="width: 100%; height: 48px;" onclick="triggerQuickSearch()">
                            <i class="ri-search-line"></i> Check Availability
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Accommodations / Rooms Showcase -->
    <section class="section" id="rooms">
        <div class="outer-container">
            <div class="container-1240">
                <div class="section-header">
                    <span class="section-tag">STAY WITH US</span>
                    <h2 class="section-title">Exclusive <span class="gold-gradient-text">Suites & Villas</span></h2>
                    <div class="section-divider"></div>
                </div>

                <div class="room-filters">
                    <button class="filter-btn active" onclick="filterRooms('all', this)">All Accommodations</button>
                    <button class="filter-btn" onclick="filterRooms('suite', this)">Suites</button>
                    <button class="filter-btn" onclick="filterRooms('villa', this)">Private Villas</button>
                    <button class="filter-btn" onclick="filterRooms('executive', this)">Executive</button>
                </div>

                <div class="rooms-grid">
                    <!-- Room Card 1 -->
                    <div class="room-card" data-category="suite">
                        <div class="room-image-wrap">
                            <img src="{{ asset('images/deluxe_suite.jpg') }}" alt="Deluxe River Suite" class="room-image">
                            <span class="room-badge">RIVERFRONT</span>
                        </div>
                        <div class="room-details">
                            <h3 class="room-title">Deluxe River Suite</h3>
                            <p class="room-desc">Panoramic Indus river view, king luxury bedding, private sun terrace, and marble bathroom with soaking tub.</p>
                            <div class="room-specs">
                                <div class="spec-item"><i class="ri-expand-height-line text-gold"></i> 750 sq.ft</div>
                                <div class="spec-item"><i class="ri-user-line text-gold"></i> 2 Guests</div>
                                <div class="spec-item"><i class="ri-hotel-bed-line text-gold"></i> King Bed</div>
                            </div>
                            <div class="room-footer">
                                <div class="room-price">
                                    <span class="price-amount">$350</span>
                                    <span class="price-unit">/ night + taxes</span>
                                </div>
                                <button class="btn-outline-gold" onclick="openBookingModal('Deluxe River Suite', 350)">Book Suite</button>
                            </div>
                        </div>
                    </div>

                    <!-- Room Card 2 -->
                    <div class="room-card" data-category="villa">
                        <div class="room-image-wrap">
                            <img src="{{ asset('images/presidential_villa.jpg') }}" alt="Presidential Villa" class="room-image">
                            <span class="room-badge">PRIVATE POOL</span>
                        </div>
                        <div class="room-details">
                            <h3 class="room-title">Presidential Villa</h3>
                            <p class="room-desc">Exclusive multi-room sanctuary with personal infinity plunge pool, teak sun deck, private butler service, and outdoor rain shower.</p>
                            <div class="room-specs">
                                <div class="spec-item"><i class="ri-expand-height-line text-gold"></i> 1,600 sq.ft</div>
                                <div class="spec-item"><i class="ri-user-line text-gold"></i> 4 Guests</div>
                                <div class="spec-item"><i class="ri-hotel-bed-line text-gold"></i> 2 King Beds</div>
                            </div>
                            <div class="room-footer">
                                <div class="room-price">
                                    <span class="price-amount">$820</span>
                                    <span class="price-unit">/ night + taxes</span>
                                </div>
                                <button class="btn-outline-gold" onclick="openBookingModal('Presidential Villa', 820)">Book Villa</button>
                            </div>
                        </div>
                    </div>

                    <!-- Room Card 3 -->
                    <div class="room-card" data-category="executive">
                        <div class="room-image-wrap">
                            <img src="{{ asset('images/hero.jpg') }}" alt="Royal Indus Pavilion" class="room-image">
                            <span class="room-badge">SIGNATURE</span>
                        </div>
                        <div class="room-details">
                            <h3 class="room-title">Royal Indus Pavilion</h3>
                            <p class="room-desc">Our flagship residence perched over calm waters with 360° mountain vistas, private lounge, personal chef service, and helipad access.</p>
                            <div class="room-specs">
                                <div class="spec-item"><i class="ri-expand-height-line text-gold"></i> 2,400 sq.ft</div>
                                <div class="spec-item"><i class="ri-user-line text-gold"></i> 6 Guests</div>
                                <div class="spec-item"><i class="ri-vip-crown-2-line text-gold"></i> Royal Master Suite</div>
                            </div>
                            <div class="room-footer">
                                <div class="room-price">
                                    <span class="price-amount">$1,450</span>
                                    <span class="price-unit">/ night + taxes</span>
                                </div>
                                <button class="btn-outline-gold" onclick="openBookingModal('Royal Indus Pavilion', 1450)">Book Pavilion</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Amenities Section -->
    <section class="section" id="amenities" style="background: rgba(7, 19, 17, 0.5);">
        <div class="outer-container">
            <div class="container-1240">
                <div class="section-header">
                    <span class="section-tag">UNRIVALED EXPERIENCES</span>
                    <h2 class="section-title">World-Class <span class="gold-gradient-text">Resort Amenities</span></h2>
                    <div class="section-divider"></div>
                </div>

                <div class="amenities-grid">
                    <div class="amenity-card">
                        <div class="amenity-icon"><i class="ri-drop-line"></i></div>
                        <h3 class="amenity-title">Infinity Edge Pool</h3>
                        <p class="amenity-desc">Temperature-controlled freshwater pool overlooking the sweeping Indus valley horizon.</p>
                    </div>

                    <div class="amenity-card">
                        <div class="amenity-icon"><i class="ri-spa-line"></i></div>
                        <h3 class="amenity-title">Holistic Spa & Bath</h3>
                        <p class="amenity-desc">Organic herbal body therapies, stone massages, and aromatherapy sanctuary.</p>
                    </div>

                    <div class="amenity-card">
                        <div class="amenity-icon"><i class="ri-restaurant-line"></i></div>
                        <h3 class="amenity-title">Gourmet Dining</h3>
                        <p class="amenity-desc">Farm-to-table organic dining with executive chefs and rare international vintage wines.</p>
                    </div>

                    <div class="amenity-card">
                        <div class="amenity-icon"><i class="ri-sailboat-line"></i></div>
                        <h3 class="amenity-title">Private River Safari</h3>
                        <p class="amenity-desc">Guided sunset boat tours, kayak expeditions, and scenic riverside dining setups.</p>
                    </div>

                    <div class="amenity-card">
                        <div class="amenity-icon"><i class="ri-user-star-line"></i></div>
                        <h3 class="amenity-title">24/7 Concierge Butler</h3>
                        <p class="amenity-desc">Dedicated personal butler to cater to your itinerary, dining, and comfort requests.</p>
                    </div>

                    <div class="amenity-card">
                        <div class="amenity-icon"><i class="ri-plane-line"></i></div>
                        <h3 class="amenity-title">Luxury Transfers</h3>
                        <p class="amenity-desc">Private chauffeur airport transfers and helicopter landing pad availability.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dining Banner Section -->
    <section class="section" id="dining">
        <div class="outer-container">
            <div class="container-1240">
                <div class="dining-banner">
                    <div class="dining-content">
                        <span class="section-tag">CULINARY EXCELLENCE</span>
                        <h3 class="font-heading">The Indus <span class="gold-gradient-text">Waterfront Restaurant</span></h3>
                        <p>Immerse your senses in culinary artistry crafted by our award-winning master chefs. Indulge in authentic regional flavors fused with contemporary international gastronomy.</p>
                        
                        <div class="dining-features">
                            <div class="dining-feature-item">
                                <i class="ri-checkbox-circle-fill dining-feature-icon"></i>
                                <span>Organic Garden-to-Plate Ingredients</span>
                            </div>
                            <div class="dining-feature-item">
                                <i class="ri-checkbox-circle-fill dining-feature-icon"></i>
                                <span>Private Candlelit Riverfront Deck</span>
                            </div>
                            <div class="dining-feature-item">
                                <i class="ri-checkbox-circle-fill dining-feature-icon"></i>
                                <span>Curated Reserve Wine Cellar</span>
                            </div>
                            <div class="dining-feature-item">
                                <i class="ri-checkbox-circle-fill dining-feature-icon"></i>
                                <span>Sunset Cocktail Lounge</span>
                            </div>
                        </div>

                        <button class="btn-gold" onclick="openBookingModal('Dining Table Reservation', 0)">
                            <i class="ri-restaurant-2-line"></i> Reserve a Table
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Guest Reviews / Testimonials -->
    <section class="section" id="testimonials" style="background: rgba(7, 19, 17, 0.3);">
        <div class="outer-container">
            <div class="container-1240">
                <div class="section-header">
                    <span class="section-tag">GUEST TESTIMONIALS</span>
                    <h2 class="section-title">Voices of <span class="gold-gradient-text">Sanctuary</span></h2>
                    <div class="section-divider"></div>
                </div>

                <div class="amenities-grid">
                    <div class="amenity-card" style="text-align: left; padding: 2rem;">
                        <div style="color: var(--gold-bright); margin-bottom: 1rem;">
                            <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i>
                        </div>
                        <p style="color: var(--text-muted); font-style: italic; margin-bottom: 1.5rem;">"An unforgettable getaway! The river views from our Presidential Villa were surreal, and the butler service made us feel like royalty."</p>
                        <h4 style="color: var(--text-light);" class="font-heading">Sophia & Alexander Sterling</h4>
                        <span style="color: var(--gold-primary); font-size: 0.8rem;">London, United Kingdom</span>
                    </div>

                    <div class="amenity-card" style="text-align: left; padding: 2rem;">
                        <div style="color: var(--gold-bright); margin-bottom: 1rem;">
                            <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i>
                        </div>
                        <p style="color: var(--text-muted); font-style: italic; margin-bottom: 1.5rem;">"The serene atmosphere, infinity pool, and world-class spa treatments allowed us to truly unwind. Best luxury resort experience."</p>
                        <h4 style="color: var(--text-light);" class="font-heading">Dr. Tariq & Aisha Mansoor</h4>
                        <span style="color: var(--gold-primary); font-size: 0.8rem;">Dubai, UAE</span>
                    </div>

                    <div class="amenity-card" style="text-align: left; padding: 2rem;">
                        <div style="color: var(--gold-bright); margin-bottom: 1rem;">
                            <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i>
                        </div>
                        <p style="color: var(--text-muted); font-style: italic; margin-bottom: 1.5rem;">"Dining under the stars by the Indus river was magical. Attention to architectural detail and hospitality is unmatched."</p>
                        <h4 style="color: var(--text-light);" class="font-heading">Elena Rostova</h4>
                        <span style="color: var(--gold-primary); font-size: 0.8rem;">Zurich, Switzerland</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Component -->
    @include('components.footer')

    <!-- Interactive Reservation Modal -->
    <div class="modal-overlay" id="bookingModal">
        <div class="modal-container">
            <button class="modal-close" onclick="closeBookingModal()"><i class="ri-close-line"></i></button>
            
            <h3 class="modal-title font-heading">Complete Reservation</h3>
            <p class="modal-subtitle">Reserve your stay at Indus Resort with instant confirmation</p>

            <form id="reservationForm" onsubmit="handleReservation(event)">
                <div class="form-grid">
                    <div class="form-group full-width">
                        <label class="form-label">Selected Room / Service</label>
                        <input type="text" id="modal-room-name" class="form-control" readonly style="color: var(--gold-bright); font-weight: 600;">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" placeholder="John Doe" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control" placeholder="john@example.com" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" placeholder="+1 (555) 000-0000" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Check-In Date</label>
                        <input type="date" id="modal-checkin" class="form-control" value="{{ date('Y-m-d') }}" required onchange="calculateModalTotal()">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Check-Out Date</label>
                        <input type="date" id="modal-checkout" class="form-control" value="{{ date('Y-m-d', strtotime('+2 days')) }}" required onchange="calculateModalTotal()">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Guests</label>
                        <select class="form-control">
                            <option>1 Adult</option>
                            <option selected>2 Adults</option>
                            <option>2 Adults, 1 Child</option>
                            <option>4 Adults (Family Suite)</option>
                        </select>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Special Requests (Optional)</label>
                        <textarea class="form-control" rows="3" placeholder="Airport transfer, dietary preferences, honeymoon setup..."></textarea>
                    </div>
                </div>

                <div class="booking-summary-box">
                    <div>
                        <span style="color: var(--text-muted); font-size: 0.85rem;">Estimated Total:</span>
                        <h4 id="modal-total-price" style="color: var(--gold-bright); font-size: 1.4rem;" class="font-heading">$700</h4>
                    </div>
                    <span style="color: var(--gold-primary); font-size: 0.8rem;"><i class="ri-shield-check-line"></i> Best Rate Guaranteed</span>
                </div>

                <button type="submit" class="btn-gold" style="width: 100%; padding: 1rem;">
                    <i class="ri-check-double-line"></i> Confirm Reservation
                </button>
            </form>
        </div>
    </div>

    <!-- Toast Notification -->
    <div class="toast-notification" id="toast">
        <i class="ri-checkbox-circle-fill" style="color: var(--gold-bright); font-size: 1.5rem;"></i>
        <div>
            <h4 id="toast-title" style="font-size: 0.95rem;">Reservation Confirmed!</h4>
            <p id="toast-message" style="font-size: 0.8rem; color: var(--text-muted);">We have received your booking details.</p>
        </div>
    </div>

    <!-- JavaScript Logic -->
    <script>
        let currentRoomPrice = 350;

        function toggleMobileNav() {
            const nav = document.querySelector('.header-nav');
            if (nav) nav.classList.toggle('mobile-active');
        }

        // Navbar Scroll Blur Effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (navbar) {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            }
        });

        // Filter Rooms Function
        function filterRooms(category, btn) {
            const buttons = document.querySelectorAll('.filter-btn');
            buttons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const cards = document.querySelectorAll('.room-card');
            cards.forEach(card => {
                if (category === 'all' || card.dataset.category === category) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Booking Modal Operations
        function openBookingModal(roomName, pricePerNight) {
            document.getElementById('modal-room-name').value = roomName;
            currentRoomPrice = pricePerNight;
            calculateModalTotal();
            document.getElementById('bookingModal').classList.add('active');
        }

        function closeBookingModal() {
            document.getElementById('bookingModal').classList.remove('active');
        }

        function calculateModalTotal() {
            const cin = new Date(document.getElementById('modal-checkin').value);
            const cout = new Date(document.getElementById('modal-checkout').value);
            let nights = Math.ceil((cout - cin) / (1000 * 60 * 60 * 24));
            if (isNaN(nights) || nights <= 0) nights = 1;

            if (currentRoomPrice === 0) {
                document.getElementById('modal-total-price').innerText = 'Complimentary Reservation';
            } else {
                const total = nights * currentRoomPrice;
                document.getElementById('modal-total-price').innerText = '$' + total.toLocaleString();
            }
        }

        function triggerQuickSearch() {
            const roomType = document.getElementById('hero-room-type').value;
            let price = 350;
            if (roomType.includes('Villa')) price = 820;
            if (roomType.includes('Pavilion')) price = 1450;
            
            document.getElementById('modal-checkin').value = document.getElementById('hero-checkin').value;
            document.getElementById('modal-checkout').value = document.getElementById('hero-checkout').value;
            openBookingModal(roomType, price);
        }

        function handleReservation(event) {
            event.preventDefault();
            closeBookingModal();
            showToast('Reservation Submitted!', 'Thank you! Our concierge team will contact you shortly to finalize your luxury experience.');
        }

        function showToast(title, message) {
            const toast = document.getElementById('toast');
            document.getElementById('toast-title').innerText = title;
            document.getElementById('toast-message').innerText = message;
            toast.classList.add('show');
            setTimeout(() => {
                toast.classList.remove('show');
            }, 5000);
        }

        // Close modal on overlay click
        document.getElementById('bookingModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeBookingModal();
            }
        });
    </script>
</body>
</html>
