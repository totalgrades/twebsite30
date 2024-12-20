<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class JobApplication extends Model
{

    public function job()
    {
    	return $this->belongs('App\Job');
    }
}
