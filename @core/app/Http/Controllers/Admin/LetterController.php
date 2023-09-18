<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Letters;
use App\LettersTemp;
use App\LettersCategory;
use App\Events;
use App\EventsCategory;
use App\Helpers\DataTableHelpers\General;
use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use App\Language;
use App\Mail\BasicMail;
use App\Mail\OrderReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class LetterController extends Controller
{
    private const BASE_PATH = 'backend.letter.';
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:letter-list|letter-create|letter-edit|letter-delete',['only' => ['all_letters']]);
        $this->middleware('permission:letter-create',['only' => ['new_letter','store_letter']]);
        $this->middleware('permission:letter-edit',['only' => ['edit_letter','update_letter','clone_letter']]);
        $this->middleware('permission:letter-delete',['only' => ['delete_letter','bulk_action']]);

        /* letter temp permission */
        $this->middleware('permission:letter-temp-list|letter-temp-create|letter-temp-edit|letter-temp-delete',['only' => ['letter_temp_logs','letter_temp_view']]);
        $this->middleware('permission:letter-temp-edit',['only' => ['update_letter_temp_logs_status']]);
        $this->middleware('permission:letter-temp-delete',['only' => ['delete_letter_temp_logs','temp_logs_bulk_action']]);
        

    }
      public function all_letters_temp(){
        $all_letters_temp = LettersTemp::latest()->get();
        return view(self::BASE_PATH.'all-letter-temp')->with(['all_letters_temp' => $all_letters_temp]);
    }

    public function new_letter_temp(){
        $all_categories = lettersTemp::where(['status' => 'publish'])->get();
        return view(self::BASE_PATH.'new-letter-temp')->with(['all_categories' => $all_categories]);
    }
        public function store_letter_temp(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'opener' => 'string',
            'closing' => 'string',
            'image' => 'nullable|string',
            'status' => 'required|string',
        ]);

        lettersTemp::create([
            'name' => $request->name,
            'opener' => $request->opening_content,
            'closing' => $request->closing_content,
            'status' => $request->status,
            'image' => $request->image,
        ]);

        return redirect()->back()->with(['msg' => __('New letter Template Created Success...'),'type'=>'success']);
    }

    public function edit_letter_temp($id){
        $letter = lettersTemp::findOrfail($id);
        $letter_temp = lettersTemp::where(['status' => 'publish'])->get();
        return view(self::BASE_PATH.'edit-letter-temp')->with(['letter_temp' => $letter_temp,'letter' => $letter]);
    }

    public function delete_letter_temp(Request $request,$id){
        letters::findOrFail($id)->delete();
        return redirect()->back()->with(['msg' => __('letter Delete Success...'),'type'=>'danger']);
    }

    public function update_letter_temp(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'opener' => 'string',
            'closing' => 'string',
            'image' => 'nullable|string',
            'status' => 'required|string',
        ]);



        lettersTemp::findOrfail($request->letter_id)->update([
           'name' => $request->name,
            'opener' => $request->opening_content,
            'closing' => $request->closing_content,
            'status' => $request->status,
            'image' => $request->image,
        ]);

        return redirect()->back()->with(['msg' => __('letter Update Success...'),'type'=>'success']);
    }




    public function all_letters(){
        $all_letters = letters::latest()->get();
        return view(self::BASE_PATH.'all-letter')->with(['all_letters' => $all_letters]);
    }

    public function new_letter(){
        $all_temp = lettersTemp::where(['status' => 'publish'])->get();
        $all_categories = EventsCategory::where(['status' => 'publish'])->get();
        return view(self::BASE_PATH.'new-letter')->with(['all_temp' => $all_temp, 'all_categories' => $all_categories]);
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
        $all_temp = lettersTemp::where(['id' => $request->letter_temp_id])->get();
        letters::create([
            'name' => $request->title,
            'opener' => $request->letter_opening,
             'title' => $request->event_name,
            'slug' => $letter_slug,
            'content' => $request->letter_content,
            'category_id' => $request->category_id,
            'temp_id' => $request->category_letter_id,
            'user_id' => Auth::guard('web')->admins()->id,
            'letter_no'=> $request->letter_no,
            'target' => $request->letter_target,
            'lesson_title' =>$request->lesson_materi,
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
        ]);

        return redirect()->back()->with(['msg' => __('New letter Created Success...'),'type'=>'success']);
    }


    public function edit_letter($id){
        $letter = letters::findOrfail($id);
        $all_temp = lettersTemp::where(['status' => 'publish'])->get();
        $all_categories = EventCategory::where(['status' => 'publish'])->get();
        return view(self::BASE_PATH.'edit-letter')->with(['all_categories' => $all_categories,'all_temp' => $all_temp,'letter' => $letter]);
    }
     public function download_letter($id){
        $letter = letters::findOrfail($id);
        $all_temp = lettersTemp::where(['status' => 'publish'])->get();
        $all_categories = EventsCategory::where(['status' => 'publish'])->get();
        return view(self::BASE_PATH.'download-letter')->with(['all_categories' => $all_categories,'all_temp' => $all_temp,'letter' => $letter]);
    }
     public function detail_letter($id){
        $letter = Letters::findOrfail($id);
        $lettertemp = LettersTemp::where(['id' => '$letter->temp_id'])->get();
        return view(self::BASE_PATH.'detail-letter')->with(['letter' => $letter, 'lettertemp'=>$lettertemp]);
    }

    public function delete_letter(Request $request,$id){
        letters::findOrFail($id)->delete();
        return redirect()->back()->with(['msg' => __('letter Delete Success...'),'type'=>'danger']);
    }

    public function letter_approve(Request $request, $id){
    $data = Letters::findOrFail($id);
    $temp = LettersTemp::findOrFail($data->temp_id);

    if ($temp->event_status == 1) {
        // Create an Event record if event_status is 1
        Events::create([
            'title' => $data->title,
            'slug' => $data->slug,
            'content' => $data->content,
            'category_id' => $data->category_id,
            'status' => $data->status,
            'date' => $data->date,
            'date_end' => $data->date_end, // Use date_end from $data
            'time' => $data->time,
            'cost' => $data->cost,
            'available_tickets' => $data->available_tickets,
            'image' => $data->image,
            'organizer' => $data->organizer,
            'organizer_email' => $data->organizer_email,
            'organizer_website' => $data->organizer_website,
            'organizer_phone' => $data->organizer_phone,
            'venue' => $data->venue,
            'venue_location' => $data->venue_location,
            'venue_phone' => $data->venue_phone,
            'meta_tags' => $data->meta_tags,
            'meta_description' => $data->meta_description,
            'meta_title' => $data->meta_title,
        ]);
    }

    // Update the status of the letter
    $data->update(['status' => 'Approved']);

    return redirect()->back()->with(['msg' => __('Surat Berhasil di Approve, Update Success...'), 'type' => 'success']);
}

    public function update_letter(Request $request){
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

        $slug = !empty($request->slug) ? Str::slug($request->slug) : Str::slug($request->title);
        $slug_check = letters::where(['slug' => $slug])->count();
        $letter_slug = $slug_check > 1 ? $slug.'-3' : $slug;


        letters::findOrfail($request->letter_id)->update([
            'name' => $request->title,
            'opener' => $request->letter_opening,
             'title' => $request->event_name,
            'slug' => $letter_slug,
            'content' => $request->letter_content,
            'category_id' => $request->category_id,
            'temp_id' => $request->category_letter_id,
            'letter_no'=> $request->letter_no,
            'target' => $request->letter_target,
            'lesson_title' =>$request->lesson_materi,
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
        ]);

        return redirect()->back()->with(['msg' => __('letter Update Success...'),'type'=>'success']);
    }

    public function single_page_settings(){
        return view(self::BASE_PATH.'letter-single-page-settings');
    }

    public function update_single_page_settings(Request $request){

            $this->validate($request,[
                'site_letters_category_title'  => 'nullable|string'
            ]);
            $all_fields = [
              'letter_single_letter_info_title',
              'letter_single_date_title',
              'letter_single_time_title',
              'letter_single_cost_title',
              'letter_single_category_title',
              'letter_single_organizer_title',
              'letter_single_organizer_name_title',
              'letter_single_organizer_email_title',
              'letter_single_organizer_phone_title',
              'letter_single_organizer_website_title',
              'letter_single_venue_title',
              'letter_single_venue_name_title',
              'letter_single_venue_location_title',
              'letter_single_venue_phone_title',
              'letter_single_category_title',
              'letter_single_available_ticket_text',
              'letter_single_reserve_button_title',
              'letter_single_letter_expire_text',
            ];
            foreach ($all_fields as $field){
                update_static_option($field,$request->$field);
            }


        return redirect()->back()->with(['msg' => __('letters Single Page Settings Success...'),'type' => 'success']);
    }


    public function page_settings(){
        return view(self::BASE_PATH.'letter-page-settings');
    }

    public function update_page_settings(Request $request){

            $this->validate($request,[
                'disable_guest_mode_for_letter_module'  => 'nullable|string',
                 'letter_temp_page_title'  => 'nullable|string',
                'letter_temp_page_form_button_title'  => 'nullable|string',
                'letter_temp_receiver_mail' => 'nullable|string|max:191',
                'letter_cancel_page_description' => 'nullable|string|max:191',
                'letter_cancel_page_subtitle' => 'nullable|string|max:191',
                'letter_cancel_page_title' => 'nullable|string|max:191',
                'letter_success_page_title' => 'nullable|string|max:191',
                'letter_page_button_text' => 'nullable|string|max:191',
                'letter_success_page_description' => 'nullable|string|max:191',
            ]);

            $fields = [
                'disable_guest_mode_for_letter_module',
                'letter_temp_page_title',
                'letter_temp_page_form_button_title',
                'letter_temp_receiver_mail',
                'letter_cancel_page_description',
                'letter_cancel_page_subtitle',
                'letter_cancel_page_title',
                'letter_success_page_title',
                'letter_page_button_text',
                'letter_success_page_description',
            ];
            foreach ($fields as $field){
                update_static_option($field,$request->$field);
            }

        return redirect()->back()->with(FlashMsg::settings_update());
    }

    public function clone_letter(Request $request){
        $letter_details = letters::find($request->item_id);
        letters::create([
            'title' => $letter_details->title,
            'slug' => ($letter_details->slug) ? $letter_details->slug.$letter_details->id : \Str::slug($letter_details->title),
            'content' => $letter_details->content,
            'category_id' => $letter_details->category_id,
            'status' => 'draft',
            'date' => $letter_details->date,
            'time' => $letter_details->time,
            'cost' => $letter_details->cost,
            'available_tickets' => $letter_details->available_tickets,
            'image' => $letter_details->image,
            'organizer' => $letter_details->organizer,
            'organizer_email' => $letter_details->organizer_email,
            'organizer_website' => $letter_details->organizer_website,
            'organizer_phone' => $letter_details->organizer_phone,
            'venue' => $letter_details->venue,
            'venue_location' => $letter_details->venue_location,
            'venue_phone' => $letter_details->venue_phone,
            'meta_title' => $letter_details->meta_title,
        ]);
        return redirect()->back()->with(['msg' => __('letters Clone Success...'),'type' => 'success']);
    }


    public function letter_temp_logs(Request $request){

        if ($request->ajax()){
            $temp = letterTemp::orderBy('id','desc')->get();
            return DataTables::of($temp)
                ->addIndexColumn()
                ->addColumn('checkbox',function ($row){
                    return General::bulkCheckbox($row->id);
                })
                ->addColumn('letter_name',function ($row){
                    return $row->letter_name;
                })
                ->addColumn('payment_status',function ($row){
                    return General::statusSpan($row->payment_status);
                })
                ->addColumn('status',function ($row){
                    return General::statusSpan($row->status);
                })
                 ->addColumn('date',function ($row){
                    return $row->created_at->format('D, d m Y');
                })
                ->addColumn('action', function($row){
                    $action = '';
                    $action .= General::viewIcon(route('admin.letter.temp.view',$row->id));
                    $admin = auth()->guard('admin')->user();

                    if ($admin->can('letter-temp-delete')){
                        $action .= General::deletePopover(route('admin.letter.temp.logs.delete',$row->id));
                    }
                    if ($admin->can('letter-temp-mail')){
                        $action .= '<a href="#" data-toggle="modal"  data-target="#user_edit_modal" class="btn btn-lg btn-primary btn-sm mb-3 mr-1 user_edit_btn"> <i class="ti-email"></i></a>';
                    }
                    if ($admin->can('letter-temp-edit')){
                        $action .= '<a href="#" data-id="'.$row->id.'" data-status="'.$row->status.'" data-toggle="modal" data-target="#order_status_change_modal" class="btn btn-lg btn-info btn-sm mb-3 mr-1 order_status_change_btn" >'.__("Update Status").'</a>';
                        if(!empty($row->user_id) && $row->payment_status === 'pending'){
                            $action .= General::reminderMail(route('admin.letter.temp.reminder'),$row->id);
                        }
                    }

                    return $action;
                })
                ->rawColumns(['action','checkbox','info','status','payment_status'])
                ->make(true);
        }
        return view(self::BASE_PATH.'letter-temp-all');
    }

    public function delete_letter_temp_logs(Request $request,$id){
        $temp_details = letterTemp::find($id);
        $letter_payment_logs = letterPaymentLogs::where('temp_id',$temp_details->id)->first();
        if (!empty($letter_payment_logs)){
            return redirect()->back()->with(['msg' => __('Your Can not delete this temp, it already associated with a letter payment log.'),'type' => 'danger']);
        }
        $temp_details->delete();
        return redirect()->back()->with(['msg' => __('letters temp Log Deleted...'),'type' => 'danger']);
    }

    public function update_letter_temp_logs_status(Request $request){
        letterTemp::where('id',$request->temp_id)->update(['status' => $request->temp_status]);
        return redirect()->back()->with(['msg' => __('letters temp Status Updated...'),'type' => 'success']);
    }

    public function send_mail_letter_temp_logs(Request $request){
        $this->validate($request,[
            'email' => 'required|string|max:191',
            'name' => 'required|string|max:191',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
        $subject = str_replace('{site}',get_static_option('site_'.get_default_language().'_title'),$request->subject);
        $data = [
            'name' => $request->name,
            'message' => $request->message,
        ];
        try{
             Mail::to($request->email)->send(new OrderReply($data,$subject));
        }catch(\Exceptoin $e){
            return redirect()->back()->with(['msg' => __('temp Reply Mail Send Failed'),'type' => 'danger']);
        }
        return redirect()->back()->with(['msg' => __('temp Reply Mail Send Success...'),'type' => 'success']);
    }

    public function letter_payment_logs(Request $request){

        if ($request->ajax()){
            $payment_logs = letterPaymentLogs::orderBy('id','desc')->get();
            return DataTables::of($payment_logs)
                ->addIndexColumn()
                ->addColumn('checkbox',function ($row){
                    return General::bulkCheckbox($row->id);
                })
                ->addColumn('payer_name',function ($row){
                    return $row->name;
                })
                ->addColumn('payment_gateway',function ($row){
                    return ucwords(str_replace('_',' ',$row->package_gateway));
                })
                ->addColumn('status',function ($row){
                    return General::statusSpan($row->status);
                })
                ->addColumn('date',function ($row){
                    return date_format($row->created_at,'d M Y');
                })
                ->addColumn('action', function($row){
                    $action = '';
                    $admin = auth()->guard('admin')->user();
                    if ($admin->can('letter-payment-log-delete')){
                        $action .= General::deletePopover(route('admin.letter.payment.delete',$row->id));
                    }
                    if ($admin->can('letter-payment-log-view')){
                        $action .= General::viewIcon(route('admin.letter.payment.view',$row->id));
                    }
                    if ($admin->can('letter-payment-log-edit')){
                        if($row->package_gateway === 'manual_payment' && $row->status === 'pending'){
                            $action .= General::paymentAccept(route('admin.letter.payment.approve',$row->id));
                        }
                    }
                    return $action;
                })
                ->rawColumns(['action','checkbox','info','status'])
                ->make(true);
        }

        return view(self::BASE_PATH.'letter-payment-logs-all');

    }
    public function delete_letter_payment_logs(Request $request,$id){
        letterPaymentLogs::find($id)->delete();
        return redirect()->back()->with(['msg' => __('letter Payment Log Delete Success...'),'type' => 'danger']);
    }

    public function approve_letter_payment(Request $request,$id){

        $payment_logs = letterPaymentLogs::find($id);
        $payment_logs->status = 'complete';
        $payment_logs->save();

        $letter_temp = LetterTemp::find($payment_logs->temp_id);
        $letter_temp->payment_status = 'complete';
        $letter_temp->status = 'complete';
        $letter_temp->save();

        $letter_details = letters::find($letter_temp->letter_id);
        $letter_details->available_tickets = $letter_details->available_tickets - $letter_temp->quantity;
        $letter_details->save();

        //update database
        $letter_payment_logs = letterPaymentLogs::find($id);
        $letter_temp = LetterTemp::find($letter_payment_logs->temp_id);

        $order_mail = get_static_option('letter_temp_receiver_mail') ? get_static_option('letter_temp_receiver_mail') : get_static_option('site_global_email');
        $letter_details = letters::find($letter_temp->letter_id);

        //send mail to admin
        $subject = __('you have an letter booking order');
        $message = __('you have an letter booking order. temp Id').' #'.$letter_temp->id;
        $message .= ' '.__('at').' '.date_format($letter_temp->created_at,'d F Y H:m:s');
        $message .= ' '.__('via').' '.str_replace('_',' ',$letter_payment_logs->package_gateway);
        $admin_mail = !empty(get_static_option('letter_temp_receiver_mail')) ? get_static_option('letter_temp_receiver_mail') : get_static_option('site_global_email');

       try{
            Mail::to($admin_mail)->send(new \App\Mail\lettertemp([
                'subject' => $subject,
                'message' => $message,
                'letter_temp' => $letter_temp,
                'letter_details' => $letter_details,
                'letter_payment_logs' => $letter_payment_logs,
            ]));
       }catch(\Exception $e){
           return redirect()->back()->with(['msg' => __('Manual Payment Accept Success').' '. __('Mail Send Failed'),'type' => 'success']);
       }

        //send mail to user
        $subject = __('your letter booking order has been placed');
        $message = __('your letter booking order has been placed. temp Id').' #'.$letter_temp->id;
        $message .= ' '.__('at').' '.date_format($letter_temp->created_at,'d F Y H:m:s');
        $message .= ' '.__('via').' '.str_replace('_',' ',$letter_payment_logs->package_gateway);
        
         try{
            Mail::to($order_mail)->send(new \App\Mail\lettertemp([
                'subject' => $subject,
                'message' => $message,
                'letter_temp' => $letter_temp,
                'letter_details' => $letter_details,
                'letter_payment_logs' => $letter_payment_logs,
            ]));
       }catch(\Exception $e){
           return redirect()->back()->with(['msg' => __('Manual Payment Accept Success').' '. __('Mail Send Failed'),'type' => 'success']);
       }
       
       

        return redirect()->back()->with(['msg' => __('Manual Payment Accept Success'),'type' => 'success']);
    }

    public function payment_success_page_settings(){
        return view(self::BASE_PATH.'letter-payment-success-page');
    }

    public function update_payment_success_page_settings(Request $request){

            $this->validate($request,[
                'letter_success_page_title' => 'nullable|string',
                'letter_success_page_description' => 'nullable|string',
            ]);
            $all_fields = [
                'letter_success_page_title',
                'letter_success_page_description',
            ];
            foreach ($all_fields as $field){
                update_static_option($field,$request->$field);
            }

        return redirect()->back()->with(['msg' => __('Settings Update Success'),'type' => 'success']);
    }

    public function payment_cancel_page_settings(){
        return view(self::BASE_PATH.'letter-payment-cancel-page');
    }

    public function update_payment_cancel_page_settings(Request $request){

            $this->validate($request,[
                'letter_cancel_page_title' => 'nullable|string',
                'letter_cancel_page_subtitle' => 'nullable|string',
                'letter_cancel_page_description' => 'nullable|string',
            ]);
            $all_fields = [
                'letter_cancel_page_title',
                'letter_cancel_page_subtitle',
                'letter_cancel_page_description',
            ];
            foreach ($all_fields as $field){
                update_static_option($field,$request->$field);
            }

        return redirect()->back()->with(['msg' => __('Settings Update Success'),'type' => 'success']);
    }

    public function bulk_action(Request $request){
        $all = letters::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function temp_logs_bulk_action(Request $request){
        $all = lettertemp::find($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }

    public function payment_logs_bulk_action(Request $request){
        $all = letterPaymentLogs::find($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }

    public function payment_report(Request  $request){
        $order_data = '';
        $query = letterPaymentLogs::query();
        if (!empty($request->start_date)){
            $query->whereDate('created_at','>=',$request->start_date);
        }
        if (!empty($request->end_date)){
            $query->whereDate('created_at','<=',$request->end_date);
        }
        if (!empty($request->payment_status)){
            $query->where(['status' => $request->payment_status ]);
        }
        $error_msg = __('select start & end date to generate letter payment report');
        if (!empty($request->start_date) && !empty($request->end_date)){
            $query->orderBy('id','DESC');
            $order_data =  $query->paginate($request->items);
            $error_msg = '';
        }

        return view(self::BASE_PATH.'payment-report')->with([
            'order_data' => $order_data,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'items' => $request->items,
            'payment_status' => $request->payment_status,
            'error_msg' => $error_msg
        ]);
    }

    public function temp_report(Request  $request){
        $order_data = '';
        $letters = letters::where(['status' => 'publish'])->get();
        $query = lettertemp::query();
        if (!empty($request->start_date)){
            $query->whereDate('created_at','>=',$request->start_date);
        }
        if (!empty($request->end_date)){
            $query->whereDate('created_at','<=',$request->end_date);
        }
        if (!empty($request->letter_id)){
            $query->where(['letter_id' => $request->letter_id ]);
        }
        $error_msg = __('select start & end date to generate letter temp report');
        if (!empty($request->start_date) && !empty($request->end_date)){
            $query->orderBy('id','DESC');
            $order_data =  $query->paginate($request->items);
            $error_msg = '';
        }

        return view(self::BASE_PATH.'temp-report')->with([
            'order_data' => $order_data,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'items' => $request->items,
            'letter_id' => $request->letter_id,
            'letters' => $letters,
            'error_msg' => $error_msg
        ]);
    }

    public function letter_attedance_reminder(Request $request){
        //send order reminder mail
        $order_details = lettertemp::find($request->id);
        $payment_log = letterPaymentLogs::where(['temp_id' => $request->id])->first();
        $data['subject'] = __('your letter booking is still in pending at').' '. get_static_option('site_'.get_default_language().'_title');
        $data['message'] = __('hello').' '.$payment_log->name .'<br>';
        $data['message'] .= __('your letter booking').' #'.$order_details->id.' ';
        $data['message'] .= __('is still in pending, to complete your booking go to');
        $data['message'] .= ' <a href="'.route('user.home').'">'.__('your dashboard').'</a>';

        //send mail while order status change
       try{
            Mail::to($payment_log->email)->send(new BasicMail($data));
       }catch(\Exception $e){
            return redirect()->back()->with(['msg' => $e->getMessage(),'type' => 'danger']);
       }

        return redirect()->back()->with(['msg' => __('Reminder Mail Send Success'),'type' => 'success']);
    }

    public function letter_temp_view($id){
        $temp = lettertemp::findOrFail($id);
        return view(self::BASE_PATH.'temp-view',compact('temp'));
    }
    public function payment_logs_view($id){
        $payment = letterPaymentLogs::findOrFail($id);
        return view(self::BASE_PATH.'payment-log-view',compact('payment'));
    }
}
