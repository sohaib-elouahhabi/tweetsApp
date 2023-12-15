<?php

namespace App\Http\Controllers;

use App\Models\Post;
use http\Message\Body;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(){

        $posts =Post::get();
        return view('posts.index',
        [
            'posts'=>$posts
            ]);
    }

    public function store(Request $request){

        // Validate the request data
        $request->validate([
            'body' => 'required|string|max:255', // Example rules; adjust as needed
        ]);

        $request->user()->posts()->create(
            [
                'body'=> $request->body
            ]
        );
        return back();
    }
}
