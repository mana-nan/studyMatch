<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mypage extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        //必須項目
        'userName' => 'required',
        'userImage' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg,gif'],
    );
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
}