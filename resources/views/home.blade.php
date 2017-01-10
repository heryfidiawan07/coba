@extends('layouts.app')

@section('url') http://fidawa.com/ @stop
@section('title') Fidawa - Forum Diskusi dan Forum Jual Beli. @stop
@section('description') Diskusikan apa yang ingin anda tanyakan di forum. Cari barang atau pasang iklan anda di forum jual beli. @stop
@section('image') http://fidawa.com/icon2.jpg @stop

@section('content')
<div class="row">
  <div class="col-md-3">
    @include('news.tags')
  </div>
  <div class="col-md-9">
    @include('news.newthreads')
  </div>
</div>

<hr>

<div class="row">
  <div class="col-md-3">
    @include('news.jtags')
  </div>
  <div class="col-md-9">
    @include('news.fjbnews')
  </div>
</div>

<hr>

<div class="row">
  @include('news.newcomment')
</div>

<hr>

<div class="row">
  @include('news.fjbnewsphoto')
</div>

<hr>

<div class="row">
	@include('news.topcomment')	
</div>

<hr>

<div class="row">
	@include('news.topjual')
</div>

<hr>

<div class="row">
  @include('news.jualshowcomments')
</div>

@endsection

