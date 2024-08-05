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
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex justify-content-between align-items-end flex-wrap">
                        <a href="{{url('admin/post/create')}}">
                            <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                                <i class="mdi mdi-plus text-muted"></i>
                            </button>
                        </a>
                        <a href="{{url('admin/post/trashedPosts')}}">
                            <button class="btn btn-primary mt-2 mt-xl-0">
                                recycle bin
                            </button>
                        </a>
                        &nbsp; &nbsp;
                        <a href="{{url('admin/post')}}">
                            <button class="btn btn-secondary mt-2 mt-xl-0">
                                show all posts
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <i style="color: lightgreen;"><small>Public posts</small></i>
        </div>
        <div class="container">
            <table class="table-hover table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Auther</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        @if(! $post->just_for_me)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td>{{$post->user->name}}</td>
                                <td>
                                    <a href="{{url('admin/post/' . $post->id)}}" class="btn btn-info">
                                        show post
                                    </a>
                                    <a href="{{url('admin/post/' . $post->id . '/edit')}}" class="btn btn-primary">
                                        edit
                                    </a>
                                    <form action="{{url('admin/post/' . $post->id)}}" method="post" style="display:inline">
                                        {{method_field('DELETE')}}
                                        {{csrf_field()}}
                                        <button class="btn btn-warning">move to recycle bin</button>
                                    </form>
                                    <a href="{{url('admin/post/deleting/' . $post->id)}}" onclick="return confirm('Are you sure you want to delete this user permenently?')" class="btn btn-danger">
                                        delete
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
