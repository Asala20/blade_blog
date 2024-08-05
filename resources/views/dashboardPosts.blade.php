<?php use Carbon\Carbon; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{Auth::user()->name}}'s {{ __('Dashboard') }}
            </h2>
        </x-slot>
        @foreach($posts as $post)
            @if(!$post->just_for_me)
                <div class="py-12" >
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                <div class="card" >
                                    <div class="card-header">
                                        &nbsp;  <i>
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
                                        <h1 class="card-title" style="font-weight: bold;">{{$post->title}}</h1>
                                        <p class="card-text">{{$post->content}}</p>
                                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                    </div>
                                    <div class="card-footer">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>


