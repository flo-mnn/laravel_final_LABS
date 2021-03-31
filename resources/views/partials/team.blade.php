<!-- Team Section -->
<div class="team-section spad" id="team">
    <div class="overlay">

    </div>
    <div class="container">
        <div class="section-title">
            <h2>Get in <span>the Lab</span> and  meet the team</h2>
        </div>
        <div class="row">
            <!-- single member -->
            <div class="col-sm-4">
                <div class="member">
                    <img src="/storage/img/team/{{$members[0]->src}}" alt="">
                    <h2>{{$members[0]->name}}</h2>
                    @foreach ($members[0]->job_titles as $job_title)
                    <h3>{{$job_title->job_title}}</h3>
                    @endforeach
                </div>
            </div>
            <!-- single member -->
            <div class="col-sm-4">
                <div class="member">
                    <img src="/storage/img/team/{{$ceo->src}}" alt="">
                    <h2>{{$ceo->name}}</h2>
                    @foreach ($ceo->job_titles as $job_title)
                    <h3>{{$job_title->job_title}}</h3>
                    @endforeach
                </div>
            </div>
            <!-- single member -->
            <div class="col-sm-4">
                <div class="member">
                    <img src="/storage/img/team/{{$members[1]->src}}" alt="">
                    <h2>{{$members[1]->name}}</h2>
                    @foreach ($members[1]->job_titles as $job_title)
                    <h3>{{$job_title->job_title}}</h3>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team Section end-->