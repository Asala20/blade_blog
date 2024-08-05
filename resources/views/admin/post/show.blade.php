<?php use Carbon\Carbon; ?>
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
        <div class="container">
            <div class="card">
                <div class="card-header">
                    @if($post->just_for_me)
                        <i style="color: lightcoral;">private</i>
                    @else
                        <i style="color: lightgreen;">public</i>
                    @endif
                    &nbsp;  
                    <i>
                        <small style="color: gray;">
                            <?php
                                $c_date = Carbon::parse($post->created_at);
                                $pr = $c_date->toDayDateTimeString();
                            ?>
                            {{$pr}}
                        </small>
                    </i>
                    &nbsp;  <i><small style="color: gray;">{{$post->user->name}}</small></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title"> {{$post->title}} </h5>
                    <p class="card-text">{{$post->content}}</p>
                    <a href="{{url('admin/post/' . $post->id . '/edit')}}" class="btn btn-primary">Edit</a>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    @endsection
