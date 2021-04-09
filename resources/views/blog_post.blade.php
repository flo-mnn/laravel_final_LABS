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
    @can('post-edit',$post)
    <div class="bg-dark p-3 mb-5 w-75">
        <h3 class="text-primary">Manage this blog post</h3>
        <div class="my-3 py-3 px-5 d-flex justify-content-around">
            <a href="/admin/posts/{{$post->id}}/edit" class="btn btn-transparent text-success"><i class="fas fa-edit"></i></a>
            <form action="/admin/posts/{{$post->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-transparent text-danger"><i class="fas fa-trash"></i></button>
            </form>
        </div>
    </div>
    @endcan
    <div class="post-content">
        <h2 class="post-title">{{$post->title}}</h2>
        <div class="post-meta">
            <a class="link mr-2">{{$post->users->name}}</a>
            <span>
                @foreach ($post->tags as $tag)
                    <a href="/blog/tags/{{$tag->id}}" class="text-capitalize {{$loop->iteration == 1 ? 'link' : null}}">{{$tag->tag}}{{$loop->iteration == count($post->tags) ? null : ', '}}</a>
                @endforeach
            </span>
            <a href="#comments" class="link">{{count($post->comments)}} {{count($post->comments) >=2 ? 'Commments' : 'Comment'}}</a>
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
    <div class="comments" id="comments">
        <h2>Comments ({{count($post->comments)}})</h2>
        <ul class="comment-list">
            @foreach ($post->comments->sortByDesc('created_at') as $comment)
            <li>
                @if ($comment->user_id)
                <div class="avatar" style="background-image: url('/storage/img/team/{{$comment->users->src}}')">
                    {{-- <img src="{{asset('/storage/img/avatar/01.jpg')}}" alt=""> --}}
                </div>
                <div class="commetn-text">
                    <div class="d-flex">
                        <h3>{{$comment->users->name}} | {{$comment->created_at->format('d M Y')}}</h3>
                        @can('comment-destroy')
                        <form action="{{URL::route('comments.destroy',$comment->id)}}#comments" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-transparent text-danger"><i class="fas fa-trash"></i></button>
                        </form>
                        @endcan
                    </div>
                    <p>{{$comment->comment}} </p>
                </div>
                @else
                <div class="avatar" style="background-image: url('/storage/img/team/avatar.png')">
                </div>
                <div class="commetn-text">
                    <div class="d-flex">
                        <h3>{{$comment->comment_users->name}} | {{$comment->created_at->format('d M Y')}}</h3>
                        @can('comment-destroy')
                        <form action="{{URL::route('comments.destroy',$comment->id)}}#comments" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-transparent text-danger"><i class="fas fa-trash"></i></button>
                        </form>
                        @endcan
                    </div>
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
            <form class="form-class" action="{{ URL::route('comments.store') }}#comments" method="POST">
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