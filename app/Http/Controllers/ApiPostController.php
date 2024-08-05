<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ApiPostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        if($posts->count()>0){
            return response()->json([
                'status' => 200,
                'posts' => $posts
            ], 200);
        }else {
            return response()->json([
                'status' => 404,
                'message' => "No records found"
            ], 200);
        }
    }

    public function store(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->just_for_me = $request->has('just_for_me');
        $user->posts()->save($post);
        
        return response()->json([
            "message" => "Post was added successfully"
        ]);
    }
    
}
