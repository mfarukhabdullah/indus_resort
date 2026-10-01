<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRememberTokenToAdminCredentialsTable extends Migration
{
    public function up()
    {
        Schema::table('admin_credentials', function (Blueprint $table) {
            $table->string('remember_token', 128)->nullable()->after('password');
        });
    }

    public function down()
    {
        Schema::table('admin_credentials', function (Blueprint $table) {
            $table->dropColumn('remember_token');
        });
    }
}
