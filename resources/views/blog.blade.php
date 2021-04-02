@extends('templates.blog')
@section('blog-content')
{{-- for now, after pagination to doooo --}}
@foreach ($posts as $post)
@include('partials.post_item')
@endforeach
{{$posts->links()}}
@endsection
