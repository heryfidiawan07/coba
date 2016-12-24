<div class="marketing">

  @if($juals->count())
      <h4 class="text-center">News From FJB</h4>
      <hr>
  @endif

  @foreach($juals as $jual)
    <div class="col-md-4">
      <div class="media">
        <a href="/{{$jual->user->getName()}}" class="pull-left">
            <img src=" {{$jual->user->getAvatar()}} " alt="" class="media-object img-circle" onerror="this.style.display='none'">
            <img src="{{asset('/img/users/'.$jual->user->getAvatar() )}}" class="media-object img-circle" onerror="this.style.display='none'">
        </a>        
        <a href="/{{$jual->user->getName()}}"> {{$jual->user->getName()}} </a><br>
        <small class="pull-right">{{$jual->created_at->diffForHumans()}}</small>
        <p class="pull-left">{{$jual->tag->name}}</p>
      </div>

      <a href="/barang-di-jual/{{$jual->slug}} ">{{$jual->title}}</a>
      <p>{{$jual->deskripsi}}</p>
      <div class="panel-footer"><a href="/barang-di-jual/{{$jual->slug}} ">{{$jual->countComments()}} comment</a></div>
    </div>
  @endforeach

</div>