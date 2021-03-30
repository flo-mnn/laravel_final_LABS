<!-- features section -->
<div class="team-section spad">
    <div class="overlay"></div>
    <div class="container">
        <div class="section-title">
            <h2>Get in <span>the Lab</span> and  discover the world</h2>
        </div>
        <div class="row">
            <!-- feature item -->
            <div class="col-md-4 col-sm-4 features">
                @foreach ($services->sortByDesc('created_at')->take(3) as $service)
                <div class="icon-box light left">
                    <div class="service-text">
                        <h2>{{$service->title}}</h2>
                        <p>{{$service->text}}</p>
                    </div>
                    <div class="icon">
                        <i class="{{$service->icon}}"></i>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Devices -->
            <div class="col-md-4 col-sm-4 devices">
                <div class="text-center">
                    <img src="{{asset('/storage/img/device.png')}}" alt="">
                </div>
            </div>
            <!-- feature item -->
            <div class="col-md-4 col-sm-4 features">
                @foreach ($services->sortByDesc('created_at')->take(6)->take(-3) as $service)
                <div class="icon-box light">
                    <div class="icon">
                        <i class="{{$service->icon}}"></i>
                    </div>
                    <div class="service-text">
                        <h2>{{$service->title}}</h2>
                        <p>{{$service->text}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="text-center mt100">
            <a href="#services-cards" class="site-btn">Browse</a>
        </div>
    </div>
</div>
<!-- features section end-->