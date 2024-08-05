<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//if not registered or loged in this page will appear immediatly
Route::redirect('/',  'register')->name('home');

//this page will appear after logging in or registering nd it has all the public posts
Route:: get('dashboardPosts' , [PostController::class, 'dashboardPosts'])->middleware('auth')->name('dashboardPosts');
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//CRUD and restoring posts in admin dashboard.
Route::prefix('admin/post')->middleware(['auth' , 'isAdmin'])->group(function(){
    //hard deleting posts.
    Route::get('deleting/{id}', [PostController::class, 'deleting'])->name('deletingPost');
    //trashed posts to restore them.
    Route::get('trashedPosts' , [PostController::class, 'trashedPosts'])->name('trashedPosts');
    Route::get('restoreAllPosts' , [PostController::class , 'restoreAllPosts'])->name('restoreAllPosts');
    Route::get('restorePost/{id}' , [PostController::class , 'restorePost'])->name('restorePost');
    Route::get('showingPublicPosts' , [PostController::class, 'showingPublicPosts'])->name('showingPublicPosts');
    Route::get('showingPrivatePosts' , [PostController::class, 'showingPrivatePosts'])->name('showingPrivatePosts');
});
Route::resource('admin/post' , PostController::class)->middleware(['auth' , 'isAdmin']);
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//CRUD and restoring admins in admin dashboard.
Route::prefix('admins')->middleware(['auth' , 'isAdmin'])->group(function(){
    //hard deleting admin.
    Route::get('deleting/{id}', [AdminController::class, 'deleting']);
    //deleted admins to restore them.
    Route::get('trashedAdmins', [AdminController::class, 'trashedAdmins']);
    Route::get('restoreAllAdmins', [AdminController::class, 'restoreAllAdmins']);
    Route::get('restoreAdmin/{id}', [AdminController::class, 'restoreAdmin']);
});
Route::resource('admins' , AdminController::class)->middleware(['auth' , 'isAdmin']);
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//CRUD and restoring users in admin dashboard.
Route::prefix('users')->middleware(['auth' , 'isAdmin'])->group(function(){
    //hard deleting a user
    Route::get('deleting/{id}', [UserController::class, 'deleting']);
    Route::get('trashedUsers', [UserController::class, 'trashedUsers']);
    Route::get('restoreAllUsers', [UserController::class, 'restoreAllUsers']);
    Route::get('restoreUser/{id}', [UserController::class, 'restoreUser']);
});
Route::resource('users' , UserController::class)->middleware(['auth' , 'isAdmin'])->except('edit', 'show');
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//main page after registering or logging in.
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
//profile CRUD
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/\auth.php';

//search routes for posts, deleted posts, admins, deleted admins, users and deleted users.
Route::prefix('search')->middleware(['auth' , 'isAdmin'])->group(function(){
    Route::get('posts' , [SearchController::class, 'searchPosts']);
    Route::get('admins', [SearchController::class, 'searchAdmins']);
    Route::get('users',[SearchController::class, 'searchUsers']);
    Route::get('trashedPosts' , [SearchController::class, 'searchTrashedPosts']);
    Route::get('trashedAdmins' , [SearchController::class, 'searchTrashedAdmins']);
    Route::get('trashedUsers' , [SearchController::class, 'searchTrashedUsers']);
});


