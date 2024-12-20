<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\JobApplication;
use App\ContactUs;
use App\User;
use App\Job;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $jobs = Job::get();

        $job_applications = JobApplication::get();

        $contactus = ContactUs::get();

        $users = User::get();

        $admin_users = User::where('is_admin', '=', 1)->get();

        return view('home', compact('jobs', 'contactus', 'users', 'admin_users', 'job_applications'));
    }
}
