<!-- services card section-->
<div class="services-card-section spad" id="services-cards">
    <div class="container">
        <div class="row">
            @foreach ($posts->sortByDesc('created_at')->take(3) as $post)
            <!-- Single Card -->
            <div class="col-md-4 col-sm-6">
                <div class="sv-card">
                    <div class="card-img">
                        <img src="{{asset('/storage/img/card-1.jpg')}}" alt="">
                    </div>
                    <div class="card-text">
                        <h2>{{$post->title}}</h2>
                        <p>{{Str::limit($post->content,120)}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- services card section end-->