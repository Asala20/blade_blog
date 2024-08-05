<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index')->with('posts' , $posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('admin.post.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
        ]);

        $user = User::findOrFail($request->user_id);
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->just_for_me = $request->has('just_for_me');
        $user->posts()->save($post);
        return redirect('admin/post')->with('message' , 'post is added successfully');
    }

    /**
     * Display the specified resource.
    */

    public function show(string $id)
    {

        $post = Post::find($id);
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::all();
        $post = Post::find($id);
        return view('admin.post.edit', compact('post', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $title_rule = $id ? ',' . $id . ',id' : '';
        $request->validate([
            'title' => 'required|unique:posts,title'.$title_rule,
            'content' => 'required',
        ]);

        $post = Post::find($id);
        $user = User::find($request->user_id);
        $post->user_id = $user->id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->just_for_me = $request->has('just_for_me');
        $post->update();
        return redirect('admin/post')->with('message' , 'post is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Post::destroy($id);
        return redirect()->back()->with('message' , 'post has been moved to recyle bin successfully');
    }

    public function deleting(string $id){
        $post = Post::find($id);
        $post->forcedelete();
        return redirect()->back()->with('message' , 'post is deleted successfully');
    }

    public function trashedPosts()
    {
        $posts = Post::onlyTrashed()->get();
        return view('admin.post.trashed')->with('posts',$posts);
    }

    public function restorePost(string $id)
    {
        Post::whereId($id)->restore();
        return redirect()->back()->with('message' , 'post is restored successfully');
    }

    public function restoreAllPosts()
    {
        Post::onlyTrashed()->restore();
        return redirect()->back()->with('message' , 'all posts are restored successfully');
    }

    public function showingPostToUser(string $id)
    {

        $post = Post::find($id);
        return view('admin.post.show')->with('post', $post);
    }

    public function showingPublicPosts()
    {
        $posts = Post::all();
        return view('admin.post.showingPublicPosts')->with('posts' , $posts);
    }

    public function showingPrivatePosts()
    {
        $posts = Post::all();
        return view('admin.post.showingPrivatePosts')->with('posts' , $posts);
    }

    public function dashboardPosts()
    {
        $posts = Post::all();
        return view('dashboardPosts')->with('posts' , $posts);
    }

}
