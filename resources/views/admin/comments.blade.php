@extends('templates.admin')

@section('admin-content')
<div class="d-flex justify-content-between">
    <h1>MANAGE BLOG COMMENTS</h1>
    @if ($comments->where('validated',0)->isNotEmpty())
    <form action="{{route('comments.validate.all')}}" method="POST">
        @csrf
        <button type="submit" class="btn btn-secondary text-success font-weight-bold rounded-0 px-4"><i class="fas fa-book-reader"></i> validate all</button>
    </form>
    @endif
</div>
<table class="table table-primary table-hover table-responsive my-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col" >Author</th>
        <th scope="col">Comment</th>
        <th scope="col">Post</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($comments->sortByDesc('created_at') as $comment)
            <tr class="{{!$comment->validated? 'bg-secondary' : null}}">
                <th scope="row">{{count($comments)-($loop->iteration -1)}}</th>
                @if ($comment->user_id)
                <td>{{$comment->users->name}}</td>
                @else
                <td>{{$comment->comment_users->name}}</td>
                @endif
                <td>{{$comment->comment}}</td>
                <td><a href="/blog/{{$comment->posts->id}}" target="_blank">post</a></td>
                <td>
                    @if (!$comment->validated)
                    <form action="/admin/comments/{{$comment->id}}/validate" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-light text-success font-weight-bold rounded-0 px-4"><i class="fas fa-book-reader"></i></button>
                    </form>
                    @endif
                </td>
                <td><form action="{{URL::route('comments.destroy',$comment->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-transparent text-danger"><i class="fas fa-trash"></i></button>
                </form></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
