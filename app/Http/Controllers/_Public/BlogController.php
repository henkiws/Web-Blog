<?php

namespace App\Http\Controllers\_Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Post;
use App\Model\Category;

class BlogController extends Controller
{
    public function index($slug)
    {
        $post = Post::with(['image','user','tags.tag'])
                ->where('post_type','post')
                ->where('post_status','publish')
                ->where('post_slug',$slug)->first();

        $categories = Category::whereNotNull('parent_id')->get();
        
        if( $post === null ){
            return redirect('/');
        }

        return view('_Public.blog.index', compact('post','categories'));
    }
}
