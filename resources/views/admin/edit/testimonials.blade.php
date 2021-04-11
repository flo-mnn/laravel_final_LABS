@extends('templates.admin')

@section('admin-content')
<section>
    <h1 class="text-primary text-uppercase">Edit a testimonial</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/admin/testimonials/{{$testimonial->id}}" class="p-5 my-3 bg-primary" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group fileParent">
            <img src="/storage/img/testimonial/{{old('src') ? old('src') : $testimonial->src}}" alt="" width="80">
            <label for=""> <span class="text-success">Add a picture ONLY if you want to change the current one</span></label>
            <input type="file" class="form-control" name="src" onchange="previewFile(event)">
        </div>
        <div class="form-group">
            <label for=""><span class="text-success">*</span></label>
            <input type="text" class="form-control" value="{{old('name') ? old('name') : $testimonial->name}}" placeholder="Their name" name="name">
        </div>
        <div class="form-group">
            <label for=""><span class="text-success">*</span></label>
            <input type="text" class="form-control" value="{{old('job_title') ? old('job_title') : $testimonial->job_title}}" placeholder="Their Job Title" name="job_title">
        </div>
        <div class="form-group">
            <label for=""><span class="text-success">*</span></label>
            <textarea type="text" class="form-control" rows="5" placeholder="Their review" name="text">{{old('text') ? old('text') : $testimonial->text}}</textarea>
        </div>
        <button type="submit" class="site-btn btn-1" ><i class="fas fa-check"></i></button>
    </form>
</section>
@endsection
