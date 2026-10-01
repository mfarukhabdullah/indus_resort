<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <title>{{ $seo['gallery']['title'] }}</title><meta name="description" content="{{ $seo['gallery']['description'] }}"><meta name="keywords" content="{{ $seo['gallery']['keywords'] }}"><meta name="robots" content="{{ $seo['gallery']['robots'] }}"><link rel="canonical" href="{{ url()->current() }}">
    <meta name="description" content="A glimpse into the rooms, views, and experiences waiting for you at Indus Resort Murree.">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Libre+Baskerville:wght@400;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');

    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { background-color: #fcfbf9; margin: 0; font-family: 'Plus Jakarta Sans', sans-serif; }
    .page-wrapper { width: 100%; background-color: #fff; overflow: hidden; }
    h1, h2, h3, h4 { font-family: 'Libre Baskerville', serif; color: #000; }
    p { color: #000; line-height: 1.6; }
    .inner-container { width: 100%; max-width: 1200px; margin: 0 auto; padding: 0 20px; box-sizing: border-box; }

    /* Hero */
    .about-hero {
        position: relative;
        height: 430px;
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        padding-top: 80px;
        width: 100%;
    }
    .about-hero::before { display: none; }
    .about-hero-content { position: relative; z-index: 10; color: #fff; text-align: left; }
    .gallery-badge {
        display: inline-block;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #C9A84C;
        margin-bottom: 14px;
    }
    .about-hero-content h1 { color: #fff; font-size: 48px; margin-bottom: 15px; font-family: 'Libre Baskerville', serif; }
    .about-hero-content p { color: #ffffffcc; font-size: 18px; max-width: 520px; }

    /* Gallery Intro */
    .gallery-intro { text-align: center; padding: 20px 0 20px 0; }
    .section-tag {
        display: inline-block;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: #C9A84C;
        margin-bottom: 14px;
    }
    .gallery-intro h2 { font-size: 36px; color: #1a1a1a; margin-bottom: 6px; }
    .gallery-intro p { font-size: 16px; color: #000; max-width: 560px; margin: 0 auto; }

    /* Filter Tabs */
    .gallery-filters {
        display: flex;
        justify-content: center;
        gap: 12px;
        flex-wrap: wrap;
        padding: 0 0 40px 0;
    }
    .filter-btn {
        padding: 9px 22px;
        border-radius: 50px;
        border: 1.5px solid #d0d0d0;
        background: #fff;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 14px;
        font-weight: 500;
        color: #444;
        cursor: pointer;
        transition: all 0.25s ease;
    }
    .filter-btn:hover, .filter-btn.active {
        background: #133827;
        border-color: #133827;
        color: #fff;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
        padding-bottom: 30px;
    }
    .gallery-item img { width: 100%; height: 100%; object-fit: cover; display: block; border-radius: 14px; transition: filter 0.3s ease; }
    .gallery-item { border-radius: 14px; overflow: hidden; position: relative; cursor: pointer; height: 420px; transition: box-shadow 0.3s ease; }
    .gallery-item:hover { box-shadow: 0 12px 35px rgba(0,0,0,0.25); }
    .gallery-item img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.4s ease; }
    .gallery-item:hover img { transform: scale(1.07); }

    /* Lightbox */
    .lightbox {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.92);
        z-index: 9999;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }
    .lightbox.open { display: flex; }
    .lightbox img { max-width: 90vw; max-height: 88vh; border-radius: 12px; object-fit: contain; box-shadow: 0 20px 60px rgba(0,0,0,0.5); }
    .lightbox-close { position: absolute; top: 20px; right: 28px; color: #fff; font-size: 36px; cursor: pointer; line-height: 1; transition: opacity 0.2s; }
    .lightbox-close:hover { opacity: 0.7; }
    .lightbox-prev, .lightbox-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255,255,255,0.15);
        border: none;
        color: #fff;
        font-size: 28px;
        width: 52px;
        height: 52px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background 0.2s;
    }
    .lightbox-prev:hover, .lightbox-next:hover { background: rgba(255,255,255,0.3); }
    .lightbox-prev { left: 30px; }
    .lightbox-next { right: 30px; }

    /* Instagram CTA */
    .instagram-cta {
        background: #faf6ec;
        border-radius: 20px;
        text-align: center;
        padding: 40px 30px;
        margin: 0 0 30px 0;
    }
    .instagram-cta .insta-icon { font-size: 32px; color: #C9A84C; margin-bottom: 16px; }
    .instagram-cta h3 { font-size: 26px; color: #1a1a1a; margin-bottom: 12px; }
    .instagram-cta p { font-size: 15px; color: #000; max-width: 480px; margin: 0 auto 24px auto; }
    .instagram-cta a {
        display: inline-block;
        background: #133827;
        color: #fff;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 14px;
        font-weight: 600;
        padding: 13px 30px;
        border-radius: 50px;
        text-decoration: none;
        transition: background 0.3s ease, transform 0.2s ease;
    }
    .instagram-cta a:hover { background: #0e2a1d; transform: translateY(-2px); }

    /* Responsive */
    @media (max-width: 900px) {
        .gallery-grid { grid-template-columns: repeat(2, 1fr); }
        .about-hero-content h1 { font-size: 34px; }
    }
    @media (max-width: 580px) {
        .gallery-grid { grid-template-columns: 1fr; }
        .gallery-item { height: 360px; }
        .gallery-intro h2 { font-size: 20px; }
        .about-hero { height: auto; min-height: 360px; padding-top: 110px; padding-bottom: 40px; text-align: center; }
        .about-hero-content { text-align: center; }
        .about-hero-content h1 { font-size: 28px; }
        .lightbox-prev, .lightbox-next {
            top: 50%;
            transform: translateY(-50%);
            width: 46px;
            height: 46px;
            font-size: 26px;
        }
        .lightbox-prev { left: 8px; }
        .lightbox-next { right: 8px; }
        .instagram-cta { padding: 35px 20px; border-radius: 16px; }
        .instagram-cta h3 { font-size: 22px; }
        .instagram-cta p { font-size: 14px; }
    }
</style>
</head>
<body>

@include('components.header')

<div class="page-wrapper">

    {{-- Hero --}}
    @include('components.hero', [
        'title' => '<span class="gallery-badge">GALLERY</span><br>Moments at Indus Resort',
        'subtitle' => 'A glimpse into the rooms, views, and experiences waiting for you in Murree.',
        'image' => 'images/gallery-hero-v2.png'
    ])

    {{-- Intro --}}
    <section class="gallery-intro">
        <div class="inner-container">
            <span class="section-tag">PHOTO GALLERY</span>
            <h2>See Indus Resort Through Our Guests' Eyes</h2>
            <p>From misty mountain mornings to cozy evenings by the fire — explore the beauty that awaits you.</p>
        </div>
    </section>



    {{-- Gallery Grid --}}
    <section class="inner-container">
        <div class="gallery-grid" id="galleryGrid">

            @foreach($galleryImages as $index => $image)
                <div class="gallery-item" data-category="{{ $image['category'] ?? 'all' }}" onclick="openLightbox({{ $index }})">
                    <img src="{{ asset($image['path']) }}" alt="Indus Resort Gallery" loading="lazy">
                    <div class="gallery-item-overlay"><i class="ri-zoom-in-line"></i></div>
                </div>
            @endforeach

            @if(false)

            <div class="gallery-item" data-category="exterior" onclick="openLightbox(0)">
                <img src="{{ asset('images/mountain-view-one.webp') }}" alt="Indus Resort Exterior" loading="lazy">
                <div class="gallery-item-overlay"><i class="ri-zoom-in-line"></i></div>
            </div>

            <div class="gallery-item" data-category="views" onclick="openLightbox(1)">
                <img src="{{ asset('images/mountain-view-two.webp') }}" alt="Mountain View" loading="lazy">
            </div>

            <div class="gallery-item" data-category="exterior" onclick="openLightbox(2)">
                <img src="{{ asset('images/mountain-view-five.webp') }}" alt="Resort Building" loading="lazy">
            </div>

            <div class="gallery-item" data-category="rooms" onclick="openLightbox(3)">
                <img src="{{ asset('images/suite-one.webp') }}" alt="Suite Room" loading="lazy">
            </div>

            <div class="gallery-item" data-category="lawn" onclick="openLightbox(4)">
                <img src="{{ asset('images/lawn-access-one.webp') }}" alt="Lawn Access" loading="lazy">
            </div>

            <div class="gallery-item" data-category="rooms" onclick="openLightbox(5)">
                <img src="{{ asset('images/bedroom-balcony-Cradtk-four.webp') }}" alt="Bedroom Balcony" loading="lazy">
            </div>

            <div class="gallery-item" data-category="exterior" onclick="openLightbox(6)">
                <img src="{{ asset('images/mountain-view-six.webp') }}" alt="Resort View" loading="lazy">
            </div>

            <div class="gallery-item" data-category="lawn" onclick="openLightbox(7)">
                <img src="{{ asset('images/lawn-access-two.webp') }}" alt="Lawn Area" loading="lazy">
            </div>

            <div class="gallery-item" data-category="rooms" onclick="openLightbox(8)">
                <img src="{{ asset('images/suite-two.webp') }}" alt="Suite Interior" loading="lazy">
            </div>

            <div class="gallery-item" data-category="views" onclick="openLightbox(9)">
                <img src="{{ asset('images/peace-full-upper.png') }}" alt="Peaceful View" loading="lazy">
            </div>

            <div class="gallery-item" data-category="lawn" onclick="openLightbox(10)">
                <img src="{{ asset('images/lawn-access-three.webp') }}" alt="Garden" loading="lazy">
            </div>

            <div class="gallery-item" data-category="rooms" onclick="openLightbox(11)">
                <img src="{{ asset('images/suite-three.webp') }}" alt="Suite Three" loading="lazy">
            </div>

            <div class="gallery-item" data-category="views" onclick="openLightbox(12)">
                <img src="{{ asset('images/peace-short-first.png') }}" alt="Scenic View" loading="lazy">
            </div>

            <div class="gallery-item" data-category="lawn" onclick="openLightbox(13)">
                <img src="{{ asset('images/lawn-access-four.webp') }}" alt="Lawn Four" loading="lazy">
            </div>

            <div class="gallery-item" data-category="rooms" onclick="openLightbox(14)">
                <img src="{{ asset('images/suite-four.webp') }}" alt="Suite Four" loading="lazy">
            </div>

            <div class="gallery-item" data-category="views" onclick="openLightbox(15)">
                <img src="{{ asset('images/peace-full-short-second.png') }}" alt="View Two" loading="lazy">
            </div>

            <div class="gallery-item" data-category="lawn" onclick="openLightbox(16)">
                <img src="{{ asset('images/lawn-access-five.webp') }}" alt="Lawn Five" loading="lazy">
            </div>

            <div class="gallery-item" data-category="rooms" onclick="openLightbox(17)">
                <img src="{{ asset('images/suite-five.webp') }}" alt="Suite Five" loading="lazy">
            </div>
            @endif

        </div>
    </section>

    {{-- Instagram CTA --}}
    <div class="inner-container">
        <div class="instagram-cta">
            <div class="insta-icon"><i class="ri-instagram-line"></i></div>
            <h3>Follow Us on Instagram</h3>
            <p>See daily updates, guest stories and behind-the-scenes moments from Indus Resort Murree.</p>
            <a href="https://instagram.com/indus_resort" target="_blank">@indus_resort</a>
        </div>
    </div>

</div>

{{-- Lightbox --}}
<div class="lightbox" id="lightbox" onclick="closeLightboxOnBg(event)">
    <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
    <button class="lightbox-prev" onclick="lightboxNav(-1)"><i class="ri-arrow-left-s-line"></i></button>
    <img src="" id="lightboxImg" alt="Gallery Image">
    <button class="lightbox-next" onclick="lightboxNav(1)"><i class="ri-arrow-right-s-line"></i></button>
</div>

@include('components.footer')

<script>
    let currentIndex = 0;
    let visibleImages = [];

    function getVisibleItems() {
        return Array.from(document.querySelectorAll('.gallery-item')).filter(el => el.style.display !== 'none');
    }

    function openLightbox(globalIndex) {
        const allItems = document.querySelectorAll('.gallery-item');
        const clickedSrc = allItems[globalIndex].querySelector('img').src;

        const visible = getVisibleItems();
        visibleImages = visible.map(el => el.querySelector('img').src);
        currentIndex = visibleImages.indexOf(clickedSrc);
        if (currentIndex === -1) currentIndex = 0;

        document.getElementById('lightboxImg').src = visibleImages[currentIndex];
        document.getElementById('lightbox').classList.add('open');
    }

    function closeLightbox() {
        document.getElementById('lightbox').classList.remove('open');
    }

    function closeLightboxOnBg(e) {
        if (e.target === document.getElementById('lightbox')) closeLightbox();
    }

    function lightboxNav(dir) {
        currentIndex = (currentIndex + dir + visibleImages.length) % visibleImages.length;
        document.getElementById('lightboxImg').src = visibleImages[currentIndex];
    }

    document.addEventListener('keydown', function(e) {
        if (!document.getElementById('lightbox').classList.contains('open')) return;
        if (e.key === 'ArrowRight') lightboxNav(1);
        if (e.key === 'ArrowLeft') lightboxNav(-1);
        if (e.key === 'Escape') closeLightbox();
    });

    function filterGallery(category, btn) {
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        document.querySelectorAll('.gallery-item').forEach(item => {
            item.style.display = (category === 'all' || item.dataset.category === category) ? '' : 'none';
        });
    }
</script>

</body>
</html>
