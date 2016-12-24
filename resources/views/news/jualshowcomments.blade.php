<div class="marketing">
  @if($jualcomments->count())
    <h4 class="text-center">Commentar Terbaru From FJB</h4>
    <hr>
  @endif

  @foreach($jualcomments as $jualcomment)
    <div class="col-md-4">
      <div class="media">
        <a href="/{{$jualcomment->user->getName()}}" class="pull-left">
            <img src=" {{$jualcomment->user->getAvatar()}} " alt="" class="media-object img-circle" onerror="this.style.display='none'">
            <img src="{{asset('/img/users/'.$jualcomment->user->getAvatar() )}}" class="media-object img-circle" onerror="this.style.display='none'">
        </a>        
        <a href="/{{$jualcomment->user->getName()}}"> {{$jualcomment->user->getName()}} </a> <br>
        <small class="pull-right">{{$jualcomment->created_at->diffForHumans()}}</small>
        <p class="pull-left">{{$jualcomment->tag->name}}</p>
      </div>

      <a href="/barang-di-jual/{{$jualcomment->slug}} ">{{$jualcomment->title}}</a>
      <p>{{$jualcomment->body}}</p>
      <div class="panel-footer"><a href="/barang-di-jual/{{$jualcomment->slug}} ">
        {{$jualcomment->countComments()}} comment</a>
      </div>
      
      <div class="panel-footer">
        <div class="media">
          <a href="/{{$jualcomment->getComment()->user->getName()}}" class="pull-left">
              <img src=" {{$jualcomment->getComment()->user->getAvatar()}} " alt="" class="media-object img-circle" onerror="this.style.display='none'">
              <img src="{{asset('/img/users/'.$jualcomment->user->getAvatar() )}}" class="media-object img-circle" onerror="this.style.display='none'">
          </a>        
          <a href="/{{$jualcomment->getComment()->user->getName()}}">{{$jualcomment->getComment()->user->getName()}}</a>
          <small class="pull-right">{{$jualcomment->getComment()->created_at->diffForHumans()}}</small>
          <p>{{$jualcomment->getComment()->body}}</p>
        </div>
      </div>

    </div>
  @endforeach
  
</div>