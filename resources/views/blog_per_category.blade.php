@extends('templates.blog')
@section('blog-content')
{{-- use show --}}
@foreach ($posts as $post)
@include('partials.post_item')
@endforeach
@endsection