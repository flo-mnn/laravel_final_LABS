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
    <h1>{{$newsletter['title']}}</h1>
    <p>{{$newsletter['content']}}</p>
    <p></p>
    <p>Other news to come soon!</p>
    <h4>
        The {{ config('app.name') }} Team
    </h4>
    <a href="{{config('app.url')}}/unsubscribe/"><span class="text-muted">unsubscribe</span></a>
</div>