<div class="marketing">

  @if($juals->count())
      <h4 class="text-center">terbaru di fjb</h4>
      <hr>
  @endif

  @foreach($juals as $jual)
    <div class="col-md-4">
      <div class="media">
        <a href="/{{$jual->user->getName()}}" class="pull-left">
            <img src=" {{$jual->user->getAvatar()}}" class="media-object img-circle" onerror="this.style.display='none'">
            <img src="{{asset('/img/users/'.$jual->user->getAvatar() )}}" class="media-object img-circle" onerror="this.style.display='none'">
        </a>        
        <a href="/{{$jual->user->getName()}}"> {{$jual->user->getName()}} </a><br>
        <p class="pull-left btn btn-danger btn-xs"><img id="icon" src="/background/tag.svg">{{$jual->tag->name}}</p>
        <small class="pull-right">{{$jual->created_at->diffForHumans()}}</small>
      </div>

      <a href="/fjb/{{$jual->slug}} ">{{str_limit($jual->title, 50)}}</a>
      
      <div class="fb-like" data-href="http://fidawa.com/fjb/{{$jual->title}}" data-width="250" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
      <div class="panel-footer"><a href="/fjb/{{$jual->slug}} ">{{$jual->countComments()}} comment</a></div>
    </div>
  @endforeach

</div>