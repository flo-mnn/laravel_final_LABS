@extends('templates.admin')

@section('admin-content')
<div class="d-flex justify-content-between container mb-5">
    @can('user-edit',$user)
    <a href="/admin/users/{{$user->id}}/edit" class="btn btn-primary rounded-0 px-4"><i class="fas fa-user-edit"></i></a>
    @else
    <span></span>
    @endcan
    @if (Auth::id() == $user->id)
    <h1>My profile</h1>
    @else
    <h1>{{$user->name}}'s Profile</h1>
    @endif
</div>
<div class="container">
    <img src="/storage/img/team/{{$user->src}}" alt="" style="float: left;" class="mr-5 mb-5" height="350">
    <h6 class="px-3 py-2 bg-primary text-success">{{$user->roles->role}}</h6>
    <span class="text-muted">last connexion: 
        @if ($user->last_login)
            {{ date('d M Y, H:i', strtotime($user->last_login))}}
        @else
            no connexion yet
        @endif
    </span>
    <h1 class="text-primary my-3">{{$user->name}}</h1>
    <h5 class="my-4">{{$user->email}}</h5>
    <ul style="list-style-type: none;">
        @if ($user->job_titles->isEmpty())
            <li class="bg-danger text-light p-2">this user has no job title, please give them one</li>
        @else
        @foreach ($user->job_titles as $job_title)
        <li><span class="text-success font-weight-bold">-</span> {{$job_title->job_title}}</li>
        @endforeach
        @endif
    </ul>
    <p class="my-4"><span class="text-success h1">"</span>{{$user->description}}</p>
</div>
@endsection