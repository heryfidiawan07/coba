<div class="marketing">

  @if($hotsthreads->count())
      <h4 class="text-center">top threads</h4>
      <hr>
  @endif

  @foreach($hotsthreads as $hotsthread)
    <div class="col-md-4">
      <div class="media">
        <a href="/{{$hotsthread->user->getName()}}" class="pull-left">
            <img src=" {{$hotsthread->user->getAvatar()}}" class="media-object img-circle" onerror="this.style.display='none'">
            <img src="{{asset('/img/users/'.$hotsthread->user->getAvatar() )}}" class="media-object img-circle" onerror="this.style.display='none'">
        </a>        
        <a href="/{{$hotsthread->user->getName()}}"> {{$hotsthread->user->getName()}} </a><br>
        <a href="/tags/{{$hotsthread->tag->name}}" class="pull-left btn btn-danger btn-xs" style="color: white !important;"><img id="icon" src="/background/tag.svg">{{$hotsthread->tag->name}}</a>
        <small class="pull-right">{{$hotsthread->created_at->diffForHumans()}}</small>
      </div>
      
        <div class="title_show"><b><a href="/threads/{{$hotsthread->slug}} ">{!!nl2br($hotsthread->title)!!}</a></b></div>
        <div class="body_show"><p>{!!nl2br($hotsthread->body)!!}</p></div>
      <div class="panel-footer"><a href="/threads/{{$hotsthread->slug}} ">{{$hotsthread->countComments()}} comment</a></div>
    </div>
  @endforeach

</div>