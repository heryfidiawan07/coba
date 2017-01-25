@extends('layouts.app')

@section('url') http://fidawa.com/fjb @stop
@section('title') Fidawa - Forum Diskusi dan Forum Jual Beli. @stop
@section('description') Diskusikan apa yang ingin anda tanyakan di forum. Cari barang atau pasang iklan anda di forum jual beli. @stop
@section('image') http://fidawa.com/icon2.jpg @stop

@section('content')
<div class="row">
			
		@if($juals->count())
            @foreach($juals as $jual)
            <div class="col-md-4">
                <div class="media">
                    <a href="/{{$jual->user->getName()}}" class="pull-left">
                    @if($jual->user->img == null)
                        <img src=" {{$jual->user->getAvatar()}}" class="media-object img-circle">
                    @else
                        <img src="{{asset('/img/users/'.$jual->user->getAvatar() )}}" class="media-object img-circle">
                    @endif
                    </a>
                    <div class="media-body">
                        <div class="media-heading">
                            <a href="/fjb/{{$jual->slug}} ">{{str_limit($jual->title, 70)}}</a>
                            <br>
                            <a href="/kategory/{{$jual->tag->name}}" class="btn btn-danger btn-xs" style="color: white !important;">
                                <img id="icon" src="/background/tag.svg">{{$jual->tag->name}}
                            </a>
                        </div>
                        <p> <small>{{$jual->created_at->diffForHumans()}}</small> by <a href="/{{$jual->user->getName()}}"> {{$jual->user->getName()}} </a> </p>
                    </div>
                    <div class="panel-footer">
                        <p class="pull-right">{{$jual->countComments()}} commentar</p>
                    </div>
                </div>
                <hr>
            </div>
            @endforeach
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
<div class="row">
    <div class="text-center"> {{$juals->links()}}</div>
</div>
@endsection

