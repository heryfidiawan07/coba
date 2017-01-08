<div class="marketing">

  @if($hotsthreads->count())
      <h4 class="text-center">top threads</h4>
      <hr>
  @endif

  @foreach($hotsthreads as $hotsthread)
    <div class="col-md-3">
      <div class="media">
        <a href="/{{$hotsthread->user->getName()}}" class="pull-left">
            <img src=" {{$hotsthread->user->getAvatar()}}" class="media-object img-circle" onerror="this.style.display='none'">
            <img src="{{asset('/img/users/'.$hotsthread->user->getAvatar() )}}" class="media-object img-circle" onerror="this.style.display='none'">
        </a>        
        <a href="/{{$hotsthread->user->getName()}}"> {{$hotsthread->user->getName()}} </a><br>
        <a href="/tags/{{$hotsthread->tag->name}}" class="pull-left btn btn-danger btn-xs" style="color: white !important;"><img id="icon" src="/background/tag.svg">{{$hotsthread->tag->name}}</a>
        <small class="pull-right">{{$hotsthread->created_at->diffForHumans()}}</small>
      </div>
      
        <a href="/threads/{{$hotsthread->slug}} ">{{str_limit($hotsthread->title, 50)}}</a>
        <p>{{str_limit($hotsthread->body, 50)}}</p>
        <hr>
        <div class="fb-like" data-href="http://www.fidawa.com/{{$hotsthread->title}}" data-width="250" data-height="250" data-colorscheme="light" data-layout="standard" data-action="like" data-show-faces="true" data-send="true"></div>
      <div class="panel-footer"><a href="/threads/{{$hotsthread->slug}} ">{{$hotsthread->countComments()}} comment</a></div>
    </div>
  @endforeach

</div>