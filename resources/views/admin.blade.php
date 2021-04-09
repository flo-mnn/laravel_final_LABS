@extends('templates.admin')

@section('admin-content')
<section class="container">
  @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
    @include('admin.dashboards.admin')
  @elseif(Auth::user()->role_id == 3)
    @include('admin.dashboards.writer')
  @else
  <?php 
  $user=Auth::user(); 
  ?>
    @include('admin.profile')
  @endif
</section>
@endsection
