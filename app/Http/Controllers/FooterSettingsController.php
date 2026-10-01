<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Support\SiteDataStore;

class FooterSettingsController extends Controller
{
    public static function standardPlatforms(): array
    {
        return [
            // Travel & Booking Platforms
            'airbnb'      => [
                'name'        => 'Airbnb',
                'type'        => 'svg',
                'svg'         => 'airbnb',
                'color'       => '#FF385C',
                'placeholder' => 'https://www.airbnb.com/rooms/...',
                'group'       => 'booking'
            ],
            'booking'     => [
                'name'        => 'Booking.com',
                'type'        => 'svg',
                'svg'         => 'booking',
                'color'       => '#003580',
                'placeholder' => 'https://www.booking.com/hotel/...',
                'group'       => 'booking'
            ],
            'tripadvisor' => [
                'name'        => 'TripAdvisor',
                'type'        => 'svg',
                'svg'         => 'tripadvisor',
                'color'       => '#00AF87',
                'placeholder' => 'https://www.tripadvisor.com/...',
                'group'       => 'booking'
            ],
            'agoda'       => [
                'name'        => 'Agoda',
                'type'        => 'svg',
                'svg'         => 'agoda',
                'color'       => '#5863F8',
                'placeholder' => 'https://www.agoda.com/...',
                'group'       => 'booking'
            ],

            // Social Media & Messaging
            'instagram'   => [
                'name'        => 'Instagram',
                'type'        => 'icon',
                'icon'        => 'ri-instagram-line',
                'color'       => '#e1306c',
                'placeholder' => 'https://instagram.com/your-page',
                'group'       => 'social'
            ],
            'facebook'    => [
                'name'        => 'Facebook',
                'type'        => 'icon',
                'icon'        => 'ri-facebook-fill',
                'color'       => '#1877f2',
                'placeholder' => 'https://facebook.com/your-page',
                'group'       => 'social'
            ],
            'whatsapp'    => [
                'name'        => 'WhatsApp',
                'type'        => 'icon',
                'icon'        => 'ri-whatsapp-line',
                'color'       => '#25d366',
                'placeholder' => 'https://wa.me/923000000000',
                'group'       => 'social'
            ],
            'youtube'     => [
                'name'        => 'YouTube',
                'type'        => 'icon',
                'icon'        => 'ri-youtube-fill',
                'color'       => '#ff0000',
                'placeholder' => 'https://youtube.com/@your-channel',
                'group'       => 'social'
            ],
            'tiktok'      => [
                'name'        => 'TikTok',
                'type'        => 'icon',
                'icon'        => 'ri-tiktok-fill',
                'color'       => '#111111',
                'placeholder' => 'https://tiktok.com/@your-profile',
                'group'       => 'social'
            ],
            'twitter'     => [
                'name'        => 'X (Twitter)',
                'type'        => 'icon',
                'icon'        => 'ri-twitter-x-line',
                'color'       => '#000000',
                'placeholder' => 'https://x.com/your-handle',
                'group'       => 'social'
            ],
            'linkedin'    => [
                'name'        => 'LinkedIn',
                'type'        => 'icon',
                'icon'        => 'ri-linkedin-fill',
                'color'       => '#0a66c2',
                'placeholder' => 'https://linkedin.com/in/your-profile',
                'group'       => 'social'
            ],
            'pinterest'   => [
                'name'        => 'Pinterest',
                'type'        => 'icon',
                'icon'        => 'ri-pinterest-line',
                'color'       => '#bd081c',
                'placeholder' => 'https://pinterest.com/your-page',
                'group'       => 'social'
            ],
            'snapchat'    => [
                'name'        => 'Snapchat',
                'type'        => 'icon',
                'icon'        => 'ri-snapchat-fill',
                'color'       => '#e6c800',
                'placeholder' => 'https://snapchat.com/add/your-profile',
                'group'       => 'social'
            ],
            'telegram'    => [
                'name'        => 'Telegram',
                'type'        => 'icon',
                'icon'        => 'ri-telegram-fill',
                'color'       => '#229ed9',
                'placeholder' => 'https://t.me/your-channel',
                'group'       => 'social'
            ],
        ];
    }

    public function defaults(): array
    {
        return [
            'description'    => 'A serene mountain escape offering panoramic views, elegant rooms and warm Pakistani hospitality in the heart of Murree.',
            'quick_links'    => ['home', 'about', 'rooms', 'gallery', 'contact'],
            'airbnb'         => '',
            'booking'        => '',
            'tripadvisor'    => '',
            'agoda'          => '',
            'instagram'      => 'https://instagram.com',
            'facebook'       => 'https://facebook.com',
            'whatsapp'       => 'https://wa.me/923000053333',
            'youtube'        => '',
            'tiktok'         => '',
            'twitter'        => '',
            'linkedin'       => '',
            'pinterest'      => '',
            'snapchat'       => '',
            'telegram'       => '',
            'custom_socials' => [],
        ];
    }

