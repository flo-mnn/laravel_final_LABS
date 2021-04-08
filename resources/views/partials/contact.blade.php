<!-- Contact section -->
<div class="contact-section spad fix">
    <div class="container">
        <div class="row">
            <!-- contact info -->
            <div class="col-md-5 col-md-offset-1 contact-info col-push">
                <div class="section-title left">
                    <h2>{{$contacts->title}}</h2>
                </div>
                <p>{{$contacts->text}} </p>
                <h3 class="mt60">{{$offices->title}}</h3>
                <p class="con-item">{{$offices->street}}, {{$offices->number}} <br> {{$offices->postcode}} {{$offices->city}} {{$offices->country? '({$offices->country})' : null}} </p>
                @if ($offices->phone)
                <p class="con-item">{{$offices->phone}}</p>
                @endif
                <p class="con-item">{{$offices->email}}</p>
            </div>
            <!-- contact form -->
            <div class="col-md-6 col-pull">
                @if ($errors->contact->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->contact->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form class="form-class" id="con_form" action="{{route('emails.store')}}#con_form" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" name="name" placeholder="Your name">
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="email" placeholder="Your email">
                        </div>
                        <div class="col-sm-12">
                            <select name="subject_id">
                                @foreach ($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->subject}}</option>
                                @endforeach
                            </select>
                            <textarea name="message" placeholder="Message"></textarea>
                            <button class="site-btn" type="submit">send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>