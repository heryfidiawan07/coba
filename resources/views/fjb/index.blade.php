@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('news.jtags')
    </div>
    <div class="col-md-5">
			
		@if($juals->count())
            @foreach($juals as $jual)
                <div class="media">
                    <a href="/{{$jual->user->getName()}}" class="pull-left">
                        <img src=" {{$jual->user->getAvatar()}} "class="media-object img-circle" onerror="this.style.display='none'">
                        <img src="{{asset('/img/users/'.$jual->user->getAvatar() )}}" class="media-object img-circle" onerror="this.style.display='none'">
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
                        <hr>
                        <div class="fb-like" data-href="http://fidawa.com/fjb/{{$jual->slug}}" data-width="250" data-layout="button_count" data-action="recommend" data-size="small" data-show-faces="true" data-share="true"></div>
                    </div>
                    <div class="panel-footer">
                        <p class="pull-right">{{$jual->countComments()}} commentar</p>
                    </div>
                </div>
                <hr>
            @endforeach
        @else
            <i style="font-size: 14px;" class="lead"> tidak ditemukan</i>
            <a href="/fjb/create" class="btn btn-primary btn-xs" style="color: white !important;">
                <img id="icon" src="/background/shopc.svg">Jual barang anda di forum jual beli sekarang.
            </a>
            <hr>
        @endif

    @if(Auth::check())
        {{$juals->links()}}
    @endif
    
    </div>
</div>
@endsection

