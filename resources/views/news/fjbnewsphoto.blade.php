<div class="marketing">

  @if($jualsphotos->count())
      <h4 class="text-center">terbaru di fjb</h4>
      <hr>
  @endif

  @foreach($jualsphotos as $jualsphoto)
    <div class="col-md-3">
      <div class="media">
        <a href="/{{$jualsphoto->user->getName()}}" class="pull-left">
            <img src=" {{$jualsphoto->user->getAvatar()}}" class="media-object img-circle" onerror="this.style.display='none'">
            <img src="{{asset('/img/users/'.$jualsphoto->user->getAvatar() )}}" class="media-object img-circle" onerror="this.style.display='none'">
        </a>        
        <a href="/{{$jualsphoto->user->getName()}}"> {{$jualsphoto->user->getName()}} </a><br>
        <a href="/kategory/{{$jualsphoto->tag->name}}" class="pull-left btn btn-danger btn-xs" style="color: white !important;"><img id="icon" src="/background/tag.svg">{{$jualsphoto->tag->name}}</a>
        <small class="pull-right">{{$jualsphoto->created_at->diffForHumans()}}</small>
      </div>

        <div class="media">
          @if(count($jualsphoto->galery) > 0)
          <!-- ===== Photo Slide ===== -->
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
              @if(count($jualsphoto->galery) >= 1)
                <div class="item active">
                  <img src="{{ asset('/img/fjb/'.$jualsphoto->getNameImg()->img ) }}" alt="{{$jualsphoto->tag->name}}" class="img-rounded img-responsive">
                </div>
              @endif
              @if(count($jualsphoto->galery) > 1)
                @foreach($jualsphoto->galery as $galery)
                    <div class="item">
                        <img src="{{ asset('/img/fjb/'.$galery->img ) }}" alt="{{$jualsphoto->tag->name}}" class="img-rounded img-responsive">
                    </div>
                @endforeach
              @endif
            </div>
          </div>
          <style>.carousel-inner > .item > img,.carousel-inner > .item > a > img { width: auto; margin: auto;} </style>
          <!-- ===== End Photo SLide == -->
          @endif
        </div>
      
      <a href="/fjb/{{$jualsphoto->slug}} ">{{str_limit($jualsphoto->title, 50)}}</a>
      <div class="panel-footer"><a href="/fjb/{{$jualsphoto->slug}} ">{{$jualsphoto->countComments()}} comment</a></div>
    </div>
  @endforeach
</div>
