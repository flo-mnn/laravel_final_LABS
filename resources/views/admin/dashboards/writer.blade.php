@extends('templates.admin')

@section('admin-content')
<section class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 mx-3 my-4 p-4 text-light bg-primary align-items-center justif-content-center" style="height: 300px;">
            <a href="/admin/posts/create"><h1 class="text-success mb-3">Write a new article <i class="fas fa-pen"></i></h1></a>
            @if ($posts->where('user_id',Auth::id())->sortByDesc('created_at')->take(1)->isNotEmpty())
                @if ($posts->where('user_id',Auth::id())->sortByDesc('created_at')->take(1)[0]->validated)
                <h4>Your last post has been published!</h4>
                @else
                <h4>Your last post is still being reviewed</h4>
                @endif
            @endif
        </div>
        <div class="col-md-5 mx-3 my-4 p-2 text-light bg-success align-items-center" style="height: 300px;">
            <div class="bg-dark p-3 h-100 d-flex flex-column justify-content-around">
                <a href="/admin/posts"><h1 class="text-success mb-3"><i class="fas fa-comments"></i> Your last posts comments</h1></a>
                @foreach ($posts->where('user_id',Auth::id())->sortByDesc('created_at')->take(3) as $post)
                    <a href="/blog/{{$post->id}}" target="_blank"><h5 class="text-light">"{{$post->title}}" (<span class="text-success">{{count($post->comments->where('validated',1))}}</span> comments)</h5></a>
                @endforeach
            </div>
        </div>
    </div>

</section>
@endsection