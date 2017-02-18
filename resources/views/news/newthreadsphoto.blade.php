<div class="marketing">

  @foreach($threadsphoto as $thread)
  <div class="col-md-4">
    <div class="well">
      <div class="media">
        <a href="/{{$thread->user->slug}}" class="pull-left">
          @if($thread->user->img)
            <img src="{{asset('/img/users/'.$thread->user->img )}}" class="media-object img-circle">
          @else
            <img src=" {{$thread->user->getAvatar()}}" class="media-object img-circle">
          @endif
        </a>        
        <a href="/{{$thread->user->slug}}"> {{$thread->user->getName()}} </a><br>
        <a href="/tags/{{$thread->tag->slug}}" class="pull-left btn btn-danger btn-xs" style="color: white !important;"><img id="icon" src="/background/tag.svg">{{$thread->tag->name}}</a>
        <small class="pull-right">{{$thread->created_at->diffForHumans()}}</small>
      </div>
      <div class="media">
        <a href="/threads/{{$thread->slug}} ">
          <img src="{{asset('/img/threads/'.$thread->img )}}" class="media-object img-responsive" style="display: block;margin: 0 auto;">
        </a>
      </div>
      <div class="title_show">
        <b><a href="/threads/{{$thread->slug}} ">{{$thread->title}}</a></b>
      </div>
      <div class="panel-footer"><a href="/threads/{{$thread->slug}} ">{{$thread->countComments()}} komentar</a></div>
    </div>
  </div>
  @endforeach

</div>