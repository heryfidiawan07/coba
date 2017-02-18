@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="/fjb/{{$comment->jual->slug}}">{{$comment->jual->title}}</a>
            </div>
            <div class="panel-body">
                <form id="upload" action="/commentar/{{$comment->id}}/edit" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="form-group">
                        <textarea name="body" rows="10" class="form-control">{!!$comment->body!!}</textarea>
                    </div>
                    
                    <div class="form-group {{ $errors->has('imgcomment') ? ' has-error' : '' }} ">
                        <div class="media">
                            @if($comment->img)
                                <img id="img" src="{{ asset('/img/jcomments/'.$comment->img)  }}" alt="{{$comment->jual->title}}" style="width: 100px;">
                                <img data-url="/commentar/{{$comment->id}}/delete" data-id="{{$comment->id}}" class="delete" id="kategori" src="/background/delete.svg">
                            @endif
                            <div class="media">
                                @include('layouts.partials.upload')
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-sm" value="update comment">
                    </div>
                </form>
            </div>
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
            'image codesample imagetools','emoticons',
          ],
          toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image codesample | link | emoticons',
          content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.css',
            '//www.tinymce.com/css/codepen.min.css'    
          ]
        });
    </script>
@endsection