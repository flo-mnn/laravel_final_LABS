@extends('templates.admin')

@section('admin-content')
<div class="d-flex justify-content-between">
    <h1>MANAGE USERS</h1>
    <a href="/admin/users/create" class="btn btn-primary rounded-0 px-4"><i class="fas fa-plus"></i></a>
</div>
<table class="table table-primary table-hover my-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Role</th>
        <th scope="col" >Job Title</th>
        <th scope="col">Email</th>
        <th scope="col">Last Connexion</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users->sortByDesc('created_at') as $user)
      <tr class="{{!$user->validated ? 'bg-secondary' : null}} {{$user->job_titles->isEmpty()? 'bg-danger' : null}}">
        <th scope="row">{{count($users) - ($loop->iteration -1)}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->roles->role}}</td>
        <td>
            @foreach ($user->job_titles as $job_title)
                {{$job_title->job_title}} {{$loop->iteration == count($user->job_titles)? null : ', '}}
            @endforeach
        </td>
        <td>{{$user->email}}</td>
        <td>
            @if (!$user->validated)
            <form action="/admin/users/{{$user->id}}/validate" method="POST">
                @csrf
                <button type="submit" class="btn btn-light text-primary font-weight-bold rounded-0 px-4"><i class="fas fa-user-check"></i></button>
                </form>
            @else
            @if ($user->last_login)
            {{ date('d M Y, H:i', strtotime($user->last_login))}}
            @endif
            @endif
        </td>
        <td><a href="/admin/users/{{$user->id}}" class="btn btn-dark text-success font-weight-bold rounded-0 px-4"><i class="fas fa-user"></i></a></td>
        <td>
          @can('admin')
            @if ($user->role_id != 1 && !$job_titles[0]->users->contains($user->id))
            <form action="/admin/users/{{$user->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-dark text-danger font-weight-bold rounded-0 px-4"><i class="fas fa-trash"></i></button>
            </form>
            @endif
          @endcan
        </td>
      </tr>
      @endforeach
    </tbody>
</table>
@endsection
