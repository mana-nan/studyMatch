<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = array('id','user_id');
    
    public static $rules = array(
        //必須項目
        'what' => 'required',
        'where' => 'required',
        
    );
    
    public function user() {
        return $this->belongsTo('App\User');
    }
}
