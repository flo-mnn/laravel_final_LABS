@extends('templates.main')
@section('content')
<div class="" style="padding-top: 100px;">

    <form action="/unsubscribe/complete" class="m-5 p-5" method="POST">
        @csrf
        <input type="email" name="email" placeholder="example@mail.com">
        <button type="submit" class="site-btn btn-2">unsubscribe</button>
    </form>
</div>
@endsection