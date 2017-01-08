<div class="marketing">

  @if($topjuals->count())
      <h4 class="text-center">top fjb</h4>
      <hr>
  @endif

  @foreach($topjuals as $topjual)
    <div class="col-md-3">
      <div class="media">
        <a href="/{{$topjual->user->getName()}}" class="pull-left">
            <img src=" {{$topjual->user->getAvatar()}}" class="media-object img-circle" onerror="this.style.display='none'">
            <img src="{{asset('/img/users/'.$topjual->user->getAvatar() )}}" class="media-object img-circle" onerror="this.style.display='none'">
        </a>        
        <a href="/{{$topjual->user->getName()}}"> {{$topjual->user->getName()}} </a><br>
        <a href="/kategory/{{$topjual->tag->name}}" class="pull-left btn btn-danger btn-xs" style="color: white !important;"><img id="icon" src="/background/tag.svg">{{$topjual->tag->name}}</a>
        <small class="pull-right">{{$topjual->created_at->diffForHumans()}}</small>
      </div>
          <div class="media">
          @if(count($topjual->galery) > 0)
          <!-- ===== Photo Slide ===== -->
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
              @if(count($topjual->galery) >= 1)
                <div class="item active">
                  <img src="{{ asset('/img/fjb/'.$topjual->getNameImg()->img ) }}" alt="{{$topjual->tag->name}}" class="img-rounded img-responsive">
                </div>
              @endif
              @if(count($topjual->galery) > 1)
                @foreach($topjual->galery as $galery)
                    <div class="item">
                        <img src="{{ asset('/img/fjb/'.$galery->img ) }}" alt="{{$topjual->tag->name}}" class="img-rounded img-responsive">
                    </div>
                @endforeach
              @endif
            </div>
          </div>
          <style>.carousel-inner > .item > img,.carousel-inner > .item > a > img { width: auto; margin: auto;} </style>
          <!-- ===== End Photo SLide == -->
          @endif
          </div>

      <a href="/fjb/{{$topjual->slug}} ">{{str_limit($topjual->title, 50)}}</a>
      <p>{{str_limit($topjual->deskripsi, 50)}}</p>
      <hr>
      <div class="fb-like" data-href="http://www.fidawa.com/{{$topjual->title}}" data-width="250" data-height="250" data-colorscheme="light" data-layout="standard" data-action="like" data-show-faces="true" data-send="true"></div>
      <div class="panel-footer"><a href="/fjb/{{$topjual->slug}} ">{{$topjual->countComments()}} comment</a></div>
    </div>
  @endforeach

</div>