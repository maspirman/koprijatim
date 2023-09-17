<?php

namespace App\Http\Controllers\Admin;

use App\letter;
use App\LetterCategory;
use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\Request;

class LetterCategoryController extends Controller
{
    private const BASE_PATH = 'backend.letter.';
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:event-category-list|event-category-create|event-category-edit|event-category-delete',['only' => ['all_letter_category']]);
        $this->middleware('permission:event-category-create',['only' => ['store_letter_category']]);
        $this->middleware('permission:event-category-edit',['only' => ['update_letter_category']]);
        $this->middleware('permission:event-category-delete',['only' => ['delete_letter_category','bulk_action']]);
    }

    public function all_letter_category(){

        $all_category = LetterCategory::latest()->get();
        return view(self::BASE_PATH.'all-letter-category')->with(['all_category' => $all_category] );
    }

    public function store_letter_category(Request $request){
        $this->validate($request,[
            'title' => 'required|string|max:191|unique:letter_categories',
            'status' => 'required|string|max:191'
        ]);

        LetterCategory::create($request->all());

        return redirect()->back()->with([
            'msg' => __('New Category Added...'),
            'type' => 'success'
        ]);
    }

    public function update_letter_category(Request $request){
        $this->validate($request,[
            'title' => 'required|string|max:191',
            'status' => 'required|string|max:191'
        ]);

        LetterCategory::find($request->id)->update([
            'title' => $request->title,
            'status' => $request->status,
        ]);

        return redirect()->back()->with([
            'msg' => __( 'Category Update Success...'),
            'type' => 'success'
        ]);
    }

    public function delete_letter_category(Request $request,$id){
        if (letter::where('category_id',$id)->first()){
            return redirect()->back()->with([
                'msg' => __('You Can Not Delete This Category, It Already Associated With A Event...'),
                'type' => 'danger'
            ]);
        }
        LetterCategory::find($id)->delete();
        return redirect()->back()->with([
            'msg' => __('Category Delete Success...'),
            'type' => 'danger'
        ]);
    }

    public function bulk_action(Request $request){
        $all = LetterCategory::find($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }
}
