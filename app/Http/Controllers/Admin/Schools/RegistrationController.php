<?php

namespace App\Http\Controllers\Admin\Schools;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{
    public function registration()
    {
    	return view('admin.schools.registration');
    }
}
