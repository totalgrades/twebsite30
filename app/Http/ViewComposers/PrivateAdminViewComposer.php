<?php
namespace App\Http\ViewComposers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Repositories\UserRepository;

use Carbon\Carbon;
use App\JobApplication;
use App\ContactUs;
use App\User;
use App\Job;
use App\RegistrationSchool;
use App\Category;
use App\Post;


Class PrivateAdminViewComposer {
	

    public function compose(View $view)
    {
        
    	//get current date
        $today = Carbon::today();
        
        //count jobs less than or equal to a weeks old          
        $jobs = Job::get();

        $job_applications = JobApplication::get();

        $contactus = ContactUs::get();

        $users = User::get();

        $school_registrations = RegistrationSchool::get();

        $categories = Category::get();

        $posts = Post::get();

        //put variables in views
        $view
        ->with('today', $today)
        ->with('jobs', $jobs)
        ->with('job_applications', $job_applications)
        ->with('contactus', $contactus)
        ->with('users', $users)
        ->with('school_registrations', $school_registrations)
        ->with('categories', $categories)
        ->with('posts', $posts);
       
    }
}