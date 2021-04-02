<!-- Testimonial section -->
<div class="testimonial-section pb100">
    <div class="test-overlay" style="background-image: url('/storage/img/{{$images[2]->src}}')"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-4">
                <div class="section-title left">
                <h2>{!!$titles[1]!!}</h2>
                </div>
                <div class="owl-carousel" id="testimonial-slide">
                    @foreach ($testimonials->sortByDesc('created_at')->take(6) as $testimonial)
                    <!-- single testimonial -->
                    <div class="testimonial">
                        <span>‘​‌‘​‌</span>
                        <p>{{$testimonial->text}}</p>
                        <div class="client-info">
                            <div class="avatar" style="background-image: url('/storage/img/testimonial/{{$testimonial->src}}');">
                            </div>
                            <div class="client-name">
                                <h2>{{$testimonial->name}}</h2>
                                <p>{{$testimonial->job_title}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial section end-->