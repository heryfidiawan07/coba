@extends('layouts.app')

@section('title') Fidawa - Forum Diskusi dan Forum Jual Beli. @stop
@section('description') Diskusikan apa yang ingin anda tanyakan di forum. Cari barang atau pasang iklan anda di forum jual beli. @stop
@section('image') http://fidawa.com/icon2.jpg @stop

@section('content')
<div class="row">
<h3 class="text-center">Daftar Member Fidawa</h3>
    @foreach($members as $member)
	    <div class="col-md-4">
	    		<div class="media">
              <a href="/{{$member->name}}" class="pull-left">
                  <img src=" {{$member->getAvatar() }}" class="img-responsive img-circle" onerror="this.style.display='none'">
                  <img src="{{asset('/img/users/'.$member->getAvatar() )}}" class="img-responsive img-circle" onerror="this.style.display='none'">
              </a>
              <a href="/{{$member->name}}">
                <p>{{$member->name}}</p>
              </a>
              <p>Joined :  <small>{{$member->created_at->diffForHumans()}}</small> </p>
              <div class="panel-footer">
                <p class="pull-left"><img id="icon" src="/background/ide.svg"> {{$member->tulisan()}} threads</p>
                <p class="pull-right"><img id="icon" src="/background/shopc.svg"> {{$member->fjb()}} jual beli</p>
              </div>
				</div>
	    </div>
    @endforeach
</div>
<div class="row">
  <div class="col-md-12">
    <div class="text-center">
    <hr>
    {{$members->links()}}
  </div>
  </div>
</div>

@endsection

