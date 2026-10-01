<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
class SeoController extends Controller
{
 public function defaults():array{return ['home'=>['title'=>'Indus Resort Murree','description'=>'Luxury mountain resort in Murree.','keywords'=>'Indus Resort, Murree hotel, mountain resort','robots'=>'index, follow'],'about'=>['title'=>'About Us - Indus Resort Murree','description'=>'Learn about Indus Resort Murree and our mountain hospitality.','keywords'=>'about Indus Resort, Murree resort','robots'=>'index, follow'],'rooms'=>['title'=>'Rooms & Suites - Indus Resort Murree','description'=>'Comfortable rooms and suites at Indus Resort Murree.','keywords'=>'rooms Murree, suites, hotel rooms','robots'=>'index, follow'],'gallery'=>['title'=>'Gallery - Indus Resort Murree','description'=>'Explore Indus Resort rooms, views and experiences.','keywords'=>'Indus Resort gallery, Murree views','robots'=>'index, follow'],'contact'=>['title'=>'Contact Us - Indus Resort Murree','description'=>'Contact Indus Resort Murree for bookings and enquiries.','keywords'=>'contact Indus Resort, Murree booking','robots'=>'index, follow']];}
 public function settings():array{$p=storage_path('app/seo.json');$s=File::exists($p)?json_decode(File::get($p),true):[];return array_replace_recursive($this->defaults(),is_array($s)?$s:[]);}
 public function edit(){return view('admin.seo-settings',['seo'=>$this->settings()]);}
 public function update(Request $r){$data=$r->validate(['pages'=>'required|array','pages.*.title'=>'required|string|max:160','pages.*.description'=>'nullable|string|max:320','pages.*.keywords'=>'nullable|string|max:300','pages.*.robots'=>['required',Rule::in(['index, follow','noindex, nofollow','index, nofollow','noindex, follow'])]]);File::put(storage_path('app/seo.json'),json_encode($data['pages'],JSON_PRETTY_PRINT));return back()->with('success','SEO settings updated successfully.');}
}
