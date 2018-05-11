<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;

class PostController extends Controller
{
    public function addPost(Request $request) {
        $content = $request->content;
        $createPost = Post::create([
            'user_id' => Auth::user()->id,
            'content' => $content,
            'status' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        
        if ($createPost)
        {
            return $this->posts();
        }
    }

    public function posts() {
        $posts = Post::with('User', 'Profile')
                     ->orderBy('created_at', 'desc')
                     ->take(3)
                     ->get();
        return $posts;
    }
}
