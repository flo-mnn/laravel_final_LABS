@extends('templates.blog')
@section('blog-content')    
@if ($posts->isNotEmpty())
    @foreach ($posts as $post)
        @include('partials.post_item')
    @endforeach
@else
    <div>
        <h3 class="text-muted">no post found</h3>
    </div>
@endif
@endsection