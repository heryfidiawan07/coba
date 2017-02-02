@extends('layouts.app')

@section('content')
<div class="row">@include('news.fjbnewsphoto')</div>
<div class="row"><div class="text-center"> {{$jualsphotos->links()}} </div></div>

<div class="row">
	@if($juals->count())
        @include('news.fjbnews')    
    @else
        <div class="text-center">
            <i style="font-size: 14px;" class="lead">tidak ditemukan</i>
            <br>
            <a href="/fjb/create" class="btn btn-primary btn-xs" style="color: white !important;">
                <img id="icon" src="/background/shopc.svg">Jual barang anda di forum jual beli sekarang.
            </a>
            <hr>
        </div>
    @endif
</div>
<div class="row"><div class="text-center"> {{$juals->links()}} </div></div>
@endsection

