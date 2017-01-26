<div class="marketing">
  @if($newcomments->count())
    <h4 class="text-center">commentar terbaru di forum</h4>
    <hr>
  @endif

  @foreach($newcomments as $newcomment)
    <div class="col-md-4">
      <div class="media">
        <a href="/{{$newcomment->user->getName()}}" class="pull-left">
          <img src=" {{$newcomment->user->getAvatar()}}" class="media-object img-circle" onerror="this.style.display='none'">
          <img src="{{asset('/img/users/'.$newcomment->user->getAvatar() )}}" class="media-object img-circle" onerror="this.style.display='none'">
        </a>        
        <a href="/{{$newcomment->user->getName()}}"> {{$newcomment->user->getName()}} </a> <br>
        <a href="/tags/{{$newcomment->tag->name}}" class="pull-left btn btn-danger btn-xs" style="color: white !important;"><img id="icon" src="/background/tag.svg">{{$newcomment->tag->name}}</a>
        <small class="pull-right">{{$newcomment->created_at->diffForHumans()}}</small>
      </div>
      
        <a href="/threads/{{$newcomment->slug}} ">{{str_limit($newcomment->title, 50)}}</a>
        <p>{{str_limit($newcomment->body, 50)}}</p>
      <div class="panel-footer"><a href="/threads/{{$newcomment->slug}}">{{$newcomment->countComments()}} comment</a></div>
      
      <div class="panel-footer">
        <div class="media">
          <a href="/{{$newcomment->getComment()->user->getName()}}" class="pull-left">
            <img src=" {{$newcomment->getComment()->user->getAvatar()}}" class="media-object img-circle" onerror="this.style.display='none'">
            <img src="{{asset('/img/users/'.$newcomment->user->getAvatar() )}}" class="media-object img-circle" onerror="this.style.display='none'">
          </a>        
          <a href="/{{$newcomment->getComment()->user->getName()}}">{{$newcomment->getComment()->user->getName()}}</a>
          <small class="pull-right">{{$newcomment->getComment()->created_at->diffForHumans()}}</small>
          <p>{{str_limit($newcomment->getComment()->body, 30)}}</p>
        </div>
      </div>

    </div>
  @endforeach
  
</div>