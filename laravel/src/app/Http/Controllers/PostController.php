<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        return Post::latest()->get();
    }

    public function show(Post $post)
    {
        return [
            'post' => $post,
            'comments' => $post->comments()->latest()->get(),
        ];
    }

    public function store(Request $request)
    {
        return Post::create($request->only('title', 'body', 'author_name'));
    }
}
