@extends('layouts.app')

@section('content')
<div class="row">
<h3 class="text-center"><u> Daftar Member </u></h3><br>
    @foreach($members as $member)
	    <div class="col-md-4">
	    		<div class="media">
              <a href="/{{$member->name}}" class="pull-left">
              @if($member->img == null)
                  <img src=" {{$member->getAvatar() }}" class="img-responsive img-circle">
              @else
                  <img src="{{asset('/img/users/'.$member->getAvatar() )}}" class="img-responsive img-circle">
              @endif
              </a>
              <a href="/{{$member->name}}">
                <p>{{$member->name}}</p>
              </a>
              @if($member->tentang == null)
                <p> No status </p>
              @else
                <p> {{str_limit($member->tentang, 50)}} </p>
              @endif
              <p>Joined :  <small>{{$member->created_at->diffForHumans()}}</small> </p>
              <div class="panel-footer">
                <p class="pull-left"><img id="icon" src="/background/ide.svg"> {{$member->tulisan()}} threads</p>
                <p class="pull-right"><img id="icon" src="/background/shopc.svg"> {{$member->fjb()}} jual beli</p>
              </div>
				</div>
	    </div>
    @endforeach
  <div class="text-center">
    <hr>
    {{$members->links()}}
  </div>
</div>
    
@endsection

