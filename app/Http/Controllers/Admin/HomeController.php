<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\JobApplication;
use App\ContactUs;
use App\User;
use App\Job;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $jobs = Job::get();
        $job_applications = JobApplication::get();
        $contactus = ContactUs::get();
        $users = User::orderBy('created_at', 'desc')->get();
        $admin_users = User::where('is_admin', '=', 1)->get();

        return view('admin.home', compact('jobs', 'job_applications', 'contactus', 'users', 'admin_users'));
    }

    public function contactFormSubmissions()
    {
    	
        return view('admin.contactformsubmissions');
    }

    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'is_admin' => 'nullable|boolean',
        ]);

        $registrationCode = $this->generateRegistrationCode();
        DB::table('registration_codes')->insert([
            'reg_code' => $registrationCode,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->registration_code = $registrationCode;
        $user->password = Hash::make($validated['password']);
        $user->is_admin = $request->boolean('is_admin');
        $user->save();

        return redirect()->route('admin.home')->with('status', 'User created successfully.');
    }

    private function generateRegistrationCode(): string
    {
        do {
            $code = strtoupper(Str::random(10));
            $exists = DB::table('registration_codes')->where('reg_code', $code)->exists()
                || User::where('registration_code', $code)->exists();
        } while ($exists);

        return $code;
    }
   
}
