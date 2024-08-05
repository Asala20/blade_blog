<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchPosts()
    {
        $search_text =$_GET['search'];
        $posts = Post::where('title', 'LIKE', '%'.$search_text.'%')->get();
        return view('admin.search.searchPosts', compact('posts'))->with('message', 'results');
    }

    public function searchAdmins()
    {
        $search_text =$_GET['search'];
        $admins = User::where('name', 'LIKE', '%'.$search_text.'%')->where('role_as', '=' , '1')->get();
        return view('admin.search.searchAdmins', compact('admins'))->with('message', 'results');
    }

    public function searchUsers()
    {
        $search_text =$_GET['search'];
        $users = User::where('name', 'LIKE', '%'.$search_text.'%')->where('role_as', '=', '0')->get();
        return view('admin.search.searchUsers', compact('users'))->with('message', 'results');
    }

    public function searchTrashedPosts()
    {
        $search_text =$_GET['search'];
        $posts = Post::onlyTrashed()->where('title', 'LIKE', '%'.$search_text.'%')->get();
        return view('admin.search.searchTrashedPosts', compact('posts'))->with('message', 'results');
    }

    public function searchTrashedAdmins()
    {
        $search_text =$_GET['search'];
        $admins = User::onlyTrashed()->where('name', 'LIKE', '%'.$search_text.'%')->where('role_as', '=', '1')->get();
        return view('admin.search.searchTrashedAdmins', compact('admins'))->with('message', 'results');
    }

    public function searchTrashedUsers()
    {
        $search_text =$_GET['search'];
        $users = User::onlyTrashed()->where('name', 'LIKE', '%'.$search_text.'%')->where('role_as', '=', '0')->get();
        return view('admin.search.searchTrashedUsers', compact('users'))->with('message', 'results');
    }


}
