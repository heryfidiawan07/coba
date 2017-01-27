<div class="marketing">

  @if($topjuals->count())
      <h4 class="text-center">top fjb</h4>
      <hr>
  @endif

  @foreach($topjuals as $topjual)
    <div class="col-md-4">
      <div class="media">
        <a href="/{{$topjual->user->getName()}}" class="pull-left">
            <img src=" {{$topjual->user->getAvatar()}}" class="media-object img-circle" onerror="this.style.display='none'">
            <img src="{{asset('/img/users/'.$topjual->user->getAvatar() )}}" class="media-object img-circle" onerror="this.style.display='none'">
        </a>        
        <a href="/{{$topjual->user->getName()}}"> {{$topjual->user->getName()}} </a><br>
        <a href="/kategory/{{$topjual->tag->name}}" class="pull-left btn btn-danger btn-xs" style="color: white !important;"><img id="icon" src="/background/tag.svg">{{$topjual->tag->name}}</a>
        <small class="pull-right">{{$topjual->created_at->diffForHumans()}}</small>
      </div>
      <a href="/fjb/{{$topjual->slug}} ">{{str_limit($topjual->title, 50)}}</a>
      <p>{{str_limit($topjual->deskripsi, 45)}}</p>
      <div class="panel-footer"><a href="/fjb/{{$topjual->slug}} ">{{$topjual->countComments()}} comment</a></div>
    </div>
  @endforeach

</div>