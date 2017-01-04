@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
    <div class="panel panel-default" style="padding-left: 20px; padding-right: 20px;">
        <div class="panel-heading text-center">
            <h3><small><a href="/threads/{{$thread->slug}} ">{{$thread->title}}</a></small></h3>
        </div>

        <form id="upload" action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }} ">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{$thread->title}}">
                @if($errors->has('title'))
                    <span class="help-block"> {{$errors->first('title')}} </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('tag_id') ? ' has-error' : '' }} ">
                <label for="tag_id">Tag</label>
                <select name="tag_id" id="tag_id" class="form-control">
                    <option value="{{$thread->tag->id}}"> {{$thread->tag->name}} </option>
                    <option value="">Pilih tags anda</option>
                    @foreach($tags as $tag)
                        <option value=" {{$tag->id}} "> {{$tag->name}} </option>
                    @endforeach
                </select>
                @if($errors->has('tag_id'))
                    <span class="help-block"> {{$errors->first('tag_id')}} </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }} ">
                <label for="body">Body</label>
                <textarea name="body" id="body" rows="10" class="form-control">{{$thread->body}}</textarea>
                @if($errors->has('body'))
                    <span class="help-block"> {{$errors->first('body')}} </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }} ">
                @if($thread->img)
                <div class="alert alert-warning">
                    <img src="{{ asset('/img/threads/'.$thread->img)  }}" style="max-height:100px;max-width:150px;">
                    <a href="/threads/{{$thread->id}}/delete"><img id="icon" src="/background/delete.svg"></a>
                </div>
                @endif
                @if(!$thread->img)
                    <div class="alert alert-warning">
                        @include('layouts.partials.upload')
                    </div>
                @endif
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-sm" value="update threads">
            </div>
        </form>
    </div>
    </div>
</div>
@endsection
