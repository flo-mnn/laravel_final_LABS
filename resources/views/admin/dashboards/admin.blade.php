@extends('templates.admin')

@section('admin-content')
<section class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 mx-3 my-4 p-4 text-light bg-primary align-items-center" style="height: 300px;">
            <a href="/admin/users"><h1 class="text-success mb-3">Welcome your last new members  <i class="fas fa-users"></i></h1></a>
            @foreach ($users->sortByDesc('created_at')->take(3) as $user)
                <h3>{{$user->name}}</h3>
            @endforeach
        </div>
        <div class="col-md-5 mx-3 my-4 p-2 text-light bg-success align-items-center" style="height: 300px;">
            <div class="bg-dark p-3 h-100 d-flex flex-column justify-content-around">
                <a href="/admin/posts"><h1 class="text-success mb-3">Read the last posts  <i class="fas fa-newspaper"></i></h1></a>
                @foreach ($posts->where('validated',1)->sortByDesc('created_at')->take(3) as $post)
                    <h5>"{{$post->title}}"</h5>
                @endforeach
            </div>
        </div>
        @if ($users->where('validated',0)->isEmpty() && $posts->where('validated',0)->isEmpty() && $posts->where('category_id',null)->isEmpty() && $comments->where('validated',0)->isEmpty())
        <div class="col-md-10 mx-3 my-4 p-2 bg-warning align-items-center">
            <div class="bg-light text-dark p-3">
                <h1>No news for now, everything is running smoothly <span class="text-warning"><i class="fas fa-fan"></i></span></h1>
            </div>
        </div>    
        @else
        <div class="col-md-10 mx-3 my-4 p-2 bg-danger align-items-center">
            <div class="bg-light text-dark p-3">
                @if ($users->where('validated',0)->isNotEmpty())
                <a href="/admin/users">
                    <h1 class="text-dark"><i class="fas fa-user"></i><span class="text-danger"> {{count($users->where('validated',0))}}</span> users to approve</h1>
                </a>
                @endif
                @if ($posts->where('validated',0)->isNotEmpty())
                <a href="/admin/posts">
                    <h1 class="text-dark"><i class="fas fa-newspaper"></i><span class="text-danger"> {{count($posts->where('validated',0))}}</span> posts to validate</h1>
                </a>
                @endif
                @if ($comments->where('validated',0)->isNotEmpty())
                <a href="/admin/posts">
                    <h1 class="text-dark"><i class="fas fa-comments"></i><span class="text-danger"> {{count($comments->where('validated',0))}}</span> comments from non-members to validated</h1>
                </a>
                @endif
                @if ($posts->where('category_id',null)->isNotEmpty())
                <a href="/admin/posts">
                    <h1 class="text-dark"><i class="fas fa-newspaper"></i><span class="text-danger"> {{count($posts->where('category_id',null))}}</span> posts without a category</h1>
                </a>
                @endif
            </div>
        </div>
        @endif
    </div>

</section>
@endsection