<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
class CreateSiteDataTable extends Migration
{
 public function up(){Schema::create('site_data',function(Blueprint $table){$table->id();$table->string('key')->unique();$table->longText('data');$table->timestamps();});foreach(['rooms','gallery','messages','home-settings','contact-settings','footer-settings','seo','admin-auth'] as $key){$path=storage_path('app/'.$key.'.json');if(File::exists($path)){DB::table('site_data')->insert(['key'=>$key,'data'=>File::get($path),'created_at'=>now(),'updated_at'=>now()]);}}}
 public function down(){Schema::dropIfExists('site_data');}
}
