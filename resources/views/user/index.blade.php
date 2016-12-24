@extends('layouts.app')

@section('content')
<div class="alert alert-info">
    <div class="row">
        <div class="col-md-6">
            <div class="media">
                <span class="pull-left">
                    <img width="150px" src="{{$user->getAvatar()}}" class="media-object" onerror="this.style.display='none'">
                    <img width="150px" src="{{asset('/img/users/'.$user->getAvatar() )}}" class="media-object" onerror="this.style.display='none'">
                </span>
                <div class="media-body">
                    <h5 class="media-heading"> {{$user->getName()}} </h5>
                    <p>Joined :  {{$user->created_at->diffForHumans()}} </p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="alert alert-success">
                @if(Auth::check())
                    @if(Auth::user()->id == $user->id)
                        <form class="form-inline" action="/edit-name/{{$user->id}}" method="post">
                        {{csrf_field()}}
                            <div class="form-group {{ $errors->has('edit_name') ? ' has-error' : '' }} ">
                                <input name="edit_name" class="form-control input-sm" type="text" placeholder="edit name">
                                @if($errors->has('edit_name'))
                                    <span class="help-block"> {{$errors->first('edit_name')}} </span>
                                @endif
                            </div>
                            <button class="btn btn-warning btn-sm" type="submit">Edit name</button>
                        </form>
                        <form class="form-inline" action="/edit-gravatar/{{$user->id}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }} ">
                                <label for="exampleInputFile"><i style="font-size: 12px;">ganti foto profil : jpg, png</i></label>
                                <input type="file" id="exampleInputFile" name="img">
                                @if($errors->has('img'))
                                    <span class="help-block"> {{$errors->first('img')}} </span>
                                @endif
                            </div>
                            <button class="btn btn-warning btn-sm" type="submit">Edit img</button>
                        </form>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
<hr>

<div class="row">

	<div class="col-md-3">
        @include('news.tags')
    </div>

    <div class="col-md-9">
        @if(!$threads->count())
            <p class="lead">Tidak ada threads di sini</p>
            <hr>
        @endif
        @foreach($threads as $thread)
            <div class="media">
                <a href="/{{$thread->user->getName()}}" class="pull-left">
                    <img src=" {{$thread->user->getAvatar()}} " alt="" class="media-object img-circle" onerror="this.style.display='none'">
                    <img src="{{asset('/img/users/'.$thread->user->getAvatar() )}}" class="media-object img-circle" onerror="this.style.display='none'">
                </a>
                <div class="media-body">
                    <div class="media-heading"><a href="/threads/{{$thread->slug}} ">{{$thread->title}}</a> ({{$thread->tag->name}}<a href=""></a>) </div>
                    <p> {{$thread->created_at->diffForHumans()}} by <a href="/{{$thread->user->getName()}}"> {{$thread->user->getName()}} </a> </p>
                </div>
            </div>
            <hr>
        @endforeach
        {{$threads->links()}}
    </div>
    
</div>
@endsection
