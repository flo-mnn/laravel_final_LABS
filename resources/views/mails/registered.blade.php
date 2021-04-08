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
        margin: 0 20%;
    }
</style>
<div>
    <h1>Welcome to our team {{$registered['name']}}</h1>
    <p>Your password is: {{$registered['password']}}</p>
    @if (!$registered['validated'])
    <p>Please wait for our webmaster to approve your membership. As soon as your membership is confirmed, you will receive an email.</p>
    @else
    <p>To login, please go to <a href="{{ config('app.url') }}/login">{{ config('app.url') }}/login</a></p>
    @endif

    <h4>
        The {{ config('app.name') }} Team!
    </h4>
</div>