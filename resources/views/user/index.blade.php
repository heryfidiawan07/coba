@extends('layouts.app')

@section('url') http://fidawa.com/{{$user->name}} @stop
@section('title') {{$user->name}} @stop
@section('description') {{$user->tentang}} @stop
@section('image') http://fidawa.com/img/users/{{$user->img}} @stop

@section('content')
<div class="panel panel-default">
    <div class="row">
        <div class="col-md-6">
            <div class="media" style="padding-top: 10px; padding-left: 10px; padding-bottom: 10px;">
                <span class="pull-left">
                @if($user->img == null)
                    <img width="150px" src="{{$user->getAvatar()}}" class="img-responsive">
                @else
                    <img width="150px" src="{{asset('/img/users/'.$user->getAvatar() )}}" class="img-responsive">
                @endif
                </span>
                <div class="media-body">
                    <h4 class="media-heading"><b>{{$user->getName()}}</b></h4>
                    <p class="media-heading">{{$user->tentang}}</p>
                    <p>Joined :  {{$user->created_at->diffForHumans()}} </p>
                </div>
                <div class="fb-like" data-href="http://fidawa.com/{{$user->name}}" data-width="250" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
            </div>
        </div>

        <div class="col-md-6">
            @if(Auth::check())
                @if(Auth::user()->id == $user->id)
                    <div class="panel-body">
                        <details>
                        <summary><img id="icon" src="/background/sunting.svg">Edit name</summary>
                            <form class="form-inline" action="/edit-name/{{$user->id}}" method="post">
                            {{csrf_field()}}
                                <div class="form-group {{ $errors->has('edit_name') ? ' has-error' : '' }} ">
                                    <input name="edit_name" class="form-control input-sm" type="text" placeholder="edit name">
                                    @if($errors->has('edit_name'))
                                        <span class="help-block"> {{$errors->first('edit_name')}} </span>
                                    @endif
                                </div>
                                <button class="btn btn-primary btn-sm" type="submit">edit name</button>
                            </form>
                        </details>
                        <br>
                        <details>
                        <summary><img id="icon" src="/background/sunting.svg">Edit foto profil</summary>
                            <form class="form-inline" action="/edit-gravatar/{{$user->id}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }} ">
                                    @include('layouts.partials.upload')
                                    <br>
                                    <button class="btn btn-primary btn-sm" type="submit">ubah foto profil</button>
                                </div>
                            </form>
                        </details>
                        <br>
                        <form class="form-inline" action="/tentang/{{$user->id}}" method="post">
                        {{csrf_field()}}
                            <div class="form-group {{ $errors->has('tentang') ? ' has-error' : '' }} ">
                                <textarea name="tentang" class="form-control input-sm" placeholder="Tentang diri anda" cols="40" rows="2"></textarea>
                                @if($errors->has('tentang'))
                                    <span class="help-block"> {{$errors->first('tentang')}} </span>
                                @endif
                            </div>
                            <button class="btn btn-primary btn-sm" type="submit">post</button>
                        </form>
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="text-center">
        <h3><u> Forum </u></h3>
        <br>
        @if(!$threads->count())
            <p class="lead">{{$user->getName()}} belum menulis forum.</p>
            <hr>
        @endif
    </div>
    @foreach($threads as $thread)
        <div class="col-md-4">
            <div class="media">
                <a href="/{{$thread->user->getName()}}" class="pull-left">
                @if($thread->user->img == null)
                    <img src=" {{$thread->user->getAvatar()}} " class="img-responsive img-circle">
                @else
                    <img src="{{asset('/img/users/'.$thread->user->getAvatar() )}}" class="img-responsive img-circle">
                @endif
                </a>
                <div class="media-body">
                    <div class="media-heading">
                        <a href="/threads/{{$thread->slug}} ">{{str_limit($thread->title, 50)}}</a>
                        <br>
                        <a href="/tags/{{$thread->tag->name}}" class="btn btn-danger btn-xs" style="color: white !important;"><img id="icon" src="/background/tag.svg">{{$thread->tag->name}}</a>
                    </div>
                    <p> <small>{{$thread->created_at->diffForHumans()}}</small> by <a href="/{{$thread->user->getName()}}"> {{$thread->user->getName()}} </a> </p>
                </div>
                <div class="panel-footer"><a href="/threads/{{$thread->slug}} ">{{$thread->countComments()}} comment</a></div>
            </div>
            <hr>
        </div>
    @endforeach
</div>
<div class="row">
    <div class="text-center">
        {{$threads->links()}}
    </div>
</div>
    
<div class="row">
    <div class="text-center">
        <h3><u> Jual beli </u></h3>
        <br>
        @if(!$juals->count())
            <p class="lead">{{$user->getName()}} belum menulis di fjb.</p>
            <hr>
        @endif
    </div>
    @foreach($juals as $jual)
        <div class="col-md-4">
            <div class="media">
                <a href="/{{$jual->user->getName()}}" class="pull-left">
                @if($jual->user->img == null)
                    <img src=" {{$jual->user->getAvatar()}} " class="img-circle img-responsive">
                @else
                    <img src="{{asset('/img/users/'.$jual->user->getAvatar() )}}" class="img-circle img-responsive">
                @endif
                </a>
                <div class="media-body">
                    <div class="media-heading">
                        <a href="/fjb/{{$jual->slug}}">{{str_limit($jual->title)}}</a>
                        <br>
                        <a href="/kategory/{{$jual->tag->name}}" class="btn btn-danger btn-xs" style="color: white !important;"><img id="icon" src="/background/tag.svg">{{$jual->tag->name}}</a>
                    </div>
                    <p> <small>{{$jual->created_at->diffForHumans()}}</small> by <a href="/{{$jual->user->getName()}}"> {{$jual->user->getName()}} </a> </p>
                </div>
                <div class="panel-footer"><a href="/fjb/{{$jual->slug}} ">{{$jual->countComments()}} comment</a></div>
            </div>
            <hr>
        </div>
    @endforeach
</div>
<div class="row">
    <div class="text-center">
        {{$juals->links()}}
    </div>
</div>
@endsection
