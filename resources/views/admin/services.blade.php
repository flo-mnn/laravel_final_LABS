@extends('templates.admin')

@section('admin-content')
<div class="d-flex justify-content-between">
    <h1>MANAGE YOUR SERVICES</h1>
    <a href="/admin/services/create" class="btn btn-primary rounded-0 px-4"><i class="fas fa-plus"></i></a>
</div>
<table class="table table-primary table-hover table-responsive my-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col" >Icon</th>
        <th scope="col">Title</th>
        <th scope="col">Text</th>
        <th scope="col" colspan="2"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($services as $service)
           <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td><i class="{{$service->icon}} h3"></i></td>
            <td>{{$service->title}}</td>
            <td>{{$service->text}}</td>
            <td><a href="/admin/services/{{$service->id}}/edit" class="btn btn-dark text-success font-weight-bold rounded-0 px-4"><i class="fas fa-edit"></i></a></td>
            <td><form action="/admin/services/{{$service->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-dark text-danger rounded-0 px-4"><i class="fas fa-trash"></i></button>
                </form>
            </td>
          </tr>
        @endforeach
    </tbody>
</table>
@endsection
