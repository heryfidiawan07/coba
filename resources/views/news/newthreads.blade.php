<div class="marketing">

  @if($threads->count())
      <h4 class="text-center">new threads</h4>
      <hr>
  @endif

  @foreach($threads as $thread)
    <div class="col-md-4">
      <div class="media">
        <a href="/{{$thread->user->getName()}}" class="pull-left">
          @if($thread->user->img == null)
            <img src=" {{$thread->user->getAvatar()}}" class="media-object img-circle">
          @else
            <img src="{{asset('/img/users/'.$thread->user->getAvatar() )}}" class="media-object img-circle">
          @endif
        </a>        
        <a href="/{{$thread->user->getName()}}"> {{$thread->user->getName()}} </a><br>
        <a href="/tags/{{$thread->tag->name}}" class="pull-left btn btn-danger btn-xs" style="color: white !important;"><img id="icon" src="/background/tag.svg">{{$thread->tag->name}}</a>
        <small class="pull-right">{{$thread->created_at->diffForHumans()}}</small>
      </div>

      <a href="/threads/{{$thread->slug}} ">{{str_limit($thread->title, 50)}}</a>
      <div class="panel-footer"><a href="/threads/{{$thread->slug}} ">{{$thread->countComments()}} commentar</a></div>
    </div>
  @endforeach

</div>