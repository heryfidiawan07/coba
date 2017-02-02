@extends('layouts.app')

@section('content')
<div class="row">
    <h4 class="text-center">Forum</h4>
    <hr>
    @if($threads->count())
        @include('news.newthreads')
    @else
        <div class="text-center"><i style="font-size: 14px;" class="lead">Forum tidak ditemukan</i></div>
    @endif
</div>
<div class="row">
    <div class="text-center">{{$threads->links()}}</div>
</div>

<div class="row">
    <h4 class="text-center">Jual Beli</h4>
    <hr>
    @if($juals->count())
        @include('news.fjbnews')
    @else
        <div class="text-center"><i style="font-size: 14px;" class="lead">Jual Beli tidak ditemukan</i></div>
    @endif
</div>
<div class="row">
    <div class="text-center">{{$juals->links()}}</div>
</div>
@endsection

