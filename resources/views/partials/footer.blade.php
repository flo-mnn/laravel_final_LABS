<!-- Footer section -->
<footer class="footer-section">
    <h2>{{$footers->copyright}}. {{$footers->designed_by ? $footers->designed_by : null}} 
        @if ($footers->designer)
        <a href="{{$footers->href? $footers->href : null }}" target="_blank">{{$footers->designer}}</a></h2>
        @endif
</footer>
<!-- Footer section end -->