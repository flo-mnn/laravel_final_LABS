@extends('templates.admin')

@section('admin-content')
<div class="d-flex justify-content-between">
    <h1>MANAGE BLOG POSTS</h1>
    <a href="/admin/posts/create" class="btn btn-primary rounded-0 px-4"><i class="fas fa-plus"></i></a>
</div>
<div class="row justify-content-end mt-4">
  <div class="col-md-5 d-flex flex-column align-items-end">
      <form action="/admin/post_auto_validates/{{$post_auto_validates->id}}" method="POST" id="switchForm">
          @csrf
          @method('PATCH')
      <div class="custom-control custom-switch">
              @if ($post_auto_validates->post_auto_validate)
              <input onchange="switchOnOff()" checked type="checkbox" class="custom-control-input" id="validatePosts"   name="validate">
              <label  class="custom-control-label" for="validatePosts">Switch off auto-validate for entering posts</label>
              @else
              <input onchange="switchOnOff()" type="checkbox" class="custom-control-input" id="validatePosts"   name="validate">
              <label  class="custom-control-label" for="validatePosts">Automatically validate entering posts</label>
              @endif
              <button type="submit" id="validateSubmit" class="d-none">submit</button>
      </div>
      </form>
  </div>
</div>
<table class="table table-primary table-hover my-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col" >Author</th>
        <th scope="col">Date</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
      @foreach ($posts->sortByDesc('created_at') as $post)
      <tr class="{{!$post->validated ? 'bg-secondary' : null}}">
        <th scope="row">{{count($posts)-($loop->iteration -1)}}</th>
        <td>{{$post->title}}</td>
        <td>{{$post->users->name}}</td>
        <td>{{$post->created_at->format('d M Y')}}</td>
        <td>
          @if (!$post->validated)
          <form action="/admin/posts/{{$post->id}}/validate" method="POST">
              @csrf
              <button type="submit" class="btn btn-light text-primary font-weight-bold rounded-0 px-4"><i class="fas fa-book-reader"></i></button>
              </form>
          @endif
        </td>
        <td><a href="/blog/{{$post->id}}" class="btn btn-dark text-success font-weight-bold rounded-0 px-4"><i class="fab fa-readme"></i></a></td>
      </tr>
      @endforeach
      @else
      @foreach ($posts->where('user_id',Auth::id())->sortByDesc('created_at') as $post)
      <tr class="{{!$post->validated ? 'bg-secondary' : null}}">
        <th scope="row">{{count($posts)-($loop->iteration -1)}}</th>
        <td>{{$post->title}}</td>
        <td>{{$post->users->name}}</td>
        <td>{{$post->created_at->format('d M Y')}}</td>
        <td>
          @if (!$post->validated)
          under validation
          @endif
        </td>
        <td><a href="/blog/{{$post->id}}" class="btn btn-dark text-success font-weight-bold rounded-0 px-4"><i class="fab fa-readme"></i></a></td>
      </tr>
      @endforeach
      @endif
    </tbody>
</table>
@endsection
