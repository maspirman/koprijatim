<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LettersTemp extends Model
{
    protected $table = 'letter_template';
    protected $fillable = ['name','opener','closing','image','status'];

    // public function category(){
    //     return $this->hasOne('App\EventsCategory','id','category_id');
    // }
}
