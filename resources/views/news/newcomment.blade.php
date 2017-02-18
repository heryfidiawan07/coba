<div class="marketing">
  @if($newcomments->count())
    <h4 class="text-center">Kommentar Terbaru di Forum</h4>
    <hr>
  @endif

  @foreach($newcomments as $newcomment)
  <div class="col-md-4">
    <div class="well">
      <div class="media">
        <a href="/{{$newcomment->user->slug}}" class="pull-left">
        @if($newcomment->user->img)
          <img src="{{asset('/img/users/'.$newcomment->user->img )}}" class="media-object img-circle">
        @else
          <img src=" {{$newcomment->user->getAvatar()}}" class="media-object img-circle">
        @endif
        </a>        
        <a href="/{{$newcomment->user->slug}}"> {{$newcomment->user->getName()}} </a> <br>
        <a href="/tags/{{$newcomment->tag->slug}}" class="pull-left btn btn-danger btn-xs" style="color: white !important;"><img id="icon" src="/background/tag.svg">{{$newcomment->tag->name}}</a>
        <small class="pull-right">{{$newcomment->created_at->diffForHumans()}}</small>
      </div>
      <div class="title_show">
        <b><a href="/threads/{{$newcomment->slug}} ">{{$newcomment->title}}</a></b>
      </div>
      <div class="body_show">
        <p>{!!nl2br($newcomment->body)!!}</p>
      </div>
      <div class="panel-footer">
        <a href="/threads/{{$newcomment->slug}}">{{$newcomment->countComments()}} komentar</a>
      </div>
      
      <div class="panel-footer">
        <div class="media">
          <a href="/{{$newcomment->getComment()->user->slug}}" class="pull-left">
            @if($newcomment->user->img != null)
              <img src="{{asset('/img/users/'.$newcomment->user->img )}}" class="media-object img-circle">
            @else
              <img src=" {{$newcomment->user->getAvatar()}}" class="media-object img-circle">
            @endif
          </a>        
          <a href="/{{$newcomment->getComment()->user->slug}}">{{$newcomment->getComment()->user->getName()}}</a>
          <small class="pull-right">{{$newcomment->getComment()->created_at->diffForHumans()}}</small>
          <div class="comment_show">{!!nl2br($newcomment->getComment()->body)!!}</div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  
</div>