<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;
use Carbon\Carbon;
use Crypt;
use App\Job;
use App\JobRequirement;
use App\JobApplication;
use App\Traits\CaptchaTrait;
use Notification;
use File;
use App\Notifications\ApplicationSubmitted;
use App\Notifications\ContactFormSubmitted;
use App\User;
use App\ContactUs;
use App\RegistrationSchool;
use Validator; 
use Illuminate\Support\Facades\Input;
use Response;
use DB;

class HomePublicController extends Controller
{
    use CaptchaTrait;
   
   
    public function index()
    {
        
    	return view('welcome');
    }

     public function features()
    {
    	return view('features');
    }

     public function videos()
    {
    	return view('videos');
    }

    public function careers()
    {
        $jobs = Job::latest()->get();

    	return view('careers', compact('jobs'));
    }

    public function jobDetails($job_id)
    {
        $job = Job::find(decrypt($job_id));
        $job_requirements = JobRequirement::where('job_id', '=', $job->id)->get();

        return view('careers.jobdetails', compact('job', 'job_requirements'));
    }

    public function jobApplicationForm($job_id)
    {
        $job = Job::find(decrypt($job_id));
        $job_requirements = JobRequirement::where('job_id', '=', $job->id)->get();

        
        return view('careers.jobapplicationform', compact('job', 'job_requirements'));
    }

    public function postJobApplicationForm(Request $r)
    {
       
       $r['captcha'] = $this->captchaCheck();
      
        $this->validate($r, [
        'job_id' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'street' => 'required',
        'city' => 'required',
        'state' => 'required',
        'reason_qualify' => 'required',
        'applicant_cv' => 'required|mimes:pdf,doc|max:10000',
        'must_haves' => 'required',
        'g-recaptcha-response' => 'required',
        'captcha' => 'required|min:1',

        ],

        [
         'g-recaptcha-response.required' => 'Captcha is required',
         'captcha.min' => 'Wrong captcha, please try again.'
        ]);

        if($r->hasFile('applicant_cv')){
            $applicant_cv = $r->file('applicant_cv');
            $filename = time() . '.' . $applicant_cv->getClientOriginalExtension();
            $destinationPath = public_path().'/job_application/' ;

            $applicant_cv->move($destinationPath,$filename);
            
        }

        
 
       $job_application = JobApplication::insert([
            'job_id'=>$r->job_id,
            'first_name'=>$r->first_name,
            'last_name'=>$r->last_name,
            'phone'=>$r->phone,
            'email'=>$r->email,
            'street'=>$r->street,
            'city'=>$r->city,
            'state'=>$r->state,
            'reason_qualify'=>$r->reason_qualify,
            'applicant_cv'=>$filename,
            'must_haves'=>$r->must_haves,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

             
        ]);

        $user = User::first();
 
        $user->notify(new ApplicationSubmitted("A new job application has been submitted."));

               
        flash('Your Job Application was Submitted successfully. We will be contacting you soon!')->success();
      
       return back();  
    }

   
    public function contact()
    {
    	return view('contact');
    }


    public function postContactForm(Request $request)
    {
        $request['captcha'] = $this->captchaCheck();

        $this->validate($request, [
        'first_name' => 'required',
        'last_name' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'message' => 'required',
        'g-recaptcha-response' => 'required',
        'captcha' => 'required|min:1',
        ],
        [
         'g-recaptcha-response.required' => 'Captcha is required',
         'captcha.min' => 'Wrong captcha, please try again.'
        ]);

        $contact_us = ContactUs::insert([
       'first_name'=>$request->first_name,
        'last_name'=>$request->last_name,
        'phone'=>$request->phone,
        'email'=>$request->email,
        'message'=>$request->message,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $user = User::first();
 
        $user->notify(new ContactFormSubmitted("A new contact form has been submitted."));

       flash('Your message was sent successfully. We will be contacting you soon!')->success();
      
       return back();  
    }

     public function schoolRegistrationForm()
    {
               
        return view('schoolRegistrationForm');
    }

    public function checkDomainAvailability(Request $request)
    {
       if($request->get('preferedDomainName'))
       {
        $preferedDomainName = $request->get('preferedDomainName');
        $data = DB::table("registration_schools")
         ->where('preferedDomainName', $preferedDomainName)
         ->count();
        if($data > 0)
        {
         echo 'not_unique';
        }
        else
        {
         echo 'unique';
        }
       }
    }

    public function postSchoolRegistrationForm(Request $r)
    {      
       
       $r['captcha'] = $this->captchaCheck();
      
        $this->validate($r, [
        'school_name' => 'required|unique:registration_schools',
        'preferedDomainName' => 'required|unique:registration_schools',
        'full_name' => 'required',
        'phone' => 'required',
        'email' => 'required|email|unique:registration_schools',
        'school_address' => 'required',
        'city' => 'required',
        'state' => 'required',
        'about_school' => 'required',
        'must_agree' => 'required',
        'g-recaptcha-response' => 'required',
        'captcha' => 'required|min:1',

        ],

        [
         'g-recaptcha-response.required' => 'Captcha is required',
         'captcha.min' => 'Wrong captcha, please try again.'
        ]);

                
           $school_registration = RegistrationSchool::insert([
              'school_name'=>$r->school_name,
              'preferedDomainName'=>$r->preferedDomainName,
              'full_name'=>$r->full_name,
              'phone'=>$r->phone,
              'email'=>$r->email,
              'school_address'=>$r->school_address,
              'city'=>$r->city,
              'state'=>$r->state,
              'about_school'=>$r->about_school,
              'must_agree'=>$r->must_agree,
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s'),

               
          ]);
           

        //$user = User::first();
 
        //$user->notify(new RegistrationSchoolSubmitted("A new school has submitted registration to use totalgrades."));

               
        flash('Your registration was Submitted successfully. We will be contacting you soon!')->success();
      
       return back();  
    }

}
