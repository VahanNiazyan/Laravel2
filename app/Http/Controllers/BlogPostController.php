<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function store(Request $request)
    {
        $blogpost = BlogPost::create($request->all());
        $blogpost->country()->create($request->only('posts'));
        return redirect()->route('index',$blogpost);
    }

}
