<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Support\SiteDataStore;
class MessageController extends Controller
{
    public function messages(): array { $data=SiteDataStore::get('messages',[]); return is_array($data)?$data:[]; }
    public function store(Request $request) { $data=$request->validate(['name'=>['required','string','max:120','regex:/^[\pL\s.\-]+$/u'],'phone'=>['required','string','max:50','regex:/^[0-9+()\-\s]+$/'],'email'=>['required','email','max:150'],'subject'=>['required','string','max:150'],'message'=>['required','string','max:2000']]); $data['id']=uniqid('msg_');$data['created_at']=now()->format('Y-m-d H:i:s');$data['read']=false;$messages=$this->messages();array_unshift($messages,$data);SiteDataStore::put('messages',$messages);return back()->with('success','Thank you! Your message has been sent successfully.'); }
    public function admin() { $messages=$this->messages(); return view('admin.messages',compact('messages')); }
    public function destroy($id) { $messages=array_values(array_filter($this->messages(), function ($message) use ($id) { return ($message['id'] ?? '') !== $id; })); SiteDataStore::put('messages',$messages); return back()->with('success', 'Message deleted successfully.'); }
}
