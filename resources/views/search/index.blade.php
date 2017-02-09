@extends('layouts.app')

@section('content')

    <h4 class="text-center">Forum</h4>
    <hr>
@if($threads->count())
    <div class="row">@include('news.newthreads')</div>
    <div class="row"><div class="text-center">{{$threads->links()}}</div></div>
@else
    <div class="text-center"><i style="font-size: 14px;" class="lead">Forum tidak ditemukan</i></div>
@endif

    <h4 class="text-center">Jual Beli</h4>
    <hr>
@if($juals->count())
    <div class="row">@include('news.fjbnews')</div>
    <div class="row"><div class="text-center">{{$juals->links()}}</div></div>
@else
    <div class="text-center"><i style="font-size: 14px;" class="lead">Jual Beli tidak ditemukan</i></div>
@endif

@endsection

