@extends('templates.admin')

@section('admin-content')
<div class="d-flex justify-content-between">
    <h1>ABOUT US</h1>
    {{-- <a href="/admin/carousels/create" class="btn btn-primary rounded-0 px-4"><i class="fas fa-plus"></i></a> --}}
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
<h3 class="text-success">Text</h3>
<table class="table table-primary table-hover mt-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">About Text</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        <form action="/admin/abouts/1" method="POST" id="abouts">
        @csrf
        @method('PATCH')
        @foreach ($abouts as $about)
        <tr>
         <th scope="row">Part {{$loop->iteration}}</th>
         <td>
             <div class="form-group">
                 <textarea class="form-control"name="text{{$loop->iteration}}">{{old('text'.$loop->iteration) ? old('text'.$loop->iteration) : $about->text}}</textarea>
             </div>
         </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="3"><input type="submit" form="abouts" id="submit" class="d-none"><label class="site-btn btn-1" for="submit" style="cursor: pointer"><i class="fas fa-check"></i></label>
            </td>
        </tr>
        </form>
    </tbody>
</table>
<h3 class="text-success">Presentation Video</h3>
<table class="table table-primary table-hover mb-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Source</th>
        <th scope="col" >Edit</th>
      </tr>
    </thead>
    <tbody>
        <form action="/admin/videos/{{$videos->id}}" id="videoForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <tr>
                <th scope="row"></th>
                <td><img src="/storage/img/{{$videos->src}}" width="300" alt="video-cover"></td>
                <td><input type="file" name="src"></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td colspan="2">
                    <div class="form-group">
                        <input type="text" name="href" value="{{old('href') ? old('href') : $videos->href}}" class="form-control">
                    </div>
                </td>
            </tr>
        </form>
        <tr>
            <td scope="row" colspan="3">
                <input type="submit" id="submitVideo" form="videoForm" class="d-none"><label for="submitVideo" class="site-btn btn-1" style="cursor: pointer"><i class="fas fa-check"></i></label>
            </td>
        </tr>
    </tbody>
</table>
@endsection
