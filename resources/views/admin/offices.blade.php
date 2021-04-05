@extends('templates.admin')

@section('admin-content')
<section>
    <div>
        <h1>UPDATE YOUR CONTACT INFO</h1>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/admin/offices/{{$offices->id}}" class="p-5 my-3 bg-primary" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-row mb-3 p-1">
                <label for="text">Contact Us Text <span class="text-success">*</span></label>
                <textarea class="form-control" id="text" name="text">{{old('text') ? old('text') : $contacts->text}}</textarea>
        </div>
        <div class="form-row">
            <div class="col-md-9 mb-3">
            <label for="street">Street <span class="text-success">*</span></label>
            <input type="text" class="form-control" id="street" name="street" value="{{old('street') ? old('street') : $offices->street}}">
            </div>
            <div class="col-md-3 mb-3">
            <label for="number">Number <span class="text-success">*</span></label>
            <input type="number" class="form-control" id="number" name="number" value="{{old('number') ? old('number') : $offices->number}}">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3 mb-3">
                <label for="postcode">ZIP <span class="text-success">*</span></label>
                <input type="text" class="form-control" id="postcode" name="postcode" value="{{old('postcode') ? old('postcode') : $offices->postcode}}">
            </div>
            <div class="col-md-6 mb-3">
            <label for="city">City <span class="text-success">*</span></label>
            <input type="text" class="form-control" id="city" name="city" value="{{old('city') ? old('city') : $offices->city}}">
            </div>
            <div class="col-md-3 mb-3">
            <label for="country">Country</label>
            <input type="text" class="form-control" name="country" id="country" value="{{old('country') ? old('country') : $offices->country}}">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-9 mb-3">
            <label for="email">Email <span class="text-success">*</span></label>
            <input type="email" class="form-control" id="email" value="{{old('email') ? old('email') : $offices->email}}" name="email">
            </div>
            <div class="col-md-3 mb-3">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone') ? old('phone') : $offices->phone}}">
            </div>
        </div>
        <button class="site-btn btn-1" type="submit"><i class="fas fa-check"></i></button>
    </form>
</section>
@endsection
