
@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default" style="padding: 10px 10px;">
            <div class="media">
                <div class="media">
                    <p>{{$thread->title}}</p>
                    <a class="btn btn-danger btn-xs" style="color: white !important;" href="/tags/{{$thread->tag->name}}"><img id="icon" src="/background/tag.svg"> {{$thread->tag->name}}</a>
                    <div class="fb-like" data-href="http://fidawa.com/threads/{{$thread->title}}" data-width="250" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                </div>
                <hr>
                <div class="media">
                    @if($thread->img)
                        <img class="img-rounded img-responsive" src="{{asset('/img/threads/'.$thread->img )}}">
                    @endif
                    <p>{{$thread->body}}</p>
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
                                <img class="img-rounded" src="{{ asset('/img/comments/'.$comment->img) }}" alt="{{$thread->tag->name}}">
                            @endif
                            <p> {{$comment->body}} </p>
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
        
                @if(Auth::check())
                <hr>
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
                    <div class="well">
                        Please <a href="/login">Login</a> Before you make a post
                    </div>
                @endif
            </div>
        </div>
    </div>
    
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
</div>

@endsection
