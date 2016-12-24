<div class="marketing">

  @if($hotsthreads->count())
      <h4 class="text-center">Threads Top Comment</h4>
      <hr>
  @endif

  @foreach($hotsthreads as $hotsthread)
    <div class="col-md-3">
      <div class="media">
        <a href="/{{$hotsthread->user->getName()}}" class="pull-left">
            <img src=" {{$hotsthread->user->getAvatar()}} " alt="" class="media-object img-circle" onerror="this.style.display='none'">
            <img src="{{asset('/img/users/'.$hotsthread->user->getAvatar() )}}" class="media-object img-circle" onerror="this.style.display='none'">
        </a>        
        <a href="/{{$hotsthread->user->getName()}}"> {{$hotsthread->user->getName()}} </a><br>
        <small class="pull-right">{{$hotsthread->created_at->diffForHumans()}}</small>
        <p class="pull-left">{{$hotsthread->tag->name}}</p>
      </div>

      <a href="/threads/{{$hotsthread->slug}} ">{{$hotsthread->title}}</a>
      <p>{{$hotsthread->body}}</p>
      <div class="panel-footer"><a href="/threads/{{$hotsthread->slug}} ">{{$hotsthread->countComments()}} comment</a></div>
    </div>
  @endforeach

</div>