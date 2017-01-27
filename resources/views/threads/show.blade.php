@extends('layouts.app')

@section('url') http://fidawa.com/threads/{{$thread->slug}} @stop
@section('title') {{$thread->title}} @stop
@section('description') {{ str_limit($thread->body, 150) }} @stop
@section('image') http://fidawa.com/img/threads/{{$thread->img}} @stop

@section('content')

<div class="row">

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="media">
                    <a href="/{{$thread->user->getName()}}" class="pull-left">
                      <img src="{{$thread->user->getAvatar()}}" class="media-object img-circle" onerror="this.style.display='none'">
                      <img src="{{asset('/img/users/'.$thread->user->getAvatar() )}}" class="media-object img-circle" onerror="this.style.display='none'">
                    </a>        
                    <a href="/{{$thread->user->name}}"> {{$thread->user->getName()}} </a>
                    <small class="pull-right"> {{$thread->created_at->diffForHumans()}} </small>
                </div>
            @if(Auth::check())
                @if($thread->user_id == Auth::user()->id)
                    <a class="pull-right" href="/threads/{{$thread->slug}}/edit"><img id="icon" src="/background/sunting.svg"></a>
                @endif
            @endif
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="panel panel-default" style="padding: 10px 10px;">
            <div class="media">
                <div class="media">
                    <p><b>{{$thread->title}}</b></p>
                    <a class="btn btn-danger btn-xs" style="color: white !important;" href="/tags/{{$thread->tag->name}}"><img id="icon" src="/background/tag.svg"> {{$thread->tag->name}}</a>
                    <hr>
                    <div class="fb-like" data-href="http://fidawa.com/threads/{{$thread->slug}}" data-width="250" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                </div>
                <hr>
                <div class="media">
                    @if($thread->img)
                        <img class="img-responsive" src="{{asset('/img/threads/'.$thread->img )}}" alt="{{$thread->tag->name}}">
                    @endif
                    <br><p>{!! nl2br($thread->body) !!}</p>
                    @foreach($comments as $comment)
                    <hr>
                    <div class="media" style="margin-left: 20px;">
                        <div class="media">
                            <a href="/{{$comment->user->getName()}}" class="pull-left">
                              <img src=" {{$comment->user->getAvatar()}}" class="media-object img-circle" onerror="this.style.display='none'">
                              <img src="{{asset('/img/users/'.$comment->user->getAvatar() )}}" class="media-object img-circle" onerror="this.style.display='none'">
                            </a>
                            <a href="/{{$comment->user->name}}">{{$comment->user->getName()}}</a>
                            <small> &horbar; {{$comment->created_at->diffForHumans()}}</small>
                        <div class="media">
                            @if($comment->img)
                                <img class="img-responsive" src="{{ asset('/img/comments/'.$comment->img) }}" alt="{{$thread->tag->name}}">
                            @endif
                            <p> {!!nl2br($comment->body)!!} </p>
                        </div>
                            @if(Auth::check())
                                @if(Auth::user()->id == $comment->user_id)
                                    <small><a class="pull-right" href="/comment/{{$comment->id}}/edit"><img id="icon" src="/background/sunting.svg"></a></small>
                                @endif
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                <hr>
                <div class="text-center"> {{$comments->links()}} </div>
                @if(Auth::check())
                    <form id="upload" action="/comment/{{$thread->slug}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="form-group {{$errors->has('body') ? ' has-error' : ''}} ">
                            <textarea name="body" id="body" rows="5" class="form-control" placeholder="reply-{{Auth::user()->name}}"></textarea>
                            @if($errors->has('body'))
                                <span class="help-block"> {{$errors->first('body')}} </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('imgcomment') ? ' has-error' : '' }} ">
                            <div class="media">
                                @include('layouts.partials.upload')
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-sm" value="commentary">
                        </div>
                    </form>
                @else
                    <div class="well text-center">
                        <b><a href="/login">Login</a></b> sebelum dapat berkomentar dan menulis di forum.
                        <p>atau</p>
                        @include('layouts.partials.social')
                    </div>
                @endif
            </div>
        </div>
    </div>
    
</div>

@endsection
