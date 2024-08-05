@extends('layouts.inc.admin.navbar')
    @section('search_bar')
        <ul class="navbar-nav mr-lg-4 w-100">
            <li class="nav-item nav-search d-none d-lg-block w-100">
                <form action="{{url('search/trashedPosts')}}" method="get" role="search">
                    @csrf
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="search">
                                <i class="mdi mdi-magnify"></i>
                            </span>
                        </div>
                        <input type="text" name="search" value="" class="form-control" placeholder="Search for a Deleted Post Title" aria-label="search" aria-describedby="search">
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
        @if(Session::has('message'))
            <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
        <div class="container">
            <table class="table-hover table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{$post->title}}</td>
                            <td>
                                @if($post->just_for_me)
                                    <i style="color: lightcoral;">private</i>
                                @else <i style="color: lightgreen;">public</i>
                                @endif
                            </td>
                            <td>
                                <a href="{{url('admin/post/restorePost/'.$post->id)}}" class="btn btn-secondary">
                                    restore
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{url('admin/post/restoreAllPosts')}}" class="btn btn-secondary">
                restore all
            </a>
        </div>
    @endsection
