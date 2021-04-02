@extends('templates.blog')
@section('blog-content')
@foreach ($posts as $post)
@include('partials.post_item')
@endforeach
{{$posts->links()}}
@endsection
