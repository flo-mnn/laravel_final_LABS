<!-- Intro Section -->
<div class="hero-section">
    <div class="hero-content">
        <div class="hero-center">
            <img src="/storage/img/{{$images[0]->src}}" alt="">
            <p>{{$titles[0]->title}}</p>
        </div>
    </div>
    <!-- slider -->
    <div id="hero-slider" class="owl-carousel">
        @foreach ($carousels as $carousel)
        <div class="item  hero-item" data-bg="/storage/img/carousel/{{$carousel->src}}"></div>
        @endforeach
    </div>
</div>
<!-- Intro Section -->