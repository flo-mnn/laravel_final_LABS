@extends('templates.admin')

@section('admin-content')
<section>
    <h1 class="text-primary text-uppercase">Write a blog post</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/admin/posts" class="p-5 my-3 bg-success text-primary" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">*</label>
            <input type="text" class="form-control" value="{{old('title')}}" placeholder="Your Blog Post Title" name="title">
        </div>
        <div class="form-group">
            <label for="">*</label>
            <textarea type="text" class="form-control" rows="20" placeholder="Write your blog post here" name="content">{{old('content')}}</textarea>
        </div>
        <div class="form-group fileParent">
            <img src="" alt="" class="img-fluid d-none">
            <label for="file" class="text-primary">Select a cover *</label>
            <input type="file" class="form-control" name="src" id="file" onchange="previewFile(event)">
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <label for="category" class="text-primary">Select a category *</label>
                <select name="category_id" id="category" class="form-control">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->category}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="tag" class="text-primary">Select one or multiple tag(s) *<span class="text-muted" style="font-size: 10px;">press ctrl/command to select multiple</span></label>
                <select name="tag_id[]" id="tag" class="form-control" multiple>
                    @foreach ($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->tag}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="site-btn btn-2" ><i class="fas fa-check"></i></button>
    </form>
</section>
@endsection
