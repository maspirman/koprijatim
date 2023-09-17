<?php

namespace App;
use App\User;
use App\Admin;
use App\LettersCategory;
use App\Letters;
use App\LettersTemp;

use Illuminate\Database\Eloquent\Model;

class Letters extends Model
{
    protected $table = 'letters';
    protected $fillable = ['id', 'name','temp_id','letter_no','letter_opening','letter_content','letter_closing', 'target', 'title','status','date','image','time','cost','available_tickets','organizer','organizer_email','organizer_phone','slug','venue','venue_location','content','category_id','meta_description','meta_tags','meta_title', 'user_id'];

    public function category(){
        return $this->hasOne('App\LetterCategory','id','category_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
