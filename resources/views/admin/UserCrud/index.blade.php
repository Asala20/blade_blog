@extends('layouts.inc.admin.navbar')
    @section('search_bar')
        <ul class="navbar-nav mr-lg-4 w-100">
            <li class="nav-item nav-search d-none d-lg-block w-100">
                <form action="{{url('search/users')}}" method="get" role="search">
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
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex justify-content-between align-items-end flex-wrap">
                        <a href="{{url('users/create')}}">
                            <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                                <i class="mdi mdi-plus text-muted"></i>
                            </button>
                        </a>
                        <a href="{{url('users/trashedUsers')}}">
                            <button class="btn btn-primary mt-2 mt-xl-0">
                                recycle bin
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
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
                                    <form action="{{url('users/' . $user->id)}}" method="post" style="display:inline">
                                        {{method_field('DELETE')}}
                                        {{csrf_field()}}
                                        <button class="btn btn-warning">move to recycle bin</button>
                                    </form>
                                    <a href="{{url('users/deleting/' . $user->id)}}" onclick="return confirm('Are you sure you want to delete this user permenently?')" class="btn btn-danger">
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