    public static function getSocialList(array $settings): array
    {
        $list = [];
        foreach (self::standardPlatforms() as $key => $meta) {
            if (!empty($settings[$key])) {
                $list[] = [
                    'key'   => $key,
                    'name'  => $meta['name'],
                    'type'  => $meta['type'] ?? 'icon',
                    'svg'   => $meta['svg'] ?? '',
                    'icon'  => $meta['icon'] ?? '',
                    'color' => $meta['color'] ?? '',
                    'url'   => $settings[$key],
                ];
            }
        }

        if (!empty($settings['custom_socials']) && is_array($settings['custom_socials'])) {
            foreach ($settings['custom_socials'] as $custom) {
                if (!empty($custom['url'])) {
                    $list[] = [
                        'key'   => 'custom',
                        'name'  => $custom['title'] ?? 'Link',
                        'type'  => 'icon',
                        'svg'   => '',
                        'icon'  => !empty($custom['icon']) ? $custom['icon'] : 'ri-global-line',
                        'color' => '',
                        'url'   => $custom['url'],
                    ];
                }
            }
        }

        return $list;
    }

    public function settings(): array
    {
        $saved = SiteDataStore::get('footer-settings', []);
        $data = array_merge($this->defaults(), is_array($saved) ? $saved : []);
        $data['social_list'] = self::getSocialList($data);
        return $data;
    }

    public function edit()
    {
        return view('admin.footer-settings', [
            'footerSettings'    => $this->settings(),
            'standardPlatforms' => self::standardPlatforms(),
        ]);
    }

    private function cleanUrl(?string $url): string
    {
        $url = trim($url ?? '');
        if ($url === '') return '';
        if (!preg_match('~^(?:f|ht)tps?://~i', $url)) {
            $url = 'https://' . $url;
        }
        return $url;
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'description'    => ['required', 'string', 'max:500'],
            'quick_links'    => ['nullable', 'array'],
            'quick_links.*'  => ['in:home,about,rooms,gallery,contact'],
            'airbnb'         => ['nullable', 'string', 'max:250'],
            'booking'        => ['nullable', 'string', 'max:250'],
            'tripadvisor'    => ['nullable', 'string', 'max:250'],
            'agoda'          => ['nullable', 'string', 'max:250'],
            'instagram'      => ['nullable', 'string', 'max:250'],
            'facebook'       => ['nullable', 'string', 'max:250'],
            'whatsapp'       => ['nullable', 'string', 'max:250'],
            'youtube'        => ['nullable', 'string', 'max:250'],
            'tiktok'         => ['nullable', 'string', 'max:250'],
            'twitter'        => ['nullable', 'string', 'max:250'],
            'linkedin'       => ['nullable', 'string', 'max:250'],
            'pinterest'      => ['nullable', 'string', 'max:250'],
            'snapchat'       => ['nullable', 'string', 'max:250'],
            'telegram'       => ['nullable', 'string', 'max:250'],
            'custom_titles'  => ['nullable', 'array'],
            'custom_icons'   => ['nullable', 'array'],
            'custom_urls'    => ['nullable', 'array'],
        ]);

        $customSocials = [];
        if (!empty($data['custom_urls']) && is_array($data['custom_urls'])) {
            foreach ($data['custom_urls'] as $i => $rawUrl) {
                $url = $this->cleanUrl($rawUrl);
                $title = trim($data['custom_titles'][$i] ?? '');
                $icon = trim($data['custom_icons'][$i] ?? 'ri-global-line');
                if ($url !== '' && $title !== '') {
                    $customSocials[] = [
                        'title' => $title,
                        'icon'  => $icon ?: 'ri-global-line',
                        'url'   => $url,
                    ];
                }
            }
        }

        $settings = [
            'description'    => $data['description'],
            'quick_links'    => array_values(array_unique($data['quick_links'] ?? [])),
            'airbnb'         => $this->cleanUrl($data['airbnb'] ?? ''),
            'booking'        => $this->cleanUrl($data['booking'] ?? ''),
            'tripadvisor'    => $this->cleanUrl($data['tripadvisor'] ?? ''),
            'agoda'          => $this->cleanUrl($data['agoda'] ?? ''),
            'instagram'      => $this->cleanUrl($data['instagram'] ?? ''),
            'facebook'       => $this->cleanUrl($data['facebook'] ?? ''),
            'whatsapp'       => $this->cleanUrl($data['whatsapp'] ?? ''),
            'youtube'        => $this->cleanUrl($data['youtube'] ?? ''),
            'tiktok'         => $this->cleanUrl($data['tiktok'] ?? ''),
            'twitter'        => $this->cleanUrl($data['twitter'] ?? ''),
            'linkedin'       => $this->cleanUrl($data['linkedin'] ?? ''),
            'pinterest'      => $this->cleanUrl($data['pinterest'] ?? ''),
            'snapchat'       => $this->cleanUrl($data['snapchat'] ?? ''),
            'telegram'       => $this->cleanUrl($data['telegram'] ?? ''),
            'custom_socials' => $customSocials,
        ];

        SiteDataStore::put('footer-settings', $settings);

        return redirect()->route('admin.footer-settings')->with('success', 'Footer settings updated across the website.');
    }
}
