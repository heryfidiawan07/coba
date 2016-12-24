<div class="marketing">
  @if($newcomments->count())
    <h4 class="text-center">Commentar Terbaru</h4>
    <hr>
  @endif

  @foreach($newcomments as $newcomment)
    <div class="col-md-4">
      <div class="media">
        <a href="/{{$newcomment->user->getName()}}" class="pull-left">
            <img src=" {{$newcomment->user->getAvatar()}} " alt="" class="media-object img-circle" onerror="this.style.display='none'">
            <img src="{{asset('/img/users/'.$newcomment->user->getAvatar() )}}" class="media-object img-circle" onerror="this.style.display='none'">
        </a>        
        <a href="/{{$newcomment->user->getName()}}"> {{$newcomment->user->getName()}} </a> <br>
        <small class="pull-right">{{$newcomment->created_at->diffForHumans()}}</small>
        <p class="pull-left">{{$newcomment->tag->name}} </p>
      </div>

      <a href="/threads/{{$newcomment->slug}} ">{{$newcomment->title}}</a>
      <p>{{$newcomment->body}}</p>
      <div class="panel-footer"><a href="/threads/{{$newcomment->slug}} ">{{$newcomment->countComments()}} comment</a></div>
      
      <div class="panel-footer">
        <div class="media">
          <a href="/{{$newcomment->getComment()->user->getName()}}" class="pull-left">
              <img src=" {{$newcomment->getComment()->user->getAvatar()}} " alt="" class="media-object img-circle" onerror="this.style.display='none'">
              <img src="{{asset('/img/users/'.$newcomment->user->getAvatar() )}}" class="media-object img-circle" onerror="this.style.display='none'">
          </a>        
          <a href="/{{$newcomment->getComment()->user->getName()}}">{{$newcomment->getComment()->user->getName()}}</a>
          <small class="pull-right">{{$newcomment->getComment()->created_at->diffForHumans()}}</small>
          <p>{{$newcomment->getComment()->body}}</p>
        </div>
      </div>

    </div>
  @endforeach
  
</div>