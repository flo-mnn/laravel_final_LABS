@extends('templates.blog')
@section('blog-content')
{{-- for now, after pagination to doooo --}}
@foreach ($posts->sortByDesc('created_at')->take(3) as $post)
@include('partials.post_item')
@endforeach
@endsection
