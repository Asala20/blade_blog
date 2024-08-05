<?php use Carbon\Carbon; ?>
@extends('layouts.inc.admin.navbar')
    @section('search_bar')
        <ul class="navbar-nav mr-lg-4 w-100">
            <li class="nav-item nav-search d-none d-lg-block w-100">
                <form action="{{url('search/admins')}}" method="get" role="search">
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
                        <a href="{{url('admins/create')}}">
                            <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                                <i class="mdi mdi-plus text-muted"></i>
                            </button>
                        </a>
                        <a href="{{url('admins/trashedAdmins')}}">
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
                        <th>Age</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
                        @if($admin->role_as=='1')
                            <tr>
                                <td>{{$admin->name}}</td>
                                <td>
                                {{$admin->email}}
                                </td>
                                <td>
                                    <?php
                                    $age_date = Carbon::parse($admin->age);
                                    $pr = $age_date->diffInYears(now());
                                    ?>
                                    {{$pr}}
                                </td>
                                <td>{{$admin->address}}</td>
                                <td>{{$admin->phone}}</td>
                                <td>
                                    <a href="{{url('admins/' . $admin->id . '/edit')}}" class="btn btn-primary">
                                        edit
                                    </a>
                                    <form action="{{url('admins/' . $admin->id)}}" method="post" style="display:inline">
                                    {{method_field('DELETE')}}
                                    {{csrf_field()}}
                                        <button class="btn btn-warning">move to recycle bin</button>
                                    </form>
                                    <a href="{{url('admins/deleting/' . $admin->id)}}" onclick="return confirm('Are you sure you want to delete this user permenently?')" class="btn btn-danger">
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
