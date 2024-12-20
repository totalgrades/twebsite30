<?php

namespace App\Http\Controllers\Admin\Documentation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;

class StudentsController extends Controller
{
    public function students()
    {
    	return view('admin.documentation.students');
    }

    public function storeNewDocPost(Request $request) 
    {
        $this->validate(request(), [
            'category_id' => 'required',
            'post_title' => 'required',
            'post_body' => 'required',
        ]);
        Post::insert([
                    'user_id'=>$request->user_id,
                    'category_id'=>$request->category_id,
                    'post_title'=>$request->post_title,
                    'post_body'=>$request->post_body,
                    'show_profile_picture' => $request->show_profile_picture,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
       
        
        return back();
	}
}
