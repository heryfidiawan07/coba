
@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <p>{{$thread->title}}</p>
                <a class="btn btn-danger btn-xs" style="color: white !important;" href="/tags/{{$thread->tag->name}}">{{$thread->tag->name}}</a>
            </div>
            <div class="panel-body">
                <p>{{$thread->body}}</p>
                @if($thread->img)
                    <img class="img-rounded img-responsive" src="{{asset('/img/threads/'.$thread->img )}}">
                @endif
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
                        <p> {{$comment->body}} </p>
                        @if($comment->img)
                            <img class="img-rounded" src="{{ asset('/img/comments/'.$comment->img)  }}" alt="{{$comment->tag->name}}">
                        @endif
                    </div>
                        @if(Auth::check())
                            @if(Auth::user()->id == $comment->user_id)
                                <small><a class="pull-right btn btn-primary btn-xs" style="color: white !important;" href="/comment/{{$comment->id}}/edit">edit</a></small>
                            @endif
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
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
                    <div class="alert alert-info">
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
                    <a class="pull-right btn btn-primary btn-xs" style="color: white !important;" href="/threads/{{$thread->slug}}/edit">edit</a>
                @endif
            @endif
            </div>
        </div>
    </div>
</div>

@endsection
