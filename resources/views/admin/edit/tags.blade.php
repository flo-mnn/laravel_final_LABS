@extends('templates.admin')

@section('admin-content')
<section>
    <h1 class="text-success text-uppercase">Edit a tag</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/admin/tags/{{$tag->id}}" class="p-5 my-3 bg-primary" method="POST">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" value="{{old('tag')? old('tag') : $tag->tag}}" name="tag">
        </div>
        <button type="submit" class="site-btn btn-1"><i class="fas fa-check"></i></button>
    </form>
</section>
@endsection
