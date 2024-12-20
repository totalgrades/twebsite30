<?php

namespace App\Http\Controllers\Documentation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Traits\CaptchaTrait;
use App\Comment;
use App\Reply;

class DocumentationController extends Controller
{
    use CaptchaTrait;

    public function allDocumentation(Category $category){

        return view('documentation.alldocumentation', compact('category'));
    }

    public function showDocumentation(Post $post){

        return view('documentation.showdocumentation', compact('post'));
    }

    public function addComment(Request $request, Post $post){

        $request['captcha'] = $this->captchaCheck();

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'post_comment' => 'required',
            'g-recaptcha-response' => 'required',
            'captcha' => 'required|min:1',
        ],

        [
         'g-recaptcha-response.required' => 'Captcha is required',
         'captcha.min' => 'Wrong captcha, please try again.'
        ]);
            
        Comment::insert([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'post_id'=>$post->id,
                    'post_comment'=>$request->post_comment,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
               
        return back();
    }

    public function addReply(Request $request, Comment $comment){

        $request['captcha'] = $this->captchaCheck();

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'reply' => 'required',
            'g-recaptcha-response' => 'required',
            'captcha' => 'required|min:1',
        ],

        [
         'g-recaptcha-response.required' => 'Captcha is required',
         'captcha.min' => 'Wrong captcha, please try again.'
        ]);
            
        Reply::insert([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'comment_id'=>$comment->id,
                    'reply'=>$request->reply,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
               
        return back();
    }

    public function addNewQuestion(Request $request)
    {

        $request['captcha'] = $this->captchaCheck();

        $this->validate(request(), [
            'category_id' => 'required',
            'post_title' => 'required',
            'post_body' => 'required',
            'g-recaptcha-response' => 'required',
            'captcha' => 'required|min:1',
        ], 
        [
         'g-recaptcha-response.required' => 'Captcha is required',
         'captcha.min' => 'Wrong captcha, please try again.'
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
