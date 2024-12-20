<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;
use App\Traits\CaptchaTrait;

class DocumentationController extends Controller
{
    use CaptchaTrait;

      public function documentation(Category $category)
    {
        return view('admin.documentation', compact('category'));
    }

    public function storeNewDocPost(Request $request, Category $category) 
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
       
        
        return redirect()->route('documentation', [$category->id]);
    }

    public function editDocPost(Post $post)
    {
        return view('admin.editdocumentation', compact('post'));
    }

    public function updateEditDocPost(Request $request, Post $post)
    {
        $this->validate(request(), [
            'post_title' => 'required',
            'post_body' => 'required',
        ]);
              

        $post_edit = Post::where('id', '=', $post->id)->first();
        
        $post_edit->post_title= $request->post_title;
        $post_edit->post_body= $request->post_body;
        $post_edit->show_profile_picture= $request->show_profile_picture;
        $post_edit->updated_at= date('Y-m-d H:i:s');
        $post_edit->save();
        
        flash('Post Updated Successfully')->success();
        return back();
    }
    public function deleteDocPost(Post $post)
    {
        Post::where('id', $post->id)->delete();
        flash('Post has been deleted')->error();
        return back();
    }
}
