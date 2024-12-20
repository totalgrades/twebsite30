<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $dates = ['date_closing', 'created_at'];

    public function job_requirements()
    {
    	return $this->hasMany('App\JobRequirement');
    }

    public function job_applications()
    {
    	return $this->hasMany('App\JobApplication');
    }
}
