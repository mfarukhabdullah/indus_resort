@php
    $title = $title ?? 'The Story of Indus Resort';
    $subtitle = $subtitle ?? 'Discover the passion and people behind Murree\'s most cherished mountain <br> retreat';
    $image = $image ?? 'images/About-Us-banner.webp';

    $bgImage = (str_starts_with($image, 'http://') || str_starts_with($image, 'https://')) 
        ? $image 
        : asset($image);
@endphp

<section class="about-hero page-hero" style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.24) 50%, rgba(52, 65, 60, 0.85) 100%), url('{{ $bgImage }}');">
    <div class="inner-container">
        <div class="about-hero-content page-hero-content">
            <h1>{!! $title !!}</h1>
            @if(!empty($subtitle))
                <p>{!! $subtitle !!}</p>
            @endif
        </div>
    </div>
</section>
