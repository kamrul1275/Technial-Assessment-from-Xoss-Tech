<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;


use App\Http\Controllers\Backend\AdminController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';











// Home Start


Route::get('/',[HomeController::class,'Index'])->name('home.index');


// middleare used
Route::middleware(['auth'])->group(function(){

Route::get('/dashboard',[HomeController::class,'Dashboard'])->name('dashboard');


Route::get('/create/post',[PostController::class,'CreatePost'])->name('create.post');
Route::post('/store/post',[PostController::class,'StorePost'])->name('store.post');

Route::get('/all/post',[PostController::class,'AllPost'])->name('all.post');

Route::get('/edit/post/{id}',[PostController::class,'postEdit'])->name('edit.post'); 

Route::post('/update/post/{id}',[PostController::class,'updatePost'])->name('update.post'); 


Route::get('/delete/post/{id}',[PostController::class,'postDelete'])->name('delete.post');




Route::get('/view/post/{id}',[CommentController::class,'ViewPost'])->name('view.post');

Route::post('/store/comment/{id}',[CommentController::class,'storeComment'])->name('store.comment');



});


// Admin part strat


Route::get('/admin/login',[AdminController::class,'AdminLogin'])->name('admin.login');

Route::post('/admin/login',[AdminController::class,'AdminLogin'])->name('admin.login.store');


Route::group(['middleware' => ['admin']], function () {


    Route::get('/admin/dashboard',[AdminController::class,'AdminDashboard'])->name('admin.dashboard');


    Route::get('/admin/logout',[AdminController::class,'AdminLogout'])->name('admin.logout');
});



