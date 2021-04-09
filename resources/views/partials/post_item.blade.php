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
            <a class="link mr-2">{{$post->users->name}}</a>
            <span>
                @foreach ($post->tags->shuffle()->take(2) as $tag)
                    <a href="/blog/tags/{{$tag->id}}" class="text-capitalize {{$loop->iteration == 1 ? 'link' : null}}">{{$tag->tag}}{{$loop->iteration == 2 ? null : ', '}}</a>
                @endforeach
            </span>
            <a href="/blog/{{$post->id}}/#comments" class="link">{{count($post->comments)}} {{count($post->comments) >=2 ? 'Commments' : 'Comment'}}</a>
        </div>
            {!!Str::before($post->content,'</p>')!!}</p>
        <a href="/blog/{{$post->id}}" class="read-more">Read More</a>
    </div>
</div>