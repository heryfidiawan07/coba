<div class="marketing">

  @if($threads->count())
      <h4 class="text-center">news threads</h4>
      <hr>
  @endif

  @foreach($threads as $thread)
    <div class="col-md-4">
      <div class="media">
        <a href="/{{$thread->user->getName()}}" class="pull-left">
            <img src=" {{$thread->user->getAvatar()}} " alt="{{$thread->user->getName()}}" class="media-object img-circle" onerror="this.style.display='none'">
            <img src="{{asset('/img/users/'.$thread->user->getAvatar() )}}" alt="{{$thread->user->getName()}}" class="media-object img-circle" onerror="this.style.display='none'">
        </a>        
        <a href="/{{$thread->user->getName()}}"> {{$thread->user->getName()}} </a><br>
        <small class="pull-right">{{$thread->created_at->diffForHumans()}}</small>
        <p class="pull-left">{{$thread->tag->name}}</p>
      </div>

      <a href="/threads/{{$thread->slug}} ">{{$thread->title}}</a>
      <p>{{$thread->deskripsi}}</p>
      <div class="panel-footer"><a href="/threads/{{$thread->slug}} ">{{$thread->countComments()}} comment</a></div>
    </div>
  @endforeach

</div>