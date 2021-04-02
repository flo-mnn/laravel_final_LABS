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
use App\Models\About;
use App\Models\Carousel;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Email;
use App\Models\Footer;
use App\Models\Image;
use App\Models\JobTitle;
use App\Models\Map;
use App\Models\Navlink;
use App\Models\Office;
use App\Models\Post;
use App\Models\PostAutoValidate;
use App\Models\Service;
use App\Models\Subject;
use App\Models\Tag;
use App\Models\Testimonial;
use App\Models\Title;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

// main site pages (Home, Services, Blog, Blog-post, Contact)
Route::get('/', function () {
    // find ceo among users
    foreach (User::all() as $user) {
        foreach ($user->job_titles as $job_title) {
            if ($job_title->id == 1) {
                $ceo = $user;
            }
        }
    };
    // find two random members
    $collection = User::all();
    
    $noCeos = $collection->reject(function ($value, $key) {
        foreach (User::all() as $user) {
            foreach ($user->job_titles as $job_title) {
                if ($job_title->id == 1) {
                    $boss = $user;
                }
            }
        };
        return $value->id == $boss->id;
    });

    // split titles
    $newTitles = [];
    foreach (Title::all()->skip(1) as $title) {
        $str =  Str::of($title->title)->replace('[', '<span>');
        
        $newTitle =  Str::of($str)->replace(']', '</span>'); 
        array_push($newTitles, $newTitle);
    };

    return view('home',[
        'abouts'=>About::all(),
        'carousels'=>Carousel::all(),
        'categories'=>Category::all(),
        'comments'=>Comment::all(),
        'contacts'=>Contact::first(),
        // 'emails'=>Email::all(),
        'footers'=>Footer::first(),
        'images'=>Image::all(),
        'job_titles'=>JobTitle::all(),
        'maps'=>Map::first(),
        'navlinks'=>Navlink::all(),
        // 'newsletters'=>Newsletter::all(),
        'offices'=>Office::first(),
        'posts'=>Post::all(),
        // 'roles'=>Role::all(),
        'services'=>Service::all(),
        'subjects'=>Subject::all(),
        'tags'=>Tag::all(),
        'testimonials'=>Testimonial::all(),
        'title_carousel'=>Title::first(),
        'titles'=>$newTitles,
        'users'=>User::all(),
        'ceo'=>$ceo,
        'members'=>$noCeos->random(2),
        'videos'=>Video::first(),
    ]);
});
Route::get('/services', function () {
    // split titles
    $newTitles = [];
    foreach (Title::all()->skip(1) as $title) {
        $str =  Str::of($title->title)->replace('[', '<span>');
        
        $newTitle =  Str::of($str)->replace(']', '</span>'); 
        array_push($newTitles, $newTitle);
    };
    return view('services',[
        'abouts'=>About::all(),
        'carousels'=>Carousel::all(),
        'categories'=>Category::all(),
        'comments'=>Comment::all(),
        'contacts'=>Contact::first(),
        // 'emails'=>Email::all(),
        'footers'=>Footer::first(),
        'images'=>Image::all(),
        'job_titles'=>JobTitle::all(),
        'maps'=>Map::first(),
        'navlinks'=>Navlink::all(),
        // 'newsletters'=>Newsletter::all(),
        'offices'=>Office::first(),
        'posts'=>Post::all(),
        // 'roles'=>Role::all(),
        'services'=>Service::all(),
        'subjects'=>Subject::all(),
        'tags'=>Tag::all(),
        'testimonials'=>Testimonial::all(),
        'titles'=>$newTitles,
        'users'=>User::all(),
        'videos'=>Video::first(),
        'header_current'=>Navlink::find(2)->link,
    ]);
});
Route::get('/blog', function () {
    $posts_ps = [];
    foreach (Post::all()->sortByDesc('created_at') as $post) {
        $post_ps = preg_split('/\r\n|\r|\n/', $post->content);
        array_push($posts_ps, $post_ps);
    };

    $posts = Post::orderBy('created_at','DESC')
                    ->paginate(3);

    // dd($posts);
    return view('blog',[
        'abouts'=>About::all(),
        'carousels'=>Carousel::all(),
        'categories'=>Category::all(),
        'comments'=>Comment::all(),
        'contacts'=>Contact::first(),
        // 'emails'=>Email::all(),
        'footers'=>Footer::first(),
        'images'=>Image::all(),
        'job_titles'=>JobTitle::all(),
        'maps'=>Map::first(),
        'navlinks'=>Navlink::all(),
        // 'newsletters'=>Newsletter::all(),
        'offices'=>Office::first(),
        'posts'=>$posts,
        'posts_ps'=>$posts_ps,
        // 'roles'=>Role::all(),
        'services'=>Service::all(),
        'subjects'=>Subject::all(),
        'tags'=>Tag::all(),
        'testimonials'=>Testimonial::all(),
        'users'=>User::all(),
        'videos'=>Video::first(),
        'header_current'=>Navlink::find(3)->link,
    ]);
});
Route::get('/blog-post', function () {
    $posts_ps = [];
    foreach (Post::all()->sortByDesc('created_at') as $post) {
        $post_ps = preg_split('/\r\n|\r|\n/', $post->content);
        array_push($posts_ps, $post_ps);
    };
    return view('blog_post',[
        'abouts'=>About::all(),
        'carousels'=>Carousel::all(),
        'categories'=>Category::all(),
        'comments'=>Comment::all(),
        'contacts'=>Contact::first(),
        // 'emails'=>Email::all(),
        'footers'=>Footer::first(),
        'images'=>Image::all(),
        'job_titles'=>JobTitle::all(),
        'maps'=>Map::first(),
        'navlinks'=>Navlink::all(),
        // 'newsletters'=>Newsletter::all(),
        'offices'=>Office::first(),
        // test before show:
        'post'=>Post::first(),
        'post_ps'=>$posts_ps[0],
        'posts'=>Post::all(),
        'posts_ps'=>$posts_ps,

        // 'roles'=>Role::all(),
        'services'=>Service::all(),
        'subjects'=>Subject::all(),
        'tags'=>Tag::all(),
        'testimonials'=>Testimonial::all(),
        'users'=>User::all(),
        'videos'=>Video::first(),
        'header_current'=>Navlink::find(3)->link,
    ]);
});
Route::get('/contact', function () {
    return view('contact',[
        'abouts'=>About::all(),
        'carousels'=>Carousel::all(),
        'categories'=>Category::all(),
        'comments'=>Comment::all(),
        'contacts'=>Contact::first(),
        // 'emails'=>Email::all(),
        'footers'=>Footer::first(),
        'images'=>Image::all(),
        'job_titles'=>JobTitle::all(),
        'maps'=>Map::first(),
        'navlinks'=>Navlink::all(),
        // 'newsletters'=>Newsletter::all(),
        'offices'=>Office::first(),
        'posts'=>Post::all(),
        // 'roles'=>Role::all(),
        'services'=>Service::all(),
        'subjects'=>Subject::all(),
        'tags'=>Tag::all(),
        'testimonials'=>Testimonial::all(),
        'users'=>User::all(),
        'videos'=>Video::first(),
        'header_current'=>Navlink::find(4)->link,
    ]);
});

// admin auth routes
Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

// customized routes from controllers


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
