@extends('templates.main')
@section('content')
    @include('partials.page_header')
    <!-- Google map -->
	<div class="map" id="map-area"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0YyDTa0qqOjIerob2VTIwo_XVMhrruxo"></script>
	<script src="js/map.js"></script>
@endsection