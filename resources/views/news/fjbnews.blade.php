<div class="marketing">

  @foreach($juals as $jual)
    <div class="col-md-4">
      <div class="well">
        <div class="media">
          <a href="/{{$jual->user->slug}}" class="pull-left">
            @if($jual->user->img)
              <img src="{{asset('/img/users/'.$jual->user->img )}}" class="media-object img-circle">
            @else
              <img src=" {{$jual->user->getAvatar()}}" class="media-object img-circle">
            @endif
          </a>        
          <a href="/{{$jual->user->slug}}"> {{$jual->user->getName()}} </a><br>
          <a href="/kategory/{{$jual->tag->slug}}" class="pull-left btn btn-danger btn-xs" style="color: white !important;"><img id="icon" src="/background/tag.svg">{{$jual->tag->name}}</a>
          <small class="pull-right">{{$jual->created_at->diffForHumans()}}</small>
        </div>

        <div class="title_show"><b><a href="/fjb/{{$jual->slug}} ">{{$jual->title}}</a></b></div>
        <h5 class="text-center">
            <small><strike>Rp {!!number_format($jual->hargaNormal)!!}</strike></small>
            <small style="background-color: yellow;"> - Rp {!!number_format($jual->diskon)!!}</small>
            <br><b style="color: red;"> RP {!!number_format($jual->hargaNormal - $jual->diskon)!!} </b>
            <small><i>- {!!number_format($jual->diskon / $jual->hargaNormal * 100)!!}%</i></small>
        </h5>
        <div class="panel-footer"><a href="/fjb/{{$jual->slug}} ">{{$jual->countComments()}} komentar</a></div>
      </div>
    </div>
  @endforeach

</div>