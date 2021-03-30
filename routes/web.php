<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\JobTitleController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\NavlinkController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TitleController;
use App\Models\JobTitle;
use App\Models\PostAutoValidate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});
Route::get('/services', function () {
    return view('services');
});
Route::get('/blog', function () {
    return view('blog');
});
Route::get('/blog-post', function () {
    return view('blog_post');
});
Route::get('/contact', function () {
    return view('contact');
});

Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

//resources
Route::resource('/admin/carousels',CarouselController::class);
Route::resource('/admin/categories', CategoryController::class);
Route::resource('/admin/comments', CommentController::class);
Route::resource('/admin/contacts',ContactController::class);
Route::resource('/admin/emails',EmailController::class);
Route::resource('/admin/footers',FooterController::class);
Route::resource('/admin/images',ImageController::class);
Route::resource('/admin/job_titles',JobTitleController::class);
Route::resource('/admin/maps',MapController::class);
Route::resource('/admin/navlinks',NavlinkController::class);
Route::resource('/admin/newsletters',NewsletterController::class);
Route::resource('/admin/offices',OfficeController::class);
Route::resource('/admin/post_auto_validates',PostAutoValidate::class);
Route::resource('/admin/posts',PostController::class);
Route::resource('/admin/roles',RoleController::class);
Route::resource('/admin/services',ServiceController::class);
Route::resource('/admin/subjects',SubjectController::class);
Route::resource('/admin/tags',TagController::class);
Route::resource('/admin/testimonials',TestimonialController::class);
Route::resource('/admin/titles',TitleController::class);
Route::resource('/admin/users',UserController::class);
Route::resource('/admin/videos',VideoController::class);
