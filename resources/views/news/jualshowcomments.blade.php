<div class="marketing">
  @if($jualcomments->count())
    <h4 class="text-center">Kommentar Terbaru di Jual Beli</h4>
    <hr>
  @endif

  @foreach($jualcomments as $jualcomment)
  <div class="col-md-4">
    <div class="well">
      <div class="media">
        <a href="/{{$jualcomment->user->slug}}" class="pull-left">
          @if($jualcomment->user->img)
            <img src="{{asset('/img/users/'.$jualcomment->user->img )}}" class="media-object img-circle">
          @else
            <img src=" {{$jualcomment->user->getAvatar()}}" class="media-object img-circle">
          @endif
        </a>        
        <a href="/{{$jualcomment->user->slug}}"> {{$jualcomment->user->getName()}} </a> <br>
        <a href="/kategory/{{$jualcomment->tag->slug}}" class="pull-left btn btn-danger btn-xs" style="color: white !important;"><img id="icon" src="/background/tag.svg">{{$jualcomment->tag->name}}</a>
        <small class="pull-right">{{$jualcomment->created_at->diffForHumans()}}</small>
      </div>

      <div class="title_show"><b><a href="/fjb/{{$jualcomment->slug}} ">{{$jualcomment->title}}</a></b></div>
      <div class="body_show">
        <p>{!!nl2br($jualcomment->deskripsi)!!}</p>
      </div>
      <div class="panel-footer"><a href="/fjb/{{$jualcomment->slug}}">
        {{$jualcomment->countComments()}} komentar</a>
      </div>
      
      <div class="panel-footer">
        <div class="media">
          <a href="/{{$jualcomment->getComment()->user->slug}}" class="pull-left">
            @if($jualcomment->user->img != null)
              <img src="{{asset('/img/users/'.$jualcomment->user->img )}}" class="media-object img-circle">
            @else
              <img src=" {{$jualcomment->user->getAvatar()}}" class="media-object img-circle">
            @endif
          </a>        
          <a href="/{{$jualcomment->getComment()->user->slug}}">{{$jualcomment->getComment()->user->getName()}}</a>
          <small class="pull-right">{{$jualcomment->getComment()->created_at->diffForHumans()}}</small>
          <div class="comment_show">
            {!!nl2br($jualcomment->getComment()->body)!!}
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  
</div>