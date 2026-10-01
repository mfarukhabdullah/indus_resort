<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class GalleryController
{
    private function defaults(): array { return array_map(function ($image) { return ['path' => 'images/'.$image, 'category' => 'all']; }, ['mountain-view-one.webp','mountain-view-two.webp','mountain-view-five.webp','suite-one.webp','lawn-access-one.webp','bedroom-balcony-Cradtk-four.webp','mountain-view-six.webp','lawn-access-two.webp','suite-two.webp','peace-full-upper.png','lawn-access-three.webp','suite-three.webp','peace-short-first.png','lawn-access-four.webp','suite-four.webp','peace-full-short-second.png','lawn-access-five.webp','suite-five.webp']); }
    public function images(): array { $path=storage_path('app/gallery.json'); $data=File::exists($path)?json_decode(File::get($path),true):null; return is_array($data) ? $data : $this->defaults(); }
    public function index() { return view('gallery',['galleryImages'=>$this->images()]); }
    public function admin() { return view('admin.gallery',['galleryImages'=>$this->images()]); }
    public function store(Request $request) { $data=$request->validate(['images'=>['required','array'],'images.*'=>['file','mimes:jpg,jpeg,png,webp','max:20480']]); $images=$this->images(); $dir=public_path('images/gallery');File::ensureDirectoryExists($dir);foreach($request->file('images') as $file){$name=basename($file->getClientOriginalName());$file->move($dir,$name);$images[]=['path'=>'images/gallery/'.$name,'category'=>'all'];}File::put(storage_path('app/gallery.json'),json_encode($images,JSON_PRETTY_PRINT));return back()->with('success','Gallery images added successfully.'); }
    public function destroy($index) { $images=$this->images(); if(array_key_exists((int)$index,$images)){array_splice($images,(int)$index,1);File::put(storage_path('app/gallery.json'),json_encode($images,JSON_PRETTY_PRINT));}return back()->with('success','Gallery image deleted successfully.'); }
    public function replace(Request $request,$index) { $request->validate(['image'=>['required','file','mimes:jpg,jpeg,png,webp','max:20480']]);$images=$this->images();if(!array_key_exists((int)$index,$images))return back();$dir=public_path('images/gallery');File::ensureDirectoryExists($dir);$file=$request->file('image');$name=basename($file->getClientOriginalName());$file->move($dir,$name);$images[(int)$index]['path']='images/gallery/'.$name;File::put(storage_path('app/gallery.json'),json_encode($images,JSON_PRETTY_PRINT));return back()->with('success','Gallery image replaced successfully.'); }
}
