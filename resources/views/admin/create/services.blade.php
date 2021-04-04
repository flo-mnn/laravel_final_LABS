@extends('templates.admin')

@section('admin-content')
<section>
    <h1 class="text-primary text-uppercase">Add a service</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/admin/services" class="p-5 my-3 bg-success" method="POST">
        @csrf
        <div class="form-group">
            <label for="icon"></label>
            <select name="icon" id="icon" class="form-control">
                @foreach ($flaticons as $flaticon)
                <option value="{{$flaticon->icon}}">{{$flaticon->icon}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" value="{{old('title')}}" placeholder="Your Service Title" name="title">
        </div>
        <div class="form-group">
            <textarea type="text" class="form-control" rows="5" placeholder="Your Service Description" name="text">{{old('text')}}</textarea>
        </div>
        <button type="submit" class="site-btn btn-2" ><i class="fas fa-check"></i></button>
    </form>
</section>
@endsection
