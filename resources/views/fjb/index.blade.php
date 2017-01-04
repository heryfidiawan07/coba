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
                            <a href="/kategory/{{$jual->tag->name}}" class="btn btn-danger btn-xs" style="color: white !important;">{{$jual->tag->name}}</a>
                        </div>
                        <p> <small>{{$jual->created_at->diffForHumans()}}</small> by <a href="/{{$jual->user->getName()}}"> {{$jual->user->getName()}} </a> </p>
                    </div>
                    <div class="panel-footer">
                        <p class="pull-right">{{$jual->countComments()}} commentar</p>
                    </div>
                </div>
                <hr>
            @endforeach
        @else
            <i style="font-size: 14px;" class="lead"> tidak ditemukan</i>
            <hr>
        @endif

    @if(Auth::check())
        {{$juals->links()}}
    @endif
    
    </div>
</div>
@endsection

