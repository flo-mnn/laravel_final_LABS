@extends('templates.admin')

@section('admin-content')
<section>
    <h1 class="text-success text-uppercase">Edit a blog post</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/admin/posts/{{$post->id}}" class="p-5 my-3 bg-primary" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <input type="text" class="form-control" value="{{old('title') ? old('title') : $post->title}}" placeholder="Your Blog Post Title" name="title">
        </div>
        <div class="form-group">
            <textarea type="text" class="form-control" rows="20" placeholder="Write your blog post here" name="content">{{old('content') ? old('content') : $content}}</textarea>
        </div>
        <div class="form-group">
            <label for="file" class="text-success">Select a new cover, DO NOT if you don't want to edit your cover</label>
            <input type="file" class="form-control" name="src" id="file">
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <label for="category" class="text-success">Select a category</label>
                <select name="category_id" id="category" class="form-control">
                    @foreach ($categories as $category)
                    @if ($category->id == $post->category_id)
                    <option selected value="{{$category->id}}">{{$category->category}}</option>
                    @endif
                    <option value="{{$category->id}}">{{$category->category}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="tag" class="text-success">Select one or multiple tag(s) <span class="text-muted" style="font-size: 10px;">press ctrl/command to select multiple</span></label>
                <select name="tag_id[]" id="tag" class="form-control" multiple>
                    @foreach ($tags as $tag)
                    @if ($post_tags->contains($tag->id))
                    <option value="{{$tag->id}}" selected>{{$tag->tag}}</option>
                    @else
                    <option value="{{$tag->id}}">{{$tag->tag}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="site-btn btn-1" ><i class="fas fa-check"></i></button>
    </form>
</section>
@endsection
