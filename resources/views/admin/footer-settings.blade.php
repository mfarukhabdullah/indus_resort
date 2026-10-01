<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Footer Settings | Indus Resort</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <style>
        .footer-editor {
            max-width: 950px;
            padding: 30px;
        }
        .footer-editor h2 {
            margin: 0;
            color: #173f35;
        }
        .muted {
            color: #718096;
            margin: 4px 0 14px;
            font-size: 13px;
        }
        .footer-editor textarea {
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #d7e1dc;
            border-radius: 9px;
            padding: 13px;
            font: inherit;
            resize: vertical;
        }
        .footer-editor textarea:focus,
        .footer-editor input:focus,
        .footer-editor select:focus {
            border-color: #126a4b;
            outline: none;
            box-shadow: 0 0 0 3px rgba(18, 106, 75, 0.1);
        }
        .section-divider {
            border-top: 1px solid #e7efe9;
            margin: 26px 0 20px;
        }
        .platform-category-title {
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #126a4b;
            margin: 18px 0 8px;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .social-fields {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-bottom: 16px;
        }
        .social-card {
            display: grid;
            gap: 6px;
            background: #fbfdfc;
            border: 1px solid #e0ebe5;
            border-radius: 8px;
            padding: 10px 12px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .social-card.featured {
            background: #fff;
            border-color: #cde2d7;
            box-shadow: 0 1px 4px rgba(0,0,0,0.03);
        }
        .social-card:focus-within {
            border-color: #126a4b;
            background: #fff;
            box-shadow: 0 2px 8px rgba(18, 106, 75, 0.08);
        }
        .platform-header {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 700;
            font-size: 13px;
            color: #24433a;
        }
        .platform-header i {
            font-size: 17px;
        }
        .platform-header svg {
            width: 17px;
            height: 17px;
            display: block;
        }
        .social-card input {
            border: 1px solid #d7e1dc;
            border-radius: 6px;
            padding: 9px 10px;
            font: inherit;
            font-size: 12.5px;
            background: #fff;
            width: 100%;
            box-sizing: border-box;
        }
        .custom-socials-box {
            background: #f7faf8;
            border: 1px solid #dbe7e1;
            border-radius: 9px;
            padding: 16px 18px;
            margin: 18px 0 24px;
        }
        .custom-socials-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 12px;
        }
        .custom-socials-top b {
            color: #173f35;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .btn-add-social {
            background: #eaf6ef;
            color: #0b6e48;
            border: 1px solid #9fcbb6;
            border-radius: 6px;
            padding: 7px 14px;
            font-weight: 700;
            font-size: 12px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.2s;
        }
        .btn-add-social:hover {
            background: #126a4b;
            color: #fff;
            border-color: #126a4b;
        }
        .custom-social-row {
            display: grid;
            grid-template-columns: 190px 170px 1fr 38px;
            gap: 10px;
            align-items: center;
            margin-top: 9px;
            background: #fff;
            border: 1px solid #e1ebe5;
            border-radius: 7px;
            padding: 8px 10px;
        }
        .custom-social-row input,
        .custom-social-row select {
            border: 1px solid #d7e1dc;
            border-radius: 6px;
            padding: 8px 10px;
            font: inherit;
            font-size: 12.5px;
            background: #fff;
            box-sizing: border-box;
            width: 100%;
        }
        .btn-remove-social {
            height: 36px;
            width: 36px;
            border: 1px solid #f0bcbc;
            background: #fff4f4;
            color: #a42531;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            transition: all 0.2s;
        }
        .btn-remove-social:hover {
            background: #a42531;
            color: #fff;
        }
        .quick-options {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-top: 14px;
        }
        .quick-options input {
            display: none;
        }
        .quick-options span {
            display: block;
            border: 1px solid #d7e1dc;
            border-radius: 8px;
            padding: 13px;
            font-weight: 700;
            color: #24433a;
            cursor: pointer;
            transition: all 0.2s;
        }
        .quick-options input:checked + span {
            background: #eaf6ef;
            border-color: #62b48e;
            color: #0b6e48;
        }
        .quick-options i {
            display: none;
            margin-right: 7px;
        }
        .quick-options input:checked + span i {
            display: inline;
        }
        .save-footer {
            margin-top: 25px;
            border: 0;
            border-radius: 8px;
            background: #126a4b;
            color: white;
            padding: 13px 22px;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            transition: background 0.2s;
        }
        .save-footer:hover {
            background: #0d4d36;
        }
        .notice {
            padding: 12px;
            background: #eaf6ef;
            color: #0b6e48;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        @media (max-width: 600px) {
            .quick-options,
            .social-fields,
            .custom-social-row {
                grid-template-columns: 1fr;
            }
            .btn-remove-social {
                width: 100%;
            }
        }
    </style>
</head>
<body>
<div class="admin-shell">
    @include('admin.partials.sidebar')

    <main class="content">
        @include('admin.partials.topbar', ['hideSearch' => true])

        <div class="page-title">
            <a href="{{ route('admin.login') }}"><i class="ri-arrow-left-line"></i> Back to Dashboard</a>
            <h1>Footer Settings</h1>
            <p>Manage the text, social &amp; travel booking links, and quick navigation shown in the website footer.</p>
        </div>

        <section class="panel footer-editor">
            <h2><i class="ri-layout-bottom-line"></i> Footer Content</h2>
            <p class="muted">Choose exactly what visitors see in the website footer.</p>

            @if(session('success'))
                <p class="notice"><i class="ri-checkbox-circle-line"></i> {{ session('success') }}</p>
            @endif

            <form method="POST" action="{{ route('admin.footer-settings.update') }}">
                @csrf

                <label>
                    <b style="color:#173f35">Footer Description</b>
                    <p class="muted">This text appears directly below the resort logo in the footer.</p>
                    <textarea name="description" rows="4" required>{{ old('description', $footerSettings['description']) }}</textarea>
                </label>

                <div class="section-divider"></div>

                <h3 style="color:#173f35;margin:0"><i class="ri-share-forward-line"></i> Social &amp; Booking Platforms</h3>
                <p class="muted">Paste your profile link for any platform you want to display. <strong>Only platforms with a link entered will show their official icon on the website footer.</strong> Leave any empty to hide.</p>

                <!-- Travel & Booking Channels Section -->
                <div class="platform-category-title">
                    <i class="ri-hotel-bed-line"></i> Hotel Booking &amp; Travel Channels
                </div>
                <div class="social-fields">
                    <!-- Airbnb -->
                    <div class="social-card featured">
                        <span class="platform-header">
                            <svg viewBox="0 0 24 24" fill="#FF385C"><path d="M12.001 18.275c-1.353-1.697-2.148-3.184-2.413-4.457-.263-1.027-.16-1.848.291-2.465.477-.71 1.188-1.056 2.121-1.056s1.643.345 2.12 1.063c.446.61.558 1.432.286 2.465-.291 1.298-1.085 2.785-2.412 4.458zm9.601 1.14c-.185 1.246-1.034 2.28-2.2 2.783-2.253.98-4.483-.583-6.392-2.704 3.157-3.951 3.74-7.028 2.385-9.018-.795-1.14-1.933-1.695-3.394-1.695-2.944 0-4.563 2.49-3.927 5.382.37 1.565 1.352 3.343 2.917 5.332-.98 1.085-1.91 1.856-2.732 2.333-.636.344-1.245.558-1.828.609-2.679.399-4.778-2.2-3.825-4.88.132-.345.395-.98.845-1.961l.025-.053c1.464-3.178 3.242-6.79 5.285-10.795l.053-.132.58-1.116c.45-.822.635-1.19 1.351-1.643.346-.21.77-.315 1.222-.315.426 0 .85.105 1.218.315.717.453.902.821 1.353 1.643l.582 1.116.053.132c2.043 4.005 3.82 7.617 5.284 10.795l.026.053c.45.98.713 1.616.845 1.961.953 2.68-1.146 5.279-3.825 4.88-.583-.051-1.192-.265-1.828-.609-.822-.477-1.752-1.248-2.732-2.333 1.565-1.989 2.547-3.767 2.917-5.332.636-2.892-.983-5.382-3.927-5.382-1.461 0-2.599.555-3.394 1.695-1.355 1.99-.772 5.067 2.385 9.018-1.909 2.121-4.139 3.684-6.392 2.704-1.166-.503-2.015-1.537-2.2-2.783z"/></svg>
                            Airbnb
                        </span>
                        <input type="text" name="airbnb" placeholder="https://www.airbnb.com/rooms/..." value="{{ old('airbnb', $footerSettings['airbnb'] ?? '') }}">
                    </div>

                    <!-- Booking.com -->
                    <div class="social-card featured">
                        <span class="platform-header">
                            <svg viewBox="0 0 24 24" fill="#003580"><path d="M3 4h7.8c3 0 4.9 1.5 4.9 3.8 0 1.7-1 2.9-2.6 3.4 2 .5 3.3 1.9 3.3 3.9 0 2.6-2.1 4.5-5.3 4.5H3V4zm3.8 3.3v3h3.5c1.2 0 1.9-.6 1.9-1.5s-.7-1.5-1.9-1.5H6.8zm0 5.8v3.4h3.9c1.4 0 2.2-.7 2.2-1.7 0-1-.8-1.7-2.2-1.7H6.8zm12.4 3.7a1.8 1.8 0 110 3.6 1.8 1.8 0 010-3.6z"/></svg>
                            Booking.com
                        </span>
                        <input type="text" name="booking" placeholder="https://www.booking.com/hotel/..." value="{{ old('booking', $footerSettings['booking'] ?? '') }}">
                    </div>

                    <!-- TripAdvisor -->
                    <div class="social-card featured">
                        <span class="platform-header">
                            <svg viewBox="0 0 24 24" fill="#00AF87"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-5.5 13c-1.38 0-2.5-1.12-2.5-2.5S5.12 10 6.5 10s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5zm5.5-5c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm5.5 5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            TripAdvisor
                        </span>
                        <input type="text" name="tripadvisor" placeholder="https://www.tripadvisor.com/..." value="{{ old('tripadvisor', $footerSettings['tripadvisor'] ?? '') }}">
                    </div>

                    <!-- Agoda -->
                    <div class="social-card featured">
                        <span class="platform-header">
                            <svg viewBox="0 0 24 24" fill="#5863F8"><circle cx="4" cy="12" r="2.5"/><circle cx="12" cy="6" r="2.5"/><circle cx="20" cy="12" r="2.5"/><circle cx="8" cy="18" r="2.5"/><circle cx="16" cy="18" r="2.5"/></svg>
                            Agoda
                        </span>
                        <input type="text" name="agoda" placeholder="https://www.agoda.com/..." value="{{ old('agoda', $footerSettings['agoda'] ?? '') }}">
                    </div>
                </div>

                <!-- Social Media & Messaging Channels Section -->
                <div class="platform-category-title" style="margin-top:22px">
                    <i class="ri-chat-1-line"></i> Social Media &amp; Messaging Platforms
                </div>
                <div class="social-fields">
                    @foreach($standardPlatforms as $key => $platform)
                        @if(($platform['group'] ?? '') === 'social')
                            <div class="social-card">
                                <span class="platform-header">
                                    <i class="{{ $platform['icon'] }}" style="color: {{ $platform['color'] }}"></i>
                                    {{ $platform['name'] }}
                                </span>
                                <input type="text"
                                       name="{{ $key }}"
                                       placeholder="{{ $platform['placeholder'] }}"
                                       value="{{ old($key, $footerSettings[$key] ?? '') }}">
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Custom / Additional Social Links -->
                <div class="custom-socials-box">
                    <div class="custom-socials-top">
                        <div>
                            <b><i class="ri-add-circle-line"></i> Additional Custom Platforms</b>
                            <p class="muted" style="margin:2px 0 0;font-size:12px">Need Threads, Google Reviews, Booking agent or any custom page? Add them here.</p>
                        </div>
                        <button type="button" class="btn-add-social" onclick="addCustomSocial()">
                            <i class="ri-add-line"></i> Add Other Platform
                        </button>
                    </div>

                    <div id="customSocialsList">
                        @php($customList = old('custom_urls') ? array_map(null, old('custom_titles', []), old('custom_icons', []), old('custom_urls', [])) : ($footerSettings['custom_socials'] ?? []))
                        @if(!empty($customList))
                            @foreach($customList as $c)
                                @php($cTitle = is_array($c) ? ($c['title'] ?? ($c[0] ?? '')) : '')
                                @php($cIcon = is_array($c) ? ($c['icon'] ?? ($c[1] ?? 'ri-global-line')) : 'ri-global-line')
                                @php($cUrl = is_array($c) ? ($c['url'] ?? ($c[2] ?? '')) : '')
                                @if(!empty($cTitle) || !empty($cUrl))
                                    <div class="custom-social-row">
                                        <input type="text" name="custom_titles[]" placeholder="Platform Name (e.g. Threads)" value="{{ $cTitle }}" required>
                                        <select name="custom_icons[]">
                                            @foreach([
                                                'ri-global-line' => 'Globe / Website',
                                                'ri-hotel-bed-line' => 'Hotel / Bed',
                                                'ri-threads-line' => 'Threads',
                                                'ri-google-fill' => 'Google / Reviews',
                                                'ri-star-line' => 'Ratings / Review',
                                                'ri-map-pin-2-line' => 'Map / Location',
                                                'ri-reddit-line' => 'Reddit',
                                                'ri-mail-line' => 'Email',
                                                'ri-phone-fill' => 'Phone / Call'
                                            ] as $iClass => $iName)
                                                <option value="{{ $iClass }}" {{ $cIcon === $iClass ? 'selected' : '' }}>{{ $iName }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" name="custom_urls[]" placeholder="https://..." value="{{ $cUrl }}" required>
                                        <button type="button" class="btn-remove-social" title="Remove" onclick="this.closest('.custom-social-row').remove()">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="section-divider"></div>

                <h3 style="color:#173f35;margin:0"><i class="ri-links-line"></i> Quick Links</h3>
                <p class="muted">Tick the pages you want to show in the footer navigation column.</p>
                <div class="quick-options">
                    @foreach(['home'=>'Home','about'=>'About','rooms'=>'Rooms & Suites','gallery'=>'Gallery','contact'=>'Contact Us'] as $key=>$label)
                        <label>
                            <input type="checkbox" name="quick_links[]" value="{{ $key }}" {{ in_array($key, old('quick_links', $footerSettings['quick_links'])) ? 'checked' : '' }}>
                            <span><i class="ri-check-line"></i>{{ $label }}</span>
                        </label>
                    @endforeach
                </div>

                <button class="save-footer" type="submit">
                    <i class="ri-save-line"></i> Save Footer Settings
                </button>
            </form>
        </section>
    </main>
</div>

<script>
    const sidebar = document.getElementById('sidebar');
    document.querySelector('.menu-toggle').onclick = () => sidebar.classList.add('open');
    document.querySelector('.sidebar-close').onclick = () => sidebar.classList.remove('open');

    function addCustomSocial() {
        const container = document.getElementById('customSocialsList');
        const row = document.createElement('div');
        row.className = 'custom-social-row';
        row.innerHTML = `
            <input type="text" name="custom_titles[]" placeholder="Platform Name (e.g. Threads)" required>
            <select name="custom_icons[]">
                <option value="ri-global-line">Globe / Website</option>
                <option value="ri-hotel-bed-line">Hotel / Bed</option>
                <option value="ri-threads-line">Threads</option>
                <option value="ri-google-fill">Google / Reviews</option>
                <option value="ri-star-line">Ratings / Review</option>
                <option value="ri-map-pin-2-line">Map / Location</option>
                <option value="ri-reddit-line">Reddit</option>
                <option value="ri-mail-line">Email</option>
                <option value="ri-phone-fill">Phone / Call</option>
            </select>
            <input type="text" name="custom_urls[]" placeholder="https://..." required>
            <button type="button" class="btn-remove-social" title="Remove" onclick="this.closest('.custom-social-row').remove()">
                <i class="ri-delete-bin-line"></i>
            </button>
        `;
        container.appendChild(row);
        row.querySelector('input').focus();
    }
</script>
</body>
</html>
