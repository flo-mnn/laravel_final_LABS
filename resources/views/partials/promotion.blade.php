<div class="promotion-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h2>{{$title[7]->title}}</h2>
                <p>{{$title[8]->title}}</p>
            </div>
            <div class="col-md-5">
                <div class="row justify-content-end" id="newsletter">
                    <div class="col-md-12 text-right">
                        <h2>Newsletter</h2>
                    </div>
                    <div class="col-md-12 d-flex flex-column align-items-end">
                        <!-- newsletter form -->
                        <form class="nl-form" action="{{route('newsletters.store')}}#newsletter"  method="POST">
                            @csrf
                            <input type="text" placeholder="Your e-mail here" name="email" class="w-100 text-right" >
                    </div>
                    <div class="col-md-12 text-right">
                        <button class="site-btn btn-2 mt-5" type="submit">Newsletter</button>
                        </form>
                        @if (session('newsletter'))
                        <p class="text-success p mt-5 p-3 bg-primary">{{ session('newsletter') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>