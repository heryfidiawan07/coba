@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default" style="padding: 5px 5px; margin-left: -10px; margin-right: -10px;">
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
                    <option value="">Pilih Kategori</option>
                    @foreach($tags as $tag)
                        <option value=" {{$tag->id}} "> {{$tag->name}} </option>
                    @endforeach
                </select>
                @if($errors->has('tag_id'))
                    <span class="help-block"> {{$errors->first('tag_id')}} </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }} ">
                <label for="body">Header Image</label>
                @if($thread->img)
                <div class="media">
                    <img id="img" src="{{ asset('/img/threads/'.$thread->img)  }}" style="max-height:100px;max-width:150px;">
                    <img id="kategori" class="delete" data-url="/threads/{{$thread->id}}/delete" data-id="{{$thread->id}}" src="/background/delete.svg">
                </div>
                @endif
                <div class="media">
                    @include('layouts.partials.upload')
                </div>
            </div>
            <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }} ">
                <label for="body">Deskripsi</label>
                <label class="pull-right">
                    url gambar ? upload <a href="http://fidiupload.esy.es/"><u>disini</u></a>
                </label>
                <textarea name="body" id="body" rows="20" class="form-control">{{$thread->body}}</textarea>
                @if($errors->has('body'))
                    <span class="help-block"> {{$errors->first('body')}} </span>
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
@section('js')
    <script type="text/javascript" src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script type="text/javascript" src="/js/comtiny.js"></script>
@endsection
