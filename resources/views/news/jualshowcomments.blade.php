<div class="marketing">
  @if($jualcomments->count())
    <h4 class="text-center">commentar terbaru</h4>
    <hr>
  @endif

  @foreach($jualcomments as $jualcomment)
    <div class="col-md-4">
      <div class="media">
        <a href="/{{$jualcomment->user->getName()}}" class="pull-left">
            <img src=" {{$jualcomment->user->getAvatar()}}" class="media-object img-circle" onerror="this.style.display='none'">
            <img src="{{asset('/img/users/'.$jualcomment->user->getAvatar() )}}" class="media-object img-circle" onerror="this.style.display='none'">
        </a>        
        <a href="/{{$jualcomment->user->getName()}}"> {{$jualcomment->user->getName()}} </a> <br>
        <a href="/kategory/{{$jualcomment->tag->name}}" class="pull-left btn btn-danger btn-xs" style="color: white !important;"><img id="icon" src="/background/tag.svg">{{$jualcomment->tag->name}}</a>
        <small class="pull-right">{{$jualcomment->created_at->diffForHumans()}}</small>
      </div>

      <a href="/fjb/{{$jualcomment->slug}} ">{{str_limit($jualcomment->title, 50)}}</a>
      <hr>
      <div class="fb-like" data-href="http://fidawa.com/fjb/{{$jualcomment->slug}}" data-width="250" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
      <div class="panel-footer"><a href="/fjb/{{$jualcomment->slug}}">
        {{$jualcomment->countComments()}} comment</a>
      </div>
      
      <div class="panel-footer">
        <div class="media">
          <a href="/{{$jualcomment->getComment()->user->getName()}}" class="pull-left">
              <img src=" {{$jualcomment->getComment()->user->getAvatar()}}" class="media-object img-circle" onerror="this.style.display='none'">
              <img src="{{asset('/img/users/'.$jualcomment->user->getAvatar() )}}" class="media-object img-circle" onerror="this.style.display='none'">
          </a>        
          <a href="/{{$jualcomment->getComment()->user->getName()}}">{{$jualcomment->getComment()->user->getName()}}</a>
          <small class="pull-right">{{$jualcomment->getComment()->created_at->diffForHumans()}}</small>
          <p>{{str_limit($jualcomment->getComment()->body, 50)}}</p>
        </div>
      </div>

    </div>
  @endforeach
  
</div>