@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default" style="padding-left: 20px; padding-right: 20px;">
        <div class="panel-heading text-center">
            <h3><small><a href="/fjb/{{$jual->slug}} ">{{$jual->title}}</a></small></h3>
        </div>

        <form action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }} ">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{$jual->title}}">
                @if($errors->has('title'))
                    <span class="help-block"> {{$errors->first('title')}} </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('tag_id') ? ' has-error' : '' }} ">
                <label for="tag_id">Tag</label>
                <select name="tag_id" id="tag_id" class="form-control">
                    <option value="{{$jual->tag->id}}"> {{$jual->tag->name}} </option>
                    <option value="">Pilih tags anda</option>
                    @foreach($jtags as $jtag)
                        <option value=" {{$jtag->id}} "> {{$jtag->name}} </option>
                    @endforeach
                </select>
                @if($errors->has('tag_id'))
                    <span class="help-block"> {{$errors->first('tag_id')}} </span>
                @endif
            </div>
            <div class="form-group form-inline {{ $errors->has('hargaNormal') ? ' has-error' : '' }} ">
                <label for="hargaNormal" style="width: 100px;">Harga Normal</label>
                <input type="number" name="hargaNormal" value="{{$jual->hargaNormal}}" class="form-control bfh-number">
                @if($errors->has('hargaNormal'))
                    <span class="help-block"> {{$errors->first('hargaNormal')}} </span>
                @endif
            </div>
            <div class="form-group form-inline {{ $errors->has('diskon') ? ' has-error' : '' }} ">
                <label for="diskon" style="width: 100px;">Diskon</label>
                <input type="number" name="diskon" value="{{$jual->diskon}}" class="form-control bfh-number">
                @if($errors->has('diskon'))
                    <span class="help-block"> {{$errors->first('diskon')}} </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }} ">
            @if(count($jual->galery) > 0)
                <div class="media">
                    @foreach($jual->galery as $galery)
                        <li style="display: inline-block;" id="li_{{$galery->id}}">
                        <img src="{{ asset('/img/fjb/'.$galery->img)  }}" alt="{{$jual->tag->name}}" style="max-height:100px;max-width:150px;"><br>
                        <div class="text-center">
                            <img data-url="/fjb/{{$galery->id}}/delete" class="deletefjb" data-id="{{$galery->id}}" id="kategori" src="/background/delete.svg">
                        </div>
                        </li>
                    @endforeach
                </div>
            @endif
            </div>
            
            @include('layouts.partials.uploadfjb')

            <div class="form-group {{ $errors->has('deskripsi') ? ' has-error' : '' }} ">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="20" class="form-control">{{$jual->deskripsi}}</textarea>
                @if($errors->has('deskripsi'))
                    <span class="help-block"> {{$errors->first('deskripsi')}} </span>
                @endif
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-sm" value="update">
            </div>
        </form>
    </div>
    </div>
</div>
@endsection
@section('js')
    <script type="text/javascript" src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        tinymce.init({
          selector: 'textarea',
          menubar: false,
          theme: 'modern',
          image_caption: true,
          imagetools_cors_hosts: ['tinymce.com', 'codepen.io'],
          plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime table contextmenu paste code',
            'image codesample imagetools','table','emoticons',
          ],
          toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image codesample | link | table | emoticons',
          content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.css',
            '//www.tinymce.com/css/codepen.min.css'    
          ]
        });
    </script>
@endsection