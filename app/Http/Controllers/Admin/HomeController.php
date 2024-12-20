<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\JobApplication;
use App\ContactUs;
use App\User;
use App\Job;

class HomeController extends Controller
{
    public function index()
    {
    	
        return view('admin.home');
    }

    public function contactFormSubmissions()
    {
    	
        return view('admin.contactformsubmissions');
    }
   
}
