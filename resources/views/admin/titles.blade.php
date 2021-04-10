@extends('templates.admin')

@section('admin-content')
<div class="d-flex justify-content-between">
    <h1>MANAGE TITLES & NAVIGATION LINKS</h1>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h3 class="text-success mt-3">Logo</h3>
<div class="row my-3 d-flex">
    <div class="col-md-6">
        <img src="/storage/img/{{$images[0]->src}}" alt="img-fluid" >
    </div>
    <form action="/admin/images/{{$images[0]->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="col-md-6">
            <div class="form-group">
                <input type="file" class="mb-5" name="src">
                <button type="submit" class="site-btn btn-1"><i class="fas fa-check"></i></button>
            </div>
        </div>
    </form>
</div>
<h3 class="text-success mt-3">Navigation Links</h3>
<table class="table table-primary table-hover mt-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Navigation Link</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($navlinks as $navlink)
        <tr>
         <th scope="row">{{$loop->iteration}}</th>
         <td>
             <form action="/admin/navlinks/{{$navlink->id}}" id="navlink{{$navlink->id}}" method="POST">
             @csrf
             @method('PATCH')
             <div class="form-group">
                 <input type="text" class="form-control" name="link" value="{{old('link') ? old('link') : $navlink->link}}">
             </div>
             </form>
         </td>
         <td>
             <div class="d-flex justify-content-end">
                 <input type="submit" form="navlink{{$navlink->id}}" id="submitNav{{$navlink->id}}" class="d-none"><label class="site-btn btn-1" for="submitNav{{$navlink->id}}" style="cursor: pointer"><i class="fas fa-check"></i></label>
             </div>
         </td>
       </tr>
        @endforeach
    </tbody>
</table>
<h3 class="text-success">Titles</h3>
<table class="table table-primary table-hover my-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        <tr class="bg-success">
            <th scope="row"><i class="fas fa-exclamation-circle"></i></th>
            <td colspan="2" class="text-primary font-weight-bold"><em>To highlight words, please use square brackets as such : "Get in [the lab]"</em></td>
        </tr>
        @foreach ($titles->skip(1)->slice(2) as $title)
        <tr>
         <th scope="row">{{$loop->iteration}}</th>
         <td>
             <form action="/admin/titles/{{$title->id}}" id="title{{$title->id}}" method="POST">
             @csrf
             @method('PATCH')
             <div class="form-group">
                 <input type="text" class="form-control" name="title" value="{{old('title') ? old('title') : $title->title}}">
             </div>
             </form>
         </td>
         <td>
             <div class="d-flex justify-content-end">
                 <input type="submit" form="title{{$title->id}}" id="submitTitle{{$title->id}}" class="d-none"><label class="site-btn btn-1" for="submitTitle{{$title->id}}" style="cursor: pointer"><i class="fas fa-check"></i></label>
             </div>
         </td>
       </tr>
        @endforeach
    </tbody>
</table>
@endsection
