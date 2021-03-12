<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Website\FrontPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//front end======================================================
Route::get('/',[FrontPostController::class,'home']);
Route::get('/sample-post/{id}',[FrontPostController::class,'post']);
Route::get('about.us/{id}',[FrontPostController::class,'about_page']);
Route::get('contact-us/{id}',[FrontPostController::class,'contact_page']);
Route::post('/contact_submit',[FrontPostController::class,'contact_submit']);

// for admin dashboard ulr---------------
Route::get('/admin',[DashboardController::class,'index']);
// for post url===================================================
Route::get('/admin/all_post',[PostController::class,'all_post']);
Route::view('/admin/add_post', 'admin.post.add');
Route::post('/admin/submit_post',[PostController::class,'submit_post']);
Route::get('/admin/delete_post/{id}',[PostController::class,'delete_post']);
Route::get('/admin/edit_post/{id}',[PostController::class,'edit_post']);
Route::post('/admin/update_post/{id}',[PostController::class,'update_post']);

// for pages url================================================================
Route::get('/admin/all_page',[PageController::class,'all_page']);
Route::view('/admin/add_page', 'admin.page.add');
Route::post('/admin/submit_page',[PageController::class,'submit_page']);
Route::get('/admin/delete_page/{id}',[PageController::class,'delete_page']);
Route::get('/admin/edit_page/{id}',[PageController::class,'edit_page']);
Route::post('/admin/update_page/{id}',[PageController::class,'update_page']);

// contact us page===========================================================
Route::get('/admin/contact_page',[ContactController::class,'contact_page']);

Route::view('front', 'layouts.index');
Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
// Route::middleware(['AdminAuth'])->group(function () {
//     Route::get('/admin',[DashboardController::class,'index']);
//     Route::view('/admin/add_post', 'admin.post.add');
//     Route::view('/admin/all_post', 'admin.post.all');
// });
