<!-- newsletter section -->
<div class="newsletter-section spad">
    @if ($errors->newsletter->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->newsletter->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('newsletter'))
        <div class="alert alert-primary">
            {{ session('newsletter') }}
        </div>
    @endif
    <div class="container" id="newsletter">
        <div class="row">
            <div class="col-md-3">
                <h2>Newsletter</h2>
            </div>
            <div class="col-md-9">
                <!-- newsletter form -->
                <form class="nl-form" action="{{route('newsletters.store')}}#newsletter"  method="POST">
                    @csrf
                    <input type="text" placeholder="Your e-mail here" name="email">
                    <button class="site-btn btn-2" type="submit">Newsletter</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- newsletter section end-->