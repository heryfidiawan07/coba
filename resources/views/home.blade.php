@extends('layouts.app')

@section('content')
    <div class="row">
        @if($threadsphoto->count())
            <h4 class="text-center">Terbaru di Forum</h4>
            <hr>
        @include('news.newthreadsphoto')
        @endif
    </div>

    <div class="row">
      @if($jualsphotos->count())
          <h4 class="text-center">Terbaru di Jual Beli</h4>
          <hr>
        @include('news.fjbnewsphoto')
        @endif
    </div>
    <div class="row">
        @include('news.newcomment')
    </div>

    <div class="row">
        @include('news.jualshowcomments')
    </div>

    <div class="row">
        @if($threads->count())
            <h4 class="text-center">Artikel Terbaru</h4>
            <hr>
        @endif
        @include('news.newthreads')
    </div>

    <div class="row">
        @if($juals->count())
            <h4 class="text-center">Jual Beli Terbaru</h4>
            <hr>
        @endif
        @include('news.fjbnews')
    </div>

@endsection

