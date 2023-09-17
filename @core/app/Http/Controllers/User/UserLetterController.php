<?php

namespace App\Http\Controllers\User;

use App\Events;
use App\EventsCategory;
use App\Letters;
use App\LettersTemp;
use App\LettersCategory;
use App\Http\Controllers\Controller;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\BasicMail;
use Illuminate\Support\Str;

class UserLetterController extends Controller
{
    public const BASE_PATH = 'frontend.user.dashboard.';
  
    public function __construct(){
        $this->middleware('auth');
    }
  
    public function all_letter(){
        $auth_id = auth()->guard('web')->user()->id;
        $all_letters = Letters::where('user_id', $auth_id)->get();
        return view(self::BASE_PATH.'letter.all-letter')->with(['all_letters' => $all_letters]);
    }
  
    public function new_letter(){
        $all_temp = lettersTemp::where(['status' => 'publish'])->get();
        $all_letters = letters::where(['user_id'=> Auth::guard('web')->id()]);
        $all_categories = EventsCategory::where(['status' => 'publish'])->get();
        return view(self::BASE_PATH.'letter.new-letter')->with(['all_categories' => $all_categories, 'all_temp'=>$all_temp]);
    }
  
    public function store_letter(Request $request){
        $this->validate($request,[
            'title' => 'nullable|string|max:191',
            'letter_temp_id' => 'nullable|max:191',
            'letter_target' => 'nullable|string',
            'letter_no' => 'nullable|string',
            'letter_opening' => 'nullable|string',
            'letter_content' => 'nullable|string',
            'letter_closing' => 'nullable|string',
            'organizer' => 'nullable|string',
            'organizer_email' => 'nullable|string',
            'organizer_website' => 'nullable|string',
            'organizer_phone' => 'nullable|string',
            'venue' => 'nullable|string',
            'venue_location' => 'nullable|string',
            'venue_phone' => 'nullable|string',
            'time' => 'nullable|string',
            'image' => 'nullable|string',
            'date' => 'nullable|string',
            'date_end' => 'nullable|string',
            'cost' => 'nullable|string',
            'available_tickets' => 'nullable|string',
            'slug' => 'nullable|string',
            'meta_title' => 'nullable|string',
        ]);


        $slug = !empty($request->slug) ? Str::slug($request->slug ) : Str::slug($request->title);
        $slug_check = letters::where(['slug' => $slug])->count();
        $letter_slug = $slug_check < 1 ? $slug.'-2' : $slug;

       $letter_id =  letters::create([
            'title' => $request->event_name,
            'name' => $request->title, 
            'opener' => $request->letter_opening,
            'slug' => $letter_slug,
            'content' => $request->event_content,
            'category_id' => $request->category_event_id,
            'temp_id' => $request->category_letter_id,
            'letter_no'=> $request->letter_no,
            'target' => $request->letter_target,
            'lesson_title' =>$request->lesson_materi,
            'letter_opening' =>$request->letter_opening,
            'letter_closing' =>$request->letter_closing,
            'status' => $request->status,
            'date' => $request->date,
            'date_end' => $request->date_end,
            'time' => $request->time,
            'cost' => $request->cost,
            'available_tickets' => $request->available_tickets,
            'image' => $request->image,
            'organizer' => $request->organizer,
            'organizer_email' => $request->organizer_email,
            'organizer_website' => $request->organizer_website,
            'organizer_phone' => $request->organizer_phone,
            'venue' => $request->venue,
            'venue_location' => $request->venue_location,
            'venue_phone' => $request->venue_phone,
            'meta_tags' => $request->meta_tags,
            'meta_description' => $request->meta_description,
            'meta_title' => $request->meta_title,
            'user_id' => Auth::guard('web')->user()->id,
        ]);

       if(!empty($letter_id)){
           Notification::create([
               'user_letter_id'=>$letter_id->id,
               'title'=> __('Permintaan Verifikasi Surat Baru'),
               'type'=> __('user_letter'),
           ]);

       }

      
      	$msg = __('notify to admin');
        $admin_email = get_static_option('site_global_email');
        $message = __('Hello').'<br>';
        $message .= '<p>'.__('Surat baru telah dibuat oleh');
        $message .= ' '.optional(auth()->guard('web')->user())->name;
        $message .= ' '.__('Segera verifikasi, di dashboard admin.').'</p>';
        try {
            Mail::to($admin_email)->send(new BasicMail([
                'subject' => __('surat baru dikirimkan oleh anggota'),
                'message' => $message
            ]));
        }catch (\Exception $e){
            $msg = __('notify to admin gagal');
        }

      

        return redirect()->route('user.letter.new')->with(['msg' => __('Surat Baru Berhasil Dibuat, Menunggu persetujuan admin').' '.$msg,'type' => 'success']);
    }
        public function download_letter ($id){

        $letters = Letters::find($id);
        return view('frontend.user.dashboard.letter.download-letter')->with([
            '$letters' => $letters]);
    }
  
    public function edit_letter($id){
        $letter = letters::findOrfail($id);
        $all_temp = lettersTemp::where(['status' => 'publish'])->get();
        $all_categories = EventsCategory::where(['status' => 'publish'])->get();
        return view(self::BASE_PATH.'letter.edit-letter')->with([
            'all_categories' => $all_categories,
            'all_temp' => $all_temp,
            'letter' => $letter
        ]);
    }

    public function update_letter(Request $request){
        $this->validate($request,[
            'title' => 'required|string',
            'slug' => 'nullable|string',
            'cause_content' => 'required|string',
            'amount' => 'required|string',
            'status' => 'nullable|string',
            'image' => 'nullable|string',
            'meta_tags' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'deadline' => 'nullable|string',
            'excerpt' => 'nullable|string',
            'categories_id' => 'required|string',
        ],
            [
                'title.required' => __('title is required'),
                'cause_content.required' => __('donation content is required'),
                'amount.required' => __('amount is required'),
                'status.required' => __('status is required'),
                'categories_id.required' => __('category is required'),
            ]);
        $faq_item = $request->faq ?? ['title' => ['']];

        $slug = !empty($request->slug) ? Str::slug($request->slug) : Str::slug($request->title);
        $slug_check = Cause::where(['slug' => $slug])->count();
        $cause_slug = $slug_check > 1 ? $slug.'-3' : $slug;

        $cause = Cause::findOrFail($request->donation_id);
        $cause->gift()->detach();
        $cause->gift()->attach($request->gifts);

        Cause::findOrFail($request->donation_id)->update([
            'title' => $request->title,
            'slug' => $cause_slug,
            'cause_content' => $request->cause_content,
            'amount' => $request->amount,
            'image' => $request->image,
            'meta_tags' => $request->meta_tags,
            'meta_description' => $request->meta_description,
            'deadline' => $request->deadline,
            'image_gallery' => $request->image_gallery,
            'medical_document' => $request->medical_document,
            'faq' => serialize($faq_item),
            'meta_title' => $request->meta_title,
            'excerpt' => $request->excerpt,
            'categories_id' => $request->categories_id,
            'og_meta_title' => $request->og_meta_title,
            'og_meta_description' => $request->og_meta_description,
            'og_meta_image' => $request->og_meta_image,
            'gift_status' => $request->gift_status,
        ]);

        return redirect()->back()->with(['msg' => __('Campaign Updated...'),'type' => 'success']);
    }

    public function delete_letter(Request $request,$id){
        Letters::where(['user_id' => auth()->guard('web')->user()->id,'id' => $id])->delete();
        return redirect()->back()->with(['msg' => __('Surat Berhasil Dihapus...'),'type' => 'danger']);
    }

}
