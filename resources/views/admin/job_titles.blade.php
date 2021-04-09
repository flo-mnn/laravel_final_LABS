@extends('templates.admin')

@section('admin-content')
<div class="d-flex justify-content-between">
    <h1>JOB TITLES</h1>
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
<table class="table table-primary table-hover mt-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Job Title</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($job_titles as $job_title)
        <tr>
         <th scope="row">{{$loop->iteration}}</th>
         <td>
             <form action="/admin/job_titles/{{$job_title->id}}" id="job_title{{$job_title->id}}" method="POST">
             @csrf
             @method('PATCH')
             <div class="form-group">
                 <input type="text" class="form-control" name="job_title" value="{{old('job_title') ? old('job_title') : $job_title->job_title}}">
             </div>
             </form>
         </td>
         <td>
             <div class="d-flex justify-content-end">
                 <input type="submit" form="job_title{{$job_title->id}}" id="submitJob{{$job_title->id}}" class="d-none"><label class="btn btn-dark text-success rounded-0 px-4" for="submitJob{{$job_title->id}}" style="cursor: pointer"><i class="fas fa-check"></i></label>
             </div>
         </td>
         <td>
             @if ($loop->iteration != 1)
             <div class="d-flex justify-content-end">
                 <form action="/admin/job_titles/{{$job_title->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-dark text-danger rounded-0 px-4"><i class="fas fa-trash"></i></button>
                </form>
             </div>
             @endif
         </td>
       </tr>
        @endforeach
    </tbody>
</table>
@endsection
