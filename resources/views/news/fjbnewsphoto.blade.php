<div class="marketing">

  @foreach($jualsphotos as $jualsphoto)
    <div class="col-md-4">
      <div class="well">
        <div class="media">
          <a href="/{{$jualsphoto->user->slug}}" class="pull-left">
            @if($jualsphoto->user->img)
              <img src="{{asset('/img/users/'.$jualsphoto->user->img )}}" class="media-object img-circle">
            @else
              <img src=" {{$jualsphoto->user->getAvatar()}}" class="media-object img-circle">
            @endif
          </a>        
          <a href="/{{$jualsphoto->user->slug}}"> {{$jualsphoto->user->getName()}} </a><br>
          <a href="/kategory/{{$jualsphoto->tag->slug}}" class="pull-left btn btn-danger btn-xs" style="color: white !important;"><img id="icon" src="/background/tag.svg">{{$jualsphoto->tag->name}}</a>
          <small class="pull-right">{{$jualsphoto->created_at->diffForHumans()}}</small>
        </div>
      
        <div class="media">
          <!-- ===== Photo Slide ===== -->
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
              @foreach($jualsphoto->galery as $galery)
                @if($galery->img == $jualsphoto->getNameImg()->img)
                  <div class="item active">
                  <a href="/fjb/{{$jualsphoto->slug}} ">
                    <img src="{{ asset('/img/fjb/'.$jualsphoto->getNameImg()->img ) }}" alt="{{$jualsphoto->tag->name}}" class="img-responsive">
                  </a>
                  </div>
                  @continue
                @endif
                  <div class="item">
                    <a href="/fjb/{{$jualsphoto->slug}} ">
                      <img src="{{ asset('/img/fjb/'.$galery->img ) }}" alt="{{$jualsphoto->tag->name}}" class="img-responsive">
                    </a>
                  </div>
              @endforeach
            </div>
          </div>
          <style>.carousel-inner > .item > img,.carousel-inner > .item > a > img { width: auto; margin: auto;} </style>
          <!-- ===== End Photo SLide == -->
        </div>
        <a href="/fjb/{{$jualsphoto->slug}} " style="text-decoration: none;">
          <h5 class="text-center">
              <small><strike>Rp {!!number_format($jualsphoto->hargaNormal)!!}</strike></small>
              <small style="background-color: yellow;"> - Rp {!!number_format($jualsphoto->diskon)!!}</small>
              <br><b style="color: red;"> RP {!!number_format($jualsphoto->hargaNormal - $jualsphoto->diskon)!!} </b>
              <small><i>- {!!number_format($jualsphoto->diskon / $jualsphoto->hargaNormal * 100)!!}%</i></small>
          </h5>
        </a>
          <div class="title_show"><b><a href="/fjb/{{$jualsphoto->slug}} ">{{$jualsphoto->title}}</a></b></div>
          <div class="panel-footer"><a href="/fjb/{{$jualsphoto->slug}} ">{{$jualsphoto->countComments()}} komentar</a></div>
      </div>
    </div>
  @endforeach
</div>
