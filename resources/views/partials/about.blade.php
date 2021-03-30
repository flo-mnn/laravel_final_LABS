<!-- About section -->
<div class="about-section">
    <div class="overlay"></div>
    <!-- card section -->
    <div class="card-section">
        <div class="container">
            <div class="row">
                @foreach ($services->shuffle()->take(3) as $service)
                <!-- single card -->
                <div class="col-md-4 col-sm-6">
                    <div class="lab-card">
                        <div class="icon">
                            <i class="{{$service->icon}}"></i>
                        </div>
                        <h2>{{$service->title}}</h2>
                        <p>{{$service->text}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- card section end-->


    <!-- About contant -->
    <div class="about-contant">
        <div class="container">
            <div class="section-title">
                <h2>Get in <span>the Lab</span> and discover the world</h2>
            </div>
            <div class="row">
                @foreach ($abouts as $about)
                <div class="col-md-6">
                    <p>{{$about->text}}</p>
                </div>
                @endforeach
            </div>
            <div class="text-center mt60">
                <a href="#team" class="site-btn">Browse</a>
            </div>
            <!-- popup video -->
            <div class="intro-video">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <img src="{{asset('/storage/img/video.jpg')}}" alt="">
                        <a href="{{$videos->href}}" class="video-popup">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About section end -->