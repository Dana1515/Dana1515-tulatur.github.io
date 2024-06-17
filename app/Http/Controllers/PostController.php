<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $post = new Post;
        $post->name = $request->name;
        $post->age = $request->age;
        $post->mark = $request->mark;
        $post->review = $request->review;
        $post->save();
        return view('post');
    }
}
