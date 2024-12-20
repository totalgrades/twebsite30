<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    
    public function comment()
    {
    	return $this->belongsTo('App\Comment');
    }

    public function reply_replies()
    {
        return $this->hasMany('App\ReplyReply');
    }
}
