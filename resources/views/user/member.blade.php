@extends('layouts.app')

@section('content')
<div class="row">
<h3 class="text-center"><u> Daftar Member </u></h3><br>
    @foreach($members as $member)
	    <div class="col-md-4">
	    		<div class="media">
              <a href="/{{$member->slug}}" class="pull-left">
                <img src=" {{$member->getAvatar() }}" class="img-responsive img-circle" onerror="this.style.display='none'">
                <img src="{{asset('/img/users/'.$member->getAvatar() )}}" class="img-responsive img-circle" onerror="this.style.display='none'">
              </a>
              <a href="/{{$member->slug}}">
                <p>{{$member->name}}</p>
              </a>
              <div id="status">
                @if($member->tentang == null)
                  <p> No status </p>
                @else
                  <p> {!!nl2br($member->tentang)!!} </p>
                @endif
              </div>
              <p>Joined :  <small>{{$member->created_at->diffForHumans()}}</small> </p>
              <div class="panel-footer">
                <p class="pull-left"><img id="icon" src="/background/ide.svg"> {{$member->tulisan()}} threads</p>
                <p class="pull-right"><img id="icon" src="/background/shopc.svg"> {{$member->fjb()}} jual beli</p>
              </div>
				</div><br>
	    </div>
    @endforeach
</div>
<div class="row">
  <div class="text-center">
    {{$members->links()}}
  </div>
</div>
    
@endsection

