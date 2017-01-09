<div class="marketing">

  @if($threads->count())
      <h4 class="text-center">new threads</h4>
      <hr>
  @endif

  @foreach($threads as $thread)
    <div class="col-md-4">
      <div class="media">
        <a href="/{{$thread->user->getName()}}" class="pull-left">
            <img src=" {{$thread->user->getAvatar()}}" class="media-object img-circle" onerror="this.style.display='none'">
            <img src="{{asset('/img/users/'.$thread->user->getAvatar() )}}" class="media-object img-circle" onerror="this.style.display='none'">
        </a>        
        <a href="/{{$thread->user->getName()}}"> {{$thread->user->getName()}} </a><br>
        <a href="/tags/{{$thread->tag->name}}" class="pull-left btn btn-danger btn-xs" style="color: white !important;"><img id="icon" src="/background/tag.svg">{{$thread->tag->name}}</a>
        <small class="pull-right">{{$thread->created_at->diffForHumans()}}</small>
      </div>

      <a href="/threads/{{$thread->slug}} ">{{str_limit($thread->title, 50)}}</a>
      <hr>
      <div class="fb-like" data-href="http://fidawa.com/threads/{{$thread->slug}}" data-width="250" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
      <div class="panel-footer"><a href="/threads/{{$thread->slug}} ">{{$thread->countComments()}} commentar</a></div>
    </div>
  @endforeach

</div>