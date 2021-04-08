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
    <h1>THANK YOU</h1>
    <p>You have subscribed to our newsletter with the following address : {{$newsletter->email}}</p>
    <p>Are you ready? You will receive all about our news very soon!</p>
    <h4>
        The {{ config('app.name') }} Team!
    </h4>
</div>