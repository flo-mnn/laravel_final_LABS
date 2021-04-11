@extends('templates.admin')

@section('admin-content')
<section>
    <h1 class="text-success text-uppercase">Edit {{Auth::id() == $user->id? 'my Profile' : $user->name."'s Profile"}}</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/admin/users/{{$user->id}}" class="p-5 my-3 bg-primary" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group fileParent">
            <img src="/storage/img/team/{{old('src') ? old('src') : $user->src}}" alt="" width="300">
            <label>Picture <span class="text-success">(add a picture ONLY if you want to change your current one)</span></label>
            <input type="file" class="form-control" name="src" onchange="previewFile(event)">
        </div>
        <div class="form-group">
            <label>Name <span class="text-success">*</span></label>
            <input type="text" class="form-control" name="name" placeholder="The new member's name" value="{{old('name')? old('name') : $user->name}}">
        </div>
        @if ($job_titles[0]->users->contains($user->id))
            @if (count($job_titles[0]->users)>2)
            <div class="form-group">
                <label>Job Title <span class="text-success">*</span></label>
                <select {{$polyvalent ? 'multiple' : null}} name="job_title_id[]" class="form-control">
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
                    @if ($user->job_titles->contains($job_title->id))
                    <option value="{{$job_title->id}}" selected>{{$job_title->job_title}}</option>
                    @else
                    <option value="{{$job_title->id}}">{{$job_title->job_title}}</option>
                    @endif
                    @endforeach
                    @endif
                </select>
            </div>
            @endif
        @else
        <div class="form-group">
            <label>Job Title <span class="text-success">*</span></label>
            <select {{$polyvalent ? 'multiple' : null}} name="job_title_id[]" class="form-control">
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
                @if ($user->job_titles->contains($job_title->id))
                <option value="{{$job_title->id}}" selected>{{$job_title->job_title}}</option>
                @else
                <option value="{{$job_title->id}}">{{$job_title->job_title}}</option>
                @endif
                @endforeach
                @endif
            </select>
        </div>
        @endif
        <div class="form-group">
            <label>Email <span class="text-success">*</span></label>
            <input type="text" class="form-control" name="email" placeholder="The new member's email" value="{{old('email')? old('email') : $user->email}}">
        </div>
        <div class="form-group">
            <label>Description <span class="text-success">*</span></label>
            <textarea name="description" class="form-control" rows="3" placeholder="The new member's description">{{old('description')? old('description') : $user->description}}</textarea>
        </div>
        @can('user-edit-admin')
        @if ($user->role_id != 1 || count($user->roles->users) > 1)
        <div class="form-group">
            <label>Role <span class="text-success">*</span></label>
            <select name="role_id" class="form-control">
            @if (old('role_id'))
                @foreach ($roles as $role)
                @if (old('role_id')==$role->id))
                <option value="{{$role->id}}" selected>{{$role->role}}</option>
                @else 
                <option value="{{$role->id}}">{{$role->role}}</option>
                @endif
                @endforeach
            @else
                @foreach ($roles as $role)
                @if ($user->role_id == $role->id))
                <option value="{{$role->id}}" selected>{{$role->role}}</option>
                @else
                <option value="{{$role->id}}">{{$role->role}}</option>
                @endif
                @endforeach
            @endif
            </select>
        </div>
        @endif
        @endcan
        <button type="submit" class="site-btn btn-1" ><i class="fas fa-check"></i></button>
    </form>
    
</section>
@endsection
