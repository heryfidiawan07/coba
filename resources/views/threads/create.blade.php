@extends('layouts.app')

@section('content')
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default" style="padding: 10px 10px;">
        <form id="upload" action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }} ">
                <label for="title">Judul</label>
                <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
                <span class="help-block" style="color: red;"><i>{{ Session::get('ganti') }}</i></span>
                @if($errors->has('title'))
                    <span class="help-block"> {{$errors->first('title')}} </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('tag_id') ? ' has-error' : '' }} ">
                <label for="tag_id">Kategori</label>
                <select name="tag_id" id="tag_id" class="form-control">
                    <option value="">Select kategory</option>
                    @foreach($tags as $tag)
                        <option value=" {{$tag->id}} "> {{$tag->name}} </option>
                    @endforeach
                </select>
                @if($errors->has('tag_id'))
                    <span class="help-block"> {{$errors->first('tag_id')}} </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }} ">
                <label for="body">Deskripsi</label>
                <textarea name="body" id="body" rows="20" class="form-control">{{old('body')}}</textarea>
                @if($errors->has('body'))
                    <span class="help-block"> {{$errors->first('body')}} </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }} ">
                <div class="media">
                    @include('layouts.partials.upload')
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-sm" value="create threads">
            </div>
        </form>
    </div>
</div>

@endsection
@section('js')
    <script type="text/javascript" src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        tinymce.init({
          selector: 'textarea',
          menubar: false,
          plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code'
          ],
          toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
        });
    </script>
@endsection