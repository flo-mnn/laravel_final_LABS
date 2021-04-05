@extends('templates.blog')
@section('blog-content')    
<!-- Single Post -->
<div class="single-post">
    <div class="post-thumbnail" style="background-image: url('/storage/img/blog/{{$post->src}}')">
        <div class="post-date">
            <h2>{{$post->created_at->format('d')}}</h2>
            <h3>{{$post->created_at->format('M')}} {{$post->created_at->format('Y')}}</h3>
        </div>
    </div>
    <div class="post-content">
        <h2 class="post-title">{{$post->title}}</h2>
        <div class="post-meta">
            <a href="">{{$post->users->name}}</a>
            <a href=""> @foreach ($post->tags as $tag)
                <span class="text-capitalize">{{$tag->tag}}{{$loop->iteration == count($post->tags) ? null : ', '}}</span>
            @endforeach</a>
            <a href="">{{count($post->comments)}} {{count($post->comments) >=2 ? 'Commments' : 'Comment'}}</a>
        </div>
        {!!$post->content!!}
    </div>
    <!-- Post Author -->
    <div class="author">
        <div class="avatar">
            <img src="/storage/img/team/{{$post->users->src}}" alt="">
        </div>
        <div class="author-info">
            <h2>{{$post->users->name}}, <span>Author</span></h2>
            <p>{{$post->users->description}}</p>
        </div>
    </div>
    <!-- Post Comments -->
    <div class="comments">
        <h2>Comments ({{count($post->comments)}})</h2>
        <ul class="comment-list">
            @foreach ($post->comments->sortByDesc('created_at') as $comment)
            <li>
                @if ($comment->user_id)
                <div class="avatar" style="background-image: url('/storage/img/team/{{$comment->users->src}}')">
                    {{-- <img src="{{asset('/storage/img/avatar/01.jpg')}}" alt=""> --}}
                </div>
                <div class="commetn-text">
                    <h3>{{$comment->users->name}} | {{$comment->created_at->format('d M Y')}}</h3>
                    <p>{{$comment->comment}} </p>
                </div>
                @else
                <div class="avatar" style="background-image: url('/storage/img/team/avatar.png')">
                </div>
                <div class="commetn-text">
                    <h3>{{$comment->comment_users->name}} | {{$comment->created_at->format('d M Y')}}</h3>
                    <p>{{$comment->comment}} </p>
                </div>
                @endif
                
            </li>
            @endforeach
        </ul>
    </div>
    <!-- Commert Form -->
    <div class="row">
        <div class="col-md-9 comment-from">
            <h2>Leave a comment</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="form-class" action="/admin/comments/" method="POST">
                @csrf
                <input type="number" class="d-none" value="{{$post->id}}" name="post_id">
                @if (Auth::check())
                <div class="row">
                    @else
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" name="name" placeholder="Your name">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" name="email" placeholder="Your email">
                    </div>
                @endif
                    <div class="col-sm-12">
                        <textarea name="comment" placeholder="Message"></textarea>
                        <button class="site-btn" type="submit">send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection