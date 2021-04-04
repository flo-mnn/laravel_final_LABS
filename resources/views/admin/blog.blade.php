@extends('templates.admin')

@section('admin-content')
<h1>BLOG OPTIONS</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{-- if time add post auto validate option --}}
{{-- categories --}}
<div class="d-flex justify-content-between mt-5">
    <h3>Categories</h3>
    <a href="/admin/categories/create" class="btn btn-primary rounded-0 px-4"><i class="fas fa-plus"></i></a>
</div>
<table class="table table-primary table-hover my-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Category Name</th>
        <th scope="col">n posts</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
           <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$category->category}}</td>
            <td> <span class="font-weight-bold">{{count($posts->where('category_id',$category->id))}}</span> posts</td>
            <td>
                <div class="d-flex justify-content-end">
                    <a href="/admin/categories/{{$category->id}}/edit" class="btn btn-dark text-success font-weight-bold rounded-0 px-4 mx-2"><i class="fas fa-edit"></i></a>
                    <form action="/admin/categories/{{$category->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-dark text-danger rounded-0 px-4 mx-2"><i class="fas fa-trash"></i></button>
                    </form>
                </div>
            </td>
            
          </tr>
        @endforeach
        <tr>
            <th scope="row"><i class="fas fa-plus-square"></i></th>
            <td colspan="3">
                <form action="/admin/categories" class="p-5 my-3 bg-success" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{old('category')}}" placeholder="Your New Category Name" name="category">
                    </div>
                    <button type="submit" class="site-btn btn-2"><i class="fas fa-plus"></i></button>
                </form>   
            </td>
        </tr>
    </tbody>
</table>
{{-- tags --}}
<div class="d-flex justify-content-between mt-5">
    <h3 class="">Tags</h3>
    <a href="/admin/tags/create" class="btn btn-primary rounded-0 px-4"><i class="fas fa-plus"></i></a>
</div>
<table class="table table-primary table-hover my-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tag Name</th>
        <th scope="col">n posts</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($tags as $tag)
           <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$tag->tag}}</td>
            <td> <span class="font-weight-bold">{{count($tag->posts)}}</span> posts</td>
            <td>
                <div class="d-flex justify-content-end">
                    <a href="/admin/tags/{{$tag->id}}/edit" class="btn btn-dark text-success font-weight-bold rounded-0 px-4 mx-2"><i class="fas fa-edit"></i></a>
                    <form action="/admin/tags/{{$tag->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-dark text-danger rounded-0 px-4 mx-2"><i class="fas fa-trash"></i></button>
                    </form>
                </div>
            </td>
            
          </tr>
        @endforeach
        <tr>
            <th scope="row"><i class="fas fa-plus-square"></i></th>
            <td colspan="3">
                <form action="/admin/tags" class="p-5 my-3 bg-success" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{old('tag')}}" placeholder="Your New Tag Name" name="tag">
                    </div>
                    <button type="submit" class="site-btn btn-2"><i class="fas fa-plus"></i></button>
                </form>   
            </td>
        </tr>
    </tbody>
</table>
@endsection
