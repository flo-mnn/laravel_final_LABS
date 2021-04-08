<style>
    div {
        text-align: center;
        background-color: lightgray;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
    }
    h5 {
        text-align: right;
    }
</style>
<div>
    <p>{{$contact->message}}</p>
    <h5>from {{$contact->name}}</h5>
</div>