@extends('layouts.inc.admin.navbar')
    @section('search_bar')
        <ul class="navbar-nav mr-lg-4 w-100">
            <li class="nav-item nav-search d-none d-lg-block w-100">
                <form action="{{url('search/trashedUsers')}}" method="get" role="search">
                    @csrf
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="search">
                                <i class="mdi mdi-magnify"></i>
                            </span>
                        </div>
                        <input type="text" name="search" value="" class="form-control" placeholder="Search for Admin" aria-label="search" aria-describedby="search">
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        @if($user->role_as=='0')
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                <a href="{{url('users/restoreUser/'.$user->id)}}" class="btn btn-secondary">
                                    restore
                                </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            <a href="{{url('users/restoreAllUsers')}}" class="btn btn-secondary">
                restore all
            </a>
        </div>
    @endsection
