<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'post_title', 'post_body', 'show_profile_picture'];
    
    protected $dates = ['created_at', 'updated_at'];
    
	   public function user()
	    {
	    	return $this->belongsTo('App\User');
	    }
	    public function category()
	    {
	    	return $this->belongsTo('App\Category');
	    }
	    public function comments()
	    {
	        return $this->hasMany('App\Comment');
	    }
}
