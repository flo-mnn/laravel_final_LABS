@extends('templates.admin')

@section('admin-content')
<section>
    <h1 class="text-primary text-uppercase">Write a newsletter</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <form action="/newsletters/send" class="p-5 my-3 bg-success" method="POST">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" value="{{old('title')}}" placeholder="Your Newsletter Title" name="title">
        </div>
        <div class="form-group">
            <textarea type="text" class="form-control" rows="20" placeholder="Write your Newsletter here" name="content">{{old('content')}}</textarea>
        </div>
        <button type="submit" class="site-btn btn-2" ><i class="fas fa-envelope"></i></button>
    </form>
</section>
@endsection
