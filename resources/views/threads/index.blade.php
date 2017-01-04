@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('news.tags')
    </div>
    <div class="col-md-5">
        
        @if($threads->count())
            @foreach($threads as $thread)
                <div class="media">
                    <a href="/{{$thread->user->getName()}}" class="pull-left">
                        <img src="{{$thread->user->getAvatar()}}" class="media-object img-circle" onerror="this.style.display='none'">
                        <img src="{{asset('/img/users/'.$thread->user->getAvatar() )}}" class="media-object img-circle" onerror="this.style.display='none'">
                    </a>
                    <div class="media-body">
                        <div class="media-heading">
                            <a href="/threads/{{$thread->slug}}">{{str_limit($thread->title, 70)}}</a>
                            <br>
                            <a href="/tags/{{$thread->tag->name}}" class="btn btn-danger btn-xs" style="color: white !important;">{{$thread->tag->name}}</a>
                        </div>
                        <p> <small>{{$thread->created_at->diffForHumans()}}</small> by <a href="/{{$thread->user->getName()}}"> {{$thread->user->getName()}} </a> </p>
                    </div>
                    <div class="panel-footer">
                        <p class="pull-right">{{$thread->countComments()}} commentar</p>
                    </div>
                </div>
                <hr>
            @endforeach
        @else
            <i style="font-size: 14px;" class="lead">threads tidak ditemukan</i>
            <hr>
        @endif

    @if(Auth::check())
        {{$threads->links()}}
    @endif
    
    </div>
</div>
@endsection

