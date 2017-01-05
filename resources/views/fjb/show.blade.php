
@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default" style="padding: 10px 10px;">
            <div class="media">
            @if(count($jual->galery()->first()) > 0)
                <div class="panel-body">
                    <div class="media">
                        @include('news.slideshowfjb')
                    </div>
                </div>
            @endif
                <div class="media">
                    <p>{{$jual->title}}</p>
                    <a class="btn btn-danger btn-xs" style="color: white !important;" href="/kategory/{{$jual->tag->name}}"><img id="icon" src="/background/tag.svg"> {{$jual->tag->name}}</a>
                </div>
                <hr>
                <div class="media">
                    <p>{{$jual->deskripsi}}</p>
                    @foreach($jcomments as $jcomment)
                    <hr>
                    <div class="media" style="margin-left: 20px;">
                        <div class="media">
                            <a href="/{{$jcomment->user->getName()}}" class="pull-left">
                              <img src=" {{$jcomment->user->getAvatar()}} " class="media-object img-circle" onerror="this.style.display='none'">
                              <img src="{{asset('/img/users/'.$jcomment->user->getAvatar() )}}" class="media-object img-circle" onerror="this.style.display='none'">
                            </a>
                            <a href="/{{$jcomment->user->name}}">{{$jcomment->user->getName()}}</a>
                            <small> &horbar; {{$jcomment->created_at->diffForHumans()}}</small>
                        <div class="media">
                            @if($jcomment->img)
                                <div class="text-center">
                                    <img class="img-rounded img-responsive" src="{{ asset('/img/comments/'.$jcomment->img)  }}" alt="{{$jual->tag->name}}">
                                </div>
                            @endif
                            <p> {{$jcomment->body}} </p>
                        </div>
                            @if(Auth::check())
                                @if(Auth::user()->id == $jcomment->user_id)
                                    <small>
                                        <a class="pull-right" href="/commentar/{{$jcomment->id}}/edit"><img id="icon" src="/background/sunting.svg"></a>
                                    </small>
                                @endif
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
        
        
                @if(Auth::check())
                <hr>
                    <form action="/commentar/{{$jual->slug}}" method="post" enctype="multipart/form-data">
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
                    <a href="/{{$jual->user->getName()}}" class="pull-left">
                      <img src="{{$jual->user->getAvatar()}}" class="media-object img-circle" onerror="this.style.display='none'">
                      <img src="{{asset('/img/users/'.$jual->user->getAvatar() )}}" class="media-object img-circle" onerror="this.style.display='none'">
                    </a>        
                    <a href="/{{$jual->user->name}}"> {{$jual->user->getName()}} </a>
                    <small class="pull-right"> {{$jual->created_at->diffForHumans()}} </small>
                </div>
            @if(Auth::check())
                @if($jual->user_id == Auth::user()->id)
                    <small><a class="pull-right" href="/fjb/{{$jual->slug}}/edit"><img id="icon" src="/background/sunting.svg"></a></small>
                    <!-- //tidak bissa jika begini /threads/{slug}/edit -->
                @endif
            @endif
            </div>
        </div>
    </div>
</div>

@endsection
