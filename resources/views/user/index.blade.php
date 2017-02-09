@extends('layouts.app')

@section('url') http://fidawa.com/{{$user->slug}} @stop
@section('title') {{$user->name}} @stop
@section('description') {{$user->tentang}} @stop
@section('image') http://fidawa.com/img/users/{{$user->img}} @stop

@section('content')
<div class="panel panel-default">
    <div class="row">
        <div class="col-md-6">
            <div class="media" style="padding-top: 10px; padding-left: 10px; padding-bottom: 10px;">
                <span class="pull-left">
                    <img width="150px" src="{{$user->getAvatar()}}" class="img-responsive" onerror="this.style.display='none'">
                    <img width="150px" src="{{asset('/img/users/'.$user->getAvatar() )}}" class="img-responsive" onerror="this.style.display='none'">
                </span>
                <div class="media-body">
                    <h4 class="media-heading"><b>{{$user->getName()}}</b></h4>
                    @if($user->tentang == null)
                        <p> No status </p>
                    @else
                        <p id="tentang" class="media-heading">{!!nl2br($user->tentang)!!}</p>
                    @endif
                    <p>Joined :  {{$user->created_at->diffForHumans()}} </p>
                </div>
                <div class="fb-like" data-href="http://fidawa.com/{{$user->slug}}" data-width="250" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
            </div>
        </div>

        <div class="col-md-6">
            @if(Auth::check())
                @if(Auth::user()->id == $user->id)
                    <div class="panel-body">
                        <span class="help-block" style="color: red;"><i>{{ Session::get('ganti') }}</i></span>
                        <details>
                        <summary><img id="icon" src="/background/sunting.svg">Edit name</summary>
                            <form class="form-inline" action="/edit-name/{{$user->id}}" method="post">
                            {{csrf_field()}}
                                <div class="form-group {{ $errors->has('edit_name') ? ' has-error' : '' }} ">
                                    <input name="edit_name" class="form-control input-sm" type="text" placeholder="name : max 20 karakter.">
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
                                <textarea name="tentang" class="form-control input-sm" placeholder="Tentang diri anda : max 100 karakter." cols="40" rows="2"></textarea>
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

<div class="row"><div class="text-center"><h3><u> Forum </u></h3></div></div>
    <br>
@if($threadsphoto->count())
    <div class="row">@include('news.newthreadsphoto')</div>
    <div class="row"><div class="text-center"> {{$threadsphoto->links()}} </div></div>
@endif

@if($threads->count())
    <div class="row">@include('news.newthreads')</div>
    <div class="row"><div class="text-center">{{$threads->links()}} </div></div>
@endif

@if(!$threads->count() AND !$threadsphoto->count())
    <div class="row">
        <p class="lead">{{$user->getName()}} belum menulis forum.</p>
        <hr>
    </div>
@endif

<div class="row"><div class="text-center"><h3><u> Jual beli </u></h3></div></div>
    <br>
@if($jualsphotos->count())
    <div class="row">@include('news.fjbnewsphoto')</div>
    <div class="row"><div class="text-center"> {{$jualsphotos->links()}} </div></div>
@endif

@if($juals->count())
    <div class="row">@include('news.fjbnews')</div>
    <div class="row"><div class="text-center"> {{$juals->links()}} </div></div>
@endif

@if(!$jualsphotos->count() AND !$juals->count())
    <div class="row">
        <p class="lead">{{$user->getName()}} belum menulis di fjb.</p>
        <hr>
    </div>
@endif

@endsection
