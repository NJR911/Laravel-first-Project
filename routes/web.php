<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\IdeaController as AdminIdeaController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Author\DashboardController as AuthorDashboardController;

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

// Index
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

//  Ideas
// Route::group(['prefix' => '/ideas'], function () {
//     Route::get('/{idea}', [IdeaController::class, 'show'])->name('idea.show');

//     // Adding
//     Route::post('', [IdeaController::class, 'store'])->name('idea.store');


//     Route::group(['middleware' => ['auth']], function(){
//         // Updating
//         Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('idea.edit');

//         Route::put('/{idea}', [IdeaController::class, 'update'])->name('idea.update');

//         // Deleting
//         Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('ideas.destroy');

//         //    Comments    //
//         Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('idea.comments.store');
//     });
// });

Route::resource('ideas', IdeaController::class)->except(['index', 'create', 'show'])->middleware('auth');

Route::resource('ideas', IdeaController::class)->only(['show']);

Route::resource('ideas.comments', CommentController::class)->only(['store'])->middleware('auth');

Route::resource('users', UserController::class)->only('show') ;
Route::resource('users', UserController::class)->only('edit', 'update')->middleware('auth') ;

Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

// Follower
Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('users.follow');

Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');

// Likes
Route::post('ideas/{idea}/like', [IdeaLikeController::class, 'like'])->middleware('auth')->name('ideas.like');

Route::post('ideas/{idea}/dislike', [IdeaLikeController::class, 'dislike'])->middleware('auth')->name('ideas.dislike');

// Feed
Route::get('/feed', FeedController::class)->middleware('auth')->name('feed');


Route::get('/terms', function () {
    return view('terms');
})->name('terms');


// Author
Route::get('/author', [AuthorDashboardController::class, 'index'])->middleware(['auth', 'adminAndAuthor'])->name('author.dashboard');


// Admin
Route::middleware(['auth', 'admin'])->prefix('/admin')->as('admin.')->group(function(){
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [AdminUserController::class, 'index'])->name('users');
    Route::get('/ideas', [AdminIdeaController::class, 'index'])->name('ideas');
});


