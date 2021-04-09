<?php

use App\Http\Controllers\AboutController;
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
use App\Http\Controllers\PostAutoValidateController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
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
        'contacts'=>Contact::first(),
        'footers'=>Footer::first(),
        'images'=>Image::all(),
        'navlinks'=>Navlink::all(),
        'offices'=>Office::first(),
        'services'=>Service::all(),
        'subjects'=>Subject::all(),
        'testimonials'=>Testimonial::all(),
        'title_carousel'=>Title::first(),
        'titles'=>$newTitles,
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
    $services = Service::orderBy('created_at','DESC')
                    ->paginate(9);
    return view('services',[
        'contacts'=>Contact::first(),
        'footers'=>Footer::first(),
        'images'=>Image::all(),
        'navlinks'=>Navlink::all(),
        'offices'=>Office::first(),
        'posts'=>Post::where('validated',1)->get(),
        'services'=>$services,
        'subjects'=>Subject::all(),
        'titles'=>$newTitles,
        'header_current'=>Navlink::find(2)->link,
    ]);
});
Route::get('/blog', function () {
    $posts = Post::orderBy('created_at','DESC')
                    ->where('validated',1)
                    ->paginate(3);

    return view('blog',[
        'categories'=>Category::all(),
        'comments'=>Comment::all(),
        // 'contacts'=>Contact::first(),
        'footers'=>Footer::first(),
        'images'=>Image::all(),
        'navlinks'=>Navlink::all(),
        'posts'=>$posts,
        'tags'=>Tag::all(),
        'header_current'=>Navlink::find(3)->link,
    ]);
});
Route::get('/contact', function () {
    return view('contact',[
        'contacts'=>Contact::first(),
        'footers'=>Footer::first(),
        'images'=>Image::all(),
        'maps'=>Map::first(),
        'navlinks'=>Navlink::all(),
        'offices'=>Office::first(),
        'subjects'=>Subject::all(),
        'header_current'=>Navlink::find(4)->link,
    ]);
});

// admin auth routes
Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

// additionnal routes
Route::get('/admin/blog',function(){
    return view('admin.blog',[
        'categories'=>Category::all(),
        'tags'=>Tag::all(),
        'post_auto_validates'=>PostAutoValidate::find(1),
        'posts'=>Post::all(),
        'currentPage'=>'Blog Options',
        'middlePage'=>null,
    ]);
})->name('admin.blog');

Route::get('/unsubscribe',function(){
    return view('unsubscribe',[
        'contacts'=>Contact::first(),
        'footers'=>Footer::first(),
        'images'=>Image::all(),
        'navlinks'=>Navlink::all(),
        'offices'=>Office::first(),
        'subjects'=>Subject::all(),
    ]);
});
// customized routes from controllers

Route::post('/admin/users/{user}/validate',[UserController::class,'validation']);
Route::get('/admin/password/{user}',[UserController::class,'editPassword'])->name('users.password.edit');
Route::post('/admin/password/{user}',[UserController::class,'password'])->name('users.password');
Route::get('/blog/{post}',[PostController::class, 'show']);
Route::get('/blog/categories/{category}',[CategoryController::class, 'show']);
Route::get('/blog/tags/{tag}',[TagController::class, 'show']);
Route::get('/search/', [PostController::class, 'search'])->name('search');
Route::post('/admin/posts/{post}/validate',[PostController::class,'validation']);
Route::post('/unsubscribe/complete',[NewsletterController::class, 'unsubscribe']);
Route::post('/newsletters/send',[NewsletterController::class, 'send']);
Route::get('/admin/posts/archives',[PostController::class, 'archives']);
Route::post('/admin/posts/archives/{id}/restore',[PostController::class, 'restorePost']);
Route::post('/admin/posts/archives/empty',[PostController::class, 'empty']);




//resources
Route::resource('/admin/abouts',AboutController::class);
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
Route::resource('/admin/post_auto_validates',PostAutoValidateController::class);
Route::resource('/admin/posts',PostController::class);
Route::resource('/admin/roles',RoleController::class);
Route::resource('/admin/services',ServiceController::class);
Route::resource('/admin/subjects',SubjectController::class);
Route::resource('/admin/tags',TagController::class);
Route::resource('/admin/testimonials',TestimonialController::class);
Route::resource('/admin/titles',TitleController::class);
Route::resource('/admin/users',UserController::class);
Route::resource('/admin/videos',VideoController::class);
