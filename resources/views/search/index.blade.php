@extends('layouts.app')

@section('content')
<div class="row">
        
    @if($threads->count())
        @foreach($threads as $thread)
            <div class="col-md-4">
                <div class="media">
                    <a href="/{{$thread->user->getName()}}" class="pull-left">
                        <img src="{{$thread->user->getAvatar()}} " alt="" class="media-object img-circle" onerror="this.style.display='none'">
                        <img src="{{asset('/img/users/'.$thread->user->getAvatar() )}}" class="media-object img-circle" onerror="this.style.display='none'">
                    </a>
                    <div class="media-body">
                        <div class="media-heading">
                            <a href="/threads/{{$thread->slug}} ">{{str_limit($thread->title, 40)}}</a><br>
                            <a href="/tag/{{$thread->tag->name}}" class="btn btn-danger btn-xs" style="color: white !important;"><img id="icon" src="/background/tag.svg">{{$thread->tag->name}}</a>
                        </div>
                        <p> <small>{{$thread->created_at->diffForHumans()}}</small> by <a href="/{{$thread->user->getName()}}"> {{$thread->user->getName()}} </a> </p>
                    </div>
                    <div class="panel-footer">
                        <p class="pull-right">{{$thread->countComments()}} commentar</p>
                    </div>
                </div>
                <hr>
            </div>
        @endforeach
    @else
        <div class="text-center"><i style="font-size: 14px;" class="lead">tidak ditemukan</i></div>
    @endif
</div>
<div class="row">
    <div class="text-center">{{$threads->links()}}</div>
</div>
<hr>
<div class="row">
        
    @if($juals->count())
        @foreach($juals as $jual)
            <div class="col-md-4">
                <div class="media">
                    <a href="/{{$jual->user->getName()}}" class="pull-left">
                        <img src="{{$jual->user->getAvatar()}} " alt="profile" class="media-object img-circle" onerror="this.style.display='none'">
                        <img src="{{asset('/img/users/'.$jual->user->getAvatar())}}" alt="profile" class="media-object img-circle" onerror="this.style.display='none'">
                    </a>
                    <div class="media-body">
                        <div class="media-heading">
                            <a href="/fjb/{{$jual->slug}} ">{{str_limit($jual->title, 40)}}</a><br>
                            <a href="/kategory/{{$jual->tag->name}}" class="btn btn-danger btn-xs" style="color: white !important;"><img id="icon" src="/background/tag.svg">{{$jual->tag->name}}</a>
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
        <div class="text-center"><i style="font-size: 14px;" class="lead">tidak ditemukan</i></div>
    @endif
</div>
<div class="row">
    <div class="text-center">{{$juals->links()}}</div>
</div>
@endsection

