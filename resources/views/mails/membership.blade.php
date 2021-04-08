<style>
    div {
        text-align: center;
        background-color: lightgray;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
    }
    h1 {
        color: #A0E6C2;
        background-color: #8B64C4;
        padding: 10px;
    }

    a {
        color: #8B64C4;
    }
    p {
        align-self: flex-start;
        margin: 15px 20%;
    }

    span {
        background-color: #A0E6C2;
        color: #8B64C4;
    }

    .slash {
        color: initial;
    }
</style>
<div>
    <h1>You've been approved!</h1>

    <h2>{{$membership->name}}, it's official! </h2>
    <p>Your new job as our <span>
        @foreach ($membership->job_titles as $job_title)
        {{$job_title->job_title}} 
        @if ($loop->iteration != count($membership->job_titles))
        <span class="slash"> / </span>
        @endif
        @endforeach 
    </span>
    begins!
    </p>
    <p>To login, please go to <a href="{{ config('app.url') }}/login">{{ config('app.url') }}/login</a></p>

    <h4>
        The {{ config('app.name') }} Team
    </h4>
</div>