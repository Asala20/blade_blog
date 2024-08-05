@extends('layouts.inc.admin.navbar')
    @section('search_bar')
        <ul class="navbar-nav mr-lg-4 w-100">
            <li class="nav-item nav-search d-none d-lg-block w-100">
                <form action="{{url('search/posts')}}" method="get" role="search">
                    @csrf
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="search">
                                <i class="mdi mdi-magnify"></i>
                            </span>
                        </div>
                        <input type="text" name="search" value="" class="form-control" placeholder="Search for a Post Title" aria-label="search" aria-describedby="search">
                            <button type="submit" class="btn bg-gray">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                    </div>
                </form>
            </li>
        </ul>
    @endsection
@extends('layouts.admin')
    @section('content')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container">
            <form action="{{url('admin/post/' . $post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PATCH")
                <div class="form-group">
                    <label for="">select the auther</label>
                    <select name="user_id" id="" class="form-control">
                        @foreach($users as $user)
                            @if($user->role_as=='1')
                                <option value="{{$user->id}}" {{$post->user_id == $user->id? 'selected':''}}>{{$user->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" cols="10" rows="10" class="form-control">{{$post->content}}</textarea>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="just_for_me" id="just_for_me" value="1" class="form-check-input">
                    <label for="just_for_me">Just for Me</label>
                </div>
                <div class="form-group">
                    <input type="file" name="photo" id="photo" class="form-control">
                    <label for="photo">if you do not choose a new photo, the post will keep the old one.</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    @endsection
