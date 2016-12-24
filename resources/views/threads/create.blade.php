@extends('layouts.app')

@section('content')
<div class="col-md-6">
    <h4 class="text-center">Buat Threads</h4>
    <form id="upload" action="" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }} ">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
            @if($errors->has('title'))
                <span class="help-block"> {{$errors->first('title')}} </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('tag_id') ? ' has-error' : '' }} ">
            <label for="tag_id">Tag</label>
            <select name="tag_id" id="tag_id" class="form-control">
                <option value="">Pilih kategori</option>
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
            <textarea name="body" id="body" rows="10" class="form-control">{{old('body')}}</textarea>
            @if($errors->has('body'))
                <span class="help-block"> {{$errors->first('body')}} </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }} ">
            <div class="alert alert-info">
                @include('layouts.partials.progress')
            </div>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary btn-sm" value="create threads">
        </div>
    </form>
</div>

@endsection
