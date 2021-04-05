@extends('templates.admin')

@section('admin-content')
<div class="d-flex justify-content-between">
    <h1>MANAGE YOUR TESTIMONIALS</h1>
    <a href="/admin/testimonials/create" class="btn btn-primary rounded-0 px-4"><i class="fas fa-plus"></i></a>
</div>
<table class="table table-primary table-hover table-responsive my-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col" >Name</th>
        <th scope="col">Job Title</th>
        <th scope="col">Picture</th>
        <th scope="col">Text</th>
        <th scope="col" colspan="2"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($testimonials->sortByDesc('created_at') as $testimonial)
           <tr>
            <th scope="row">{{count($testimonials) - ($loop->iteration -1)}}</th>
            <td>{{$testimonial->name}}</td>
            <td>{{$testimonial->job_title}}</td>
            <td>{{$testimonial->text}}</td>
            <td><div style="overflow: hidden; height: 60px; width: 60px;" class="rounded-circle"><img src="/storage/img/testimonial/{{$testimonial->src}}" alt="testimonial-avatar"></div></td>
            <td><a href="/admin/testimonials/{{$testimonial->id}}/edit" class="btn btn-dark text-success font-weight-bold rounded-0 px-4"><i class="fas fa-edit"></i></a></td>
            <td><form action="/admin/testimonials/{{$testimonial->id}}" method="POST">
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
