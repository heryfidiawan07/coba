@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    @include('news.newthreads')
  </div>
</div>

<hr>

<div class="row">
  <div class="col-md-12">
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

