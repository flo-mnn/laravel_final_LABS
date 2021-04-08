@extends('templates.admin')

@section('admin-content')
<div class="d-flex justify-content-between">
    <h1>MANAGE BLOG COMMENTS</h1>
</div>
<table class="table table-primary table-hover table-responsive my-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col" >Author</th>
        <th scope="col">Comment</th>
        <th scope="col">Post</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($comments->sortByDesc('created_at') as $comment)
            <tr>
                <th scope="row">{{count($comments)-($loop->iteration -1)}}</th>
                @if ($comment->user_id)
                <td>{{$comment->users->name}}</td>
                @else
                <td>{{$comment->comment_users->name}}</td>
                @endif
                <td>{{$comment->comment}}</td>
                <td><a href="/blog/{{$comment->posts->id}}" target="_blank">post</a></td>
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
