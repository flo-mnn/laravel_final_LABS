@extends('templates.admin')

@section('admin-content')
<div class="d-flex justify-content-between">
    <h1>MANAGE YOUR SLIDER IMAGES</h1>
    {{-- <a href="/admin/carousels/create" class="btn btn-primary rounded-0 px-4"><i class="fas fa-plus"></i></a> --}}
</div>
<table class="table table-primary table-hover mt-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Slider Title</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
           <tr>
            <th scope="row">Current Title</th>
            <td>
                <form action="/admin/titles/{{$titles->id}}" method="POST" id="title">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <input type="text" class="form-control my-auto" name="title" value="{{old('title') ? old('title') : $titles->title}}">
                </div>
                </form>
            </td>
            <td><input type="submit" form="title" id="submitSliderT" class="d-none"><label class="site-btn btn-1" for="submitSliderT" style="cursor: pointer"><i class="fas fa-check"></i></label>
            </td>
          </tr>
    </tbody>
</table>
<table class="table table-primary table-hover mb-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Picture</th>
        <th scope="col" >Edit</th>
        <th scope="col" colspan="2"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($carousels as $carousel)
           <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td><img src="/storage/img/carousel/{{$carousel->src}}" alt="carousel-img" width="300"></td>
            <td>
                <form action="/admin/carousels/{{$carousel->id}}" method="POST" id="carousel{{$carousel->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input type="file" name="src">
                </form>
            </td>
            <td><input type="submit" form="carousel{{$carousel->id}}" id="inputEdit{{$carousel->id}}" class="d-none"><label for="inputEdit{{$carousel->id}}" class="btn btn-dark text-success font-weight-bold rounded-0 px-4"><i class="fas fa-check"></label></i></td>
            <td>
                @if ($loop->iteration != 1)
                <form action="/admin/carousels/{{$carousel->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-dark text-danger rounded-0 px-4"><i class="fas fa-trash"></i></button>
                </form>
                @endif
            </td>
          </tr>
        @endforeach
        <tr>
            <th scope="row"><i class="fas fa-plus-square"></i></th>
            <td colspan="4">
                <h4 class="text-primary mb-2">Add an image</h4>
                <form action="/admin/carousels" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" name="src">
                </div>
                <button class="site-btn btn-1"><i class="fas fa-plus"></i></button>
                </form>
            </td>
        </tr>
    </tbody>
</table>
@endsection
