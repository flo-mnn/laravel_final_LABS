@extends('templates.admin')

@section('admin-content')
<div class="d-flex justify-content-between">
    <h1>MANAGE POSTS ARCHIVES</h1>
    @if ($archives->isNotEmpty())
    <form action="/admin/posts/archives/empty" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger rounded-0 px-4">empty archives <i class="fas fa-trash"></i></button>
    </form>
    @endif
</div>
<table class="table table-primary table-hover my-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col" >Author</th>
        <th scope="col">Date</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @if ($archives->isNotEmpty())
        @foreach ($archives->sortByDesc('created_at') as $archive)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$archive->title}}</td>
                <td>{{$archive->users->name}}</td>
                <td>{{$archive->created_at->format('d M Y')}}</td>
                <td>
                    <form action="/admin/posts/archives/{{$archive->id}}/restore" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-dark text-success rounded-0 px-4">restore</button>
                    </form>
                </td>
            </tr>
        @endforeach
        @else
            <tr>
                <td  colspan="5" class="text-center">archive is empty</td>
            </tr>
        @endif
            
    </tbody>
</table>
@endsection
