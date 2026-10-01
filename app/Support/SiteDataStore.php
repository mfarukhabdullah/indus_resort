<?php

namespace App\Support;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SiteDataStore
{
    public static function get(string $key, $default = [])
    {
        if (Schema::hasTable('rooms')) {
            $separate = self::getFromSeparateTable($key);

            if ($separate !== null) {
                return $separate;
            }
        }

        return self::getLegacy($key, $default);
    }

    private static function getLegacy(string $key, $default = [])
    {
        $row = DB::table('site_data')->where('key', $key)->value('data');

        if ($row === null) {
            return $default;
        }

        $decoded = json_decode($row, true);

        return is_array($decoded) ? $decoded : $default;
    }

    public static function put(string $key, $data): void
    {
        DB::transaction(function () use ($key, $data) {
            if (Schema::hasTable('rooms')) {
                self::putInSeparateTable($key, $data);
            }

            self::putLegacy($key, $data);
        });
    }

    private static function putLegacy(string $key, $data): void
    {
        $now = now();
        $payload = [
            'data' => json_encode($data, JSON_PRETTY_PRINT),
            'updated_at' => $now,
        ];

        $query = DB::table('site_data')->where('key', $key);

        if ($query->exists()) {
            $query->update($payload);
            return;
        }

        DB::table('site_data')->insert(array_merge([
            'key' => $key,
            'created_at' => $now,
        ], $payload));
    }

    private static function settingsTable(string $key): ?string
    {
        $tables = [
            'home-settings' => 'home_settings',
            'contact-settings' => 'contact_settings',
            'footer-settings' => 'footer_settings',
            'seo' => 'seo_settings',
        ];

        return $tables[$key] ?? null;
    }

    private static function getFromSeparateTable(string $key)
    {
        if ($key === 'rooms') {
            return DB::table('rooms')->orderBy('position')->orderBy('id')->get()->map(function ($room) {
                return [
                    'title' => $room->title,
                    'description' => $room->description,
                    'price' => $room->price,
                    'rating' => $room->rating,
                    'bedrooms' => (string) $room->bedrooms,
                    'persons' => (string) $room->persons,
                    'kitchen' => $room->kitchen,
                    'features' => json_decode($room->features, true) ?: [],
                    'images' => json_decode($room->images, true) ?: [],
                ];
            })->all();
        }

        if ($key === 'gallery') {
            return DB::table('gallery_images')->orderBy('position')->orderBy('id')->get()->map(function ($image) {
                return ['path' => $image->path, 'category' => $image->category];
            })->all();
        }

        if ($key === 'messages') {
            return DB::table('contact_messages')->orderBy('position')->orderBy('id')->get()->map(function ($message) {
                return [
                    'id' => $message->message_id,
                    'name' => $message->name,
                    'phone' => $message->phone,
                    'email' => $message->email,
                    'subject' => $message->subject,
                    'message' => $message->message,
                    'read' => (bool) $message->is_read,
                    'created_at' => $message->submitted_at,
                ];
            })->all();
        }

        if ($key === 'admin-auth') {
            $admin = DB::table('admin_credentials')->first();
            return $admin ? ['email' => $admin->email, 'password' => $admin->password] : [];
        }

        $table = self::settingsTable($key);
        if ($table) {
            $json = DB::table($table)->where('id', 1)->value('data');
            return $json === null ? [] : (json_decode($json, true) ?: []);
        }

        return null;
    }

    private static function putInSeparateTable(string $key, $data): void
    {
        $now = now();

        if ($key === 'rooms') {
            DB::table('rooms')->delete();
            foreach ($data as $position => $room) {
                DB::table('rooms')->insert([
                    'position' => $position,
                    'title' => $room['title'] ?? '',
                    'description' => $room['description'] ?? '',
                    'price' => $room['price'] ?? '',
                    'rating' => $room['rating'] ?? null,
                    'bedrooms' => max(1, (int) ($room['bedrooms'] ?? 1)),
                    'persons' => max(1, (int) ($room['persons'] ?? 1)),
                    'kitchen' => $room['kitchen'] ?? 'no',
                    'features' => json_encode($room['features'] ?? []),
                    'images' => json_encode($room['images'] ?? []),
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
            return;
        }

        if ($key === 'gallery') {
            DB::table('gallery_images')->delete();
            foreach ($data as $position => $image) {
                DB::table('gallery_images')->insert([
                    'position' => $position,
                    'path' => $image['path'] ?? '',
                    'category' => $image['category'] ?? 'all',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
            return;
        }

        if ($key === 'messages') {
            DB::table('contact_messages')->delete();
            foreach ($data as $position => $message) {
                DB::table('contact_messages')->insert([
                    'message_id' => $message['id'] ?? uniqid('msg_'),
                    'name' => $message['name'] ?? '',
                    'phone' => $message['phone'] ?? '',
                    'email' => $message['email'] ?? '',
                    'subject' => $message['subject'] ?? '',
                    'message' => $message['message'] ?? '',
                    'is_read' => !empty($message['read']),
                    'submitted_at' => $message['created_at'] ?? null,
                    'position' => $position,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
            return;
        }

        if ($key === 'admin-auth') {
            DB::table('admin_credentials')->updateOrInsert(['id' => 1], [
                'email' => $data['email'] ?? '',
                'password' => $data['password'] ?? '',
                'updated_at' => $now,
                'created_at' => $now,
            ]);
            return;
        }

        $table = self::settingsTable($key);
        if ($table) {
            DB::table($table)->updateOrInsert(['id' => 1], [
                'data' => json_encode($data, JSON_PRETTY_PRINT),
                'updated_at' => $now,
                'created_at' => $now,
            ]);
        }
    }
}
