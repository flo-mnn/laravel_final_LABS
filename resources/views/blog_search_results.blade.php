@extends('templates.blog')
@section('blog-content')    
@if ($posts->isNotEmpty())
<div class="site-accordions">
    <div class="panel-group" id="accordion">
        @foreach ($posts as $post)
        <div class="panel">
            <div class="panel-heading">
                <a href="/blog/{{$post->id}}" target="_blank"><h4 class="panel-title text-light">"{{$post->title}}" - by <span class="text-muted">{{$post->users->name}}</span> ({{$post->created_at->format('d M Y')}})</h4></a>
                <a data-toggle="collapse" data-parent="#accordion" href="#accordion{{$loop->iteration}}" class="accordion"></a>
            </div>
            <div id="accordion{{$loop->iteration}}" class="panel-collapse collapse">
                <div class="panel-body">
                    {!!Str::before($post->content,'</p>')!!}</p>
                    <div class="d-flex justify-content-end">
                        <a href="/blog/{{$post->id}}" class="read-more mt-2">read more</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@else
    <div>
        <div class="d-flex justify-content-center p-5 bg-success">
            <h3 class="text-muted"><i class="fas fa-unlink"></i> no post found</h3>
        </div>
    </div>
@endif
@endsection