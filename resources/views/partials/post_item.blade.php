<!-- Post item -->
<div class="post-item">
    <div class="post-thumbnail" style="background-image: url('/storage/img/blog/{{$post->src}}')">
        <div class="post-date">
            <h2>{{$post->created_at->format('d')}}</h2>
            <h3>{{$post->created_at->format('M')}} {{$post->created_at->format('Y')}}</h3>
        </div>
    </div>
    <div class="post-content">
        <h2 class="post-title">{{$post->title}}</h2>
        <div class="post-meta">
            <a href="">{{$post->users->name}}</a>
            <a href="">
                @foreach ($post->tags->shuffle()->take(2) as $tag)
                    <span class="text-capitalize">{{$tag->tag}}{{$loop->iteration == 2 ? null : ', '}}</span>
                @endforeach
            </a>
            <a href="">{{count($post->comments)}} {{count($post->comments) >=2 ? 'Commments' : 'Comment'}}</a>
        </div>
            {!!Str::before($post->content,'</p>')!!}</p>
        <a href="/blog/{{$post->id}}" class="read-more">Read More</a>
    </div>
</div>