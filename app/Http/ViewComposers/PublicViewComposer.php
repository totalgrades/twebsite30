<?php
namespace App\Http\ViewComposers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Repositories\UserRepository;

use Carbon\Carbon;
use App\Job;
use App\Category;
use App\Post;
use App\Comment;
use App\Reply;


Class PublicViewComposer {
	

    public function compose(View $view)
    {
        
    	//get current date
        $today = Carbon::today();
        
        //count jobs less than or equal to a weeks old          
        $new_jobs = Job::count();

        $categories = Category::get();

        $posts = Post::get();

        $comments = Comment::get();

        $replies = Reply::get();


        //put variables in views
        $view
        ->with('today', $today)
        ->with('new_jobs', $new_jobs)
        ->with('categories', $categories)
        ->with('posts', $posts)
        ->with('comments', $comments)
        ->with('replies', $replies);
        
    }
}