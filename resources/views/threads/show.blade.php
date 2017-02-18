@extends('layouts.app')

@section('url') http://fidawa.com/threads/{{$thread->slug}} @stop
@section('title') {{$thread->title}} @stop
@section('description') {{ str_limit($thread->body, 150) }} @stop
@section('image') http://fidawa.com/img/threads/{{$thread->img}} @stop

@section('content')

<div class="row">

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="media">
                    <a href="/{{$thread->user->slug}}" class="pull-left">
                    @if($thread->user->img)
                        <img src="{{asset('/img/users/'.$thread->user->img )}}" class="media-object img-circle">
                    @else
                        <img src="{{$thread->user->getAvatar()}}" class="media-object img-circle">
                    @endif
                    </a>        
                    <a href="/{{$thread->user->slug}}"> {{$thread->user->getName()}} </a>
                    <small class="pull-right"> {{$thread->created_at->diffForHumans()}} </small>
                </div>
            @if(Auth::check())
                @if($thread->user_id == Auth::user()->id)
                    <a class="pull-right" href="/threads/{{$thread->slug}}/edit"><img id="icon" src="/background/sunting.svg"></a>
                @endif
            @endif
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="panel panel-default" style="padding: 10px 10px;">
            <div class="media">
                <div class="media">
                    <p><b>{{$thread->title}}</b></p>
                    <a class="btn btn-danger btn-xs" style="color: white !important;" href="/tags/{{$thread->tag->slug}}"><img id="icon" src="/background/tag.svg"> {{$thread->tag->name}}</a>
                    <hr>
                    <div class="fb-like" data-href="http://fidawa.com/threads/{{$thread->slug}}" data-width="250" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                </div>
                <hr>
                <div class="media">
                    @if($thread->img)
                        <img class="img-responsive" src="{{asset('/img/threads/'.$thread->img )}}" alt="{{$thread->tag->name}}" style="margin: 0 auto; padding: 0px 10px;">
                    @endif
                    <div>{!! $thread->body !!}</div>
                    @foreach($comments as $comment)
                    <hr>
                    <div class="media" style="margin-left: 20px;">
                        <div class="media">
                            <a href="/{{$comment->user->slug}}" class="pull-left">
                            @if($comment->user->img)
                                <img src="{{asset('/img/users/'.$comment->user->img )}}" class="media-object img-circle">
                            @else
                                <img src=" {{$comment->user->getAvatar()}}" class="media-object img-circle">
                            @endif
                            </a>
                            <a href="/{{$comment->user->slug}}">{{$comment->user->getName()}}</a>
                            <small> &horbar; {{$comment->created_at->diffForHumans()}}</small>
                        <div class="media">
                            @if($comment->img)
                                <img class="img-responsive" src="{{ asset('/img/comments/'.$comment->img) }}" alt="{{$thread->tag->name}}">
                            @endif
                            <p> {!!$comment->body!!} </p>
                        </div>
                            @if(Auth::check())
                                @if(Auth::user()->id == $comment->user_id)
                                    <small><a class="pull-right" href="/comment/{{$comment->id}}/edit"><img id="icon" src="/background/sunting.svg"></a></small>
                                @endif
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                <hr>
                <div class="text-center"> {{$comments->links()}} </div>
                @if(Auth::check())
                    <form id="upload" action="/comment/{{$thread->slug}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="form-group {{$errors->has('body') ? ' has-error' : ''}} ">
                            <textarea name="body" id="body" rows="10" class="form-control" placeholder="reply-{{Auth::user()->name}}"></textarea>
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
                    <div class="well text-center">
                        <b><a href="/login">Login</a></b> sebelum dapat berkomentar dan menulis di forum.
                        <p>atau</p>
                        @include('layouts.partials.social')
                    </div>
                @endif
            </div>
        </div>
    </div>
    
</div>

@endsection
@section('js')
    <script type="text/javascript">
        $('.center').css({'display':'block','max-width':'100%','height':'auto'});
        $('pre').css({'overflow':'scroll','min-height':'50px','max-height':'150px','width':'100%'});
        $('table').addClass('table table-bordered');
        $('td').addClass('info');
    </script>
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
