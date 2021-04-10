@extends('templates.admin')

@section('admin-content')
<section>
    <div class="p-5 bg-primary">
        <h1 class="text-success text-uppercase mb-4">Home Page Newsletter Text</h1>
        <div>
            <form action="/admin/titles/newsletter" method="POST">
            @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="title" value="{{old('title') ? old('title') : $titles[7]->title}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="subtitle" value="{{old('subtitle') ? old('subtitle') : $titles[8]->title}}">
                </div>
            <button type="submit" class="site-btn btn-1"><i class="fas fa-check"></i></button>
            </form>
        </div>
    </div>
    <h1 class="text-primary text-uppercase mt-5">Write a newsletter</h1>
    <span class="text-dark">{{count($newsletters)}} subscribers</span>
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
