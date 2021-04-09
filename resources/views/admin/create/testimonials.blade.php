@extends('templates.admin')

@section('admin-content')
<section>
    <h1 class="text-primary text-uppercase">Add a testimonial</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/admin/testimonials" class="p-5 my-3 bg-success text-primary" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">*</label>
            <input type="file" class="form-control" name="src">
        </div>
        <div class="form-group">
            <label for="">*</label>
            <input type="text" class="form-control" value="{{old('name')}}" placeholder="Their name" name="name">
        </div>
        <div class="form-group">
            <label for="">*</label>
            <input type="text" class="form-control" value="{{old('job_title')}}" placeholder="Their Job Title" name="job_title">
        </div>
        <div class="form-group">
            <label for="">*</label>
            <textarea type="text" class="form-control" rows="5" placeholder="Their review" name="text">{{old('text')}}</textarea>
        </div>
        <button type="submit" class="site-btn btn-2" ><i class="fas fa-check"></i></button>
    </form>
</section>
@endsection
