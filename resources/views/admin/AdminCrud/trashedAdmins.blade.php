<?php use Carbon\Carbon; ?>
@extends('layouts.inc.admin.navbar')
    @section('search_bar')
        <ul class="navbar-nav mr-lg-4 w-100">
            <li class="nav-item nav-search d-none d-lg-block w-100">
                <form action="{{url('search/trashedAdmins')}}" method="get" role="search">
                    @csrf
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="search">
                                <i class="mdi mdi-magnify"></i>
                            </span>
                        </div>
                        <input type="text" name="search" value="" class="form-control" placeholder="Search for a deleted Admin" aria-label="search" aria-describedby="search">
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
                                <td>{{$admin->email}}</td>
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
                                    <a href="{{url('admins/restoreAdmin/'.$admin->id)}}" class="btn btn-secondary">
                                        restore
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            <a href="{{url('admins/restoreAllAdmins')}}" class="btn btn-secondary">
                restore all
            </a>
        </div>
    @endsection
