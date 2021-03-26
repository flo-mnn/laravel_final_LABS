@extends('templates.blog')
@section('blog-content')    
@for ($i = 0; $i < 3; $i++)
    @include('partials.post_item')
@endfor
@endsection
