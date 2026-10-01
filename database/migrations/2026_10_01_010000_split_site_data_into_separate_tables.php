<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SplitSiteDataIntoSeparateTables extends Migration
{
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('position')->default(0);
            $table->string('title');
            $table->text('description');
            $table->string('price', 100);
            $table->string('rating', 20)->nullable();
            $table->unsignedInteger('bedrooms')->default(1);
            $table->unsignedInteger('persons')->default(1);
            $table->string('kitchen', 20)->default('no');
            $table->longText('features');
            $table->longText('images');
            $table->timestamps();
        });

        Schema::create('gallery_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('position')->default(0);
            $table->string('path', 500);
            $table->string('category', 100)->default('all');
            $table->timestamps();
        });

        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('message_id')->unique();
            $table->string('name', 120);
            $table->string('phone', 50);
            $table->string('email', 150);
            $table->string('subject', 150);
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->string('submitted_at', 50)->nullable();
            $table->unsignedInteger('position')->default(0);
            $table->timestamps();
        });

        foreach (['home_settings', 'contact_settings', 'footer_settings', 'seo_settings'] as $tableName) {
            Schema::create($tableName, function (Blueprint $table) {
                $table->id();
                $table->longText('data');
                $table->timestamps();
            });
        }

        Schema::create('admin_credentials', function (Blueprint $table) {
            $table->id();
            $table->string('email', 150);
            $table->string('password');
            $table->timestamps();
        });

        $this->copyExistingData();
    }

    private function legacy(string $key, $default = [])
    {
        $json = DB::table('site_data')->where('key', $key)->value('data');
        $decoded = $json === null ? null : json_decode($json, true);

        return is_array($decoded) ? $decoded : $default;
    }

    private function copyExistingData(): void
    {
        $now = now();

        foreach ($this->legacy('rooms') as $position => $room) {
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

        foreach ($this->legacy('gallery') as $position => $image) {
            DB::table('gallery_images')->insert([
                'position' => $position,
                'path' => $image['path'] ?? '',
                'category' => $image['category'] ?? 'all',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        foreach ($this->legacy('messages') as $position => $message) {
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

        $settings = [
            'home_settings' => 'home-settings',
            'contact_settings' => 'contact-settings',
            'footer_settings' => 'footer-settings',
            'seo_settings' => 'seo',
        ];

        foreach ($settings as $table => $key) {
            DB::table($table)->insert([
                'id' => 1,
                'data' => json_encode($this->legacy($key), JSON_PRETTY_PRINT),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        $admin = $this->legacy('admin-auth');
        DB::table('admin_credentials')->insert([
            'id' => 1,
            'email' => $admin['email'] ?? 'admin@indusresort.com',
            'password' => $admin['password'] ?? '',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('admin_credentials');
        Schema::dropIfExists('seo_settings');
        Schema::dropIfExists('footer_settings');
        Schema::dropIfExists('contact_settings');
        Schema::dropIfExists('home_settings');
        Schema::dropIfExists('contact_messages');
        Schema::dropIfExists('gallery_images');
        Schema::dropIfExists('rooms');
    }
}
