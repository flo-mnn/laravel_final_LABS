@extends('templates.admin')

@section('admin-content')
<div class="d-flex justify-content-between">
    <h1>EDIT YOUR COPYRIGHT</h1>
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
<h3 class="text-success mt-3">Navigation Links</h3>
<table class="table table-primary table-hover mt-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Copyright <span class="text-success">*</span></th>
        <th scope="col">Designed By</th>
        <th scope="col">Designer Name</th>
        <th scope="col">Designer Website</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        <form action="/admin/footers/{{$footers->id}}" method="POST">
            @csrf
            @method('PATCH')
            <tr>
                <th scope="row">#</th>
                <td><div class="form-group"><input class="form-control" type="text" name="copyright" value="{{old('copyright') ? old('copyright') : $footers->copyright}}"></div></td>
                <td><div class="form-group"><input class="form-control" type="text" name="designed_by" value="{{old('designed_by') ? old('designed_by') : $footers->designed_by}}"></div></td>
                <td><div class="form-group"><input class="form-control" type="text" name="designer" value="{{old('designer') ? old('designer') : $footers->designer}}"></div></td>
                <td><div class="form-group"><input class="form-control" type="text" name="href" value="{{old('href') ? old('href') : $footers->href}}"></div></td>
                <td><button type="submit" class="site-btn btn-1"><i class="fas fa-check"></i></button></td>
            </tr>
        </form>
    </tbody>
</table>
@endsection
