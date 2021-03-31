@extends('templates.main')
@section('content')
    @include('partials.page_header')
    <!-- Google map -->
	{{-- <div class="map" id="map-area"></div> --}}
    <div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q={{$maps->address}}+()&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div>

    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0YyDTa0qqOjIerob2VTIwo_XVMhrruxo"></script>
	<script src="js/map.js"></script> --}}
@endsection