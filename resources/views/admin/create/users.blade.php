@extends('templates.admin')

@section('admin-content')
<section>
    <h1 class="text-primary text-uppercase">Add a new team member</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/admin/users" class="p-5 my-3 bg-success" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Picture <span class="text-primary">*</span></label>
            <input type="file" class="form-control" name="src">
        </div>
        <div class="form-group">
            <label>Name <span class="text-primary">*</span></label>
            <input type="text" class="form-control" name="name" placeholder="The new member's name" value="{{old('name')}}">
        </div>
        <div class="form-group">
            <label>Job Title <span class="text-primary">*</span></label>
            <select name="job_title_id[]" class="form-control">
                @if (old('job_title_id'))
                @foreach ($job_titles as $job_title)
                @if (in_array($job_title->id, old('job_title_id')))
                <option value="{{$job_title->id}}" selected>{{$job_title->job_title}}</option>
                @else
                <option value="{{$job_title->id}}">{{$job_title->job_title}}</option>
                @endif
                @endforeach
                @else
                @foreach ($job_titles as $job_title)
                <option value="{{$job_title->id}}">{{$job_title->job_title}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="form-group">
            <label>Email <span class="text-primary">*</span></label>
            <input type="text" class="form-control" name="email" placeholder="The new member's email" value="{{old('email')}}">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3" placeholder="The new member's description">{{old('description')}}</textarea>
        </div>
        <div class="form-group">
            <label>Role <span class="text-primary">*</span></label>
            <select name="role_id" class="form-control">
                @if (old('role_id'))
                @foreach ($roles as $role)
                @if (old('role_id')==$role->id))
                <option value="{{$role->id}}" selected>{{$role->role}}</option>
                @else 
                @endif
                @endforeach
                @else 
                @foreach ($roles as $role)
                <option value="{{$role->id}}">{{$role->role}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <button type="submit" class="site-btn btn-2" ><i class="fas fa-check"></i></button>
    </form>
    
</section>
@endsection
