@extends('layouts.app')

@section('url') http://fidawa.com/fjb/{{$jual->slug}} @stop
@section('title') {{$jual->title}} @stop
@section('description') {{ str_limit($jual->deskripsi, 150) }} @stop
@section('image') 
    @if(count($jual->galery))
        http://fidawa.com/img/fjb/{{$jual->galery->first()->img}} 
    @endif
@stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/slider1.css">
@stop
@section('content')

<div class="row">
    
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="media">
                    <a href="/{{$jual->user->slug}}" class="pull-left">
                    @if($jual->user->img)
                        <img src="{{asset('/img/users/'.$jual->user->img )}}" class="media-object img-circle">
                    @else
                        <img src="{{$jual->user->getAvatar()}}" class="media-object img-circle">
                    @endif
                    </a>        
                    <a href="/{{$jual->user->slug}}"> {{$jual->user->getName()}} </a>
                    <small class="pull-right"> {{$jual->created_at->diffForHumans()}} </small>
                </div>
            @if(Auth::check())
                @if($jual->user_id == Auth::user()->id)
                    <small><a class="pull-right" href="/fjb/{{$jual->slug}}/edit"><img id="icon" src="/background/sunting.svg"></a></small>
                    <!-- //tidak bissa jika begini /threads/{slug}/edit -->
                @endif
            @endif
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="panel panel-default" style="padding: 10px 10px;">
            <div class="media">
            @if(count($jual->galery()->first()) > 0)
                <div class="panel-body">
                    <div class="media">
                        @include('news.slideshowfjb')
                    </div>
                </div>
            @endif
                <h4 class="text-center">
                    <small><strike>Rp {!!number_format($jual->hargaNormal)!!}</strike></small>
                    <small style="background-color: yellow;"> - Rp {!!number_format($jual->diskon)!!}</small>
                    <br><b style="color: red;"> RP {!!number_format($jual->hargaNormal - $jual->diskon)!!} </b>
                    <small><i>- {!!number_format($jual->diskon / $jual->hargaNormal * 100)!!}%</i></small>
                </h4>
                <div class="media">
                    <p><b>{{$jual->title}}</b></p>
                    <a class="btn btn-danger btn-xs" style="color: white !important;" href="/kategory/{{$jual->tag->slug}}"><img id="icon" src="/background/tag.svg"> {{$jual->tag->name}}</a>
                    <hr>
                    <div class="fb-like" data-href="http://fidawa.com/fjb/{{$jual->slug}}" data-width="250" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                </div>
                <hr>
                <div class="media">
                    <div>{!! $jual->deskripsi !!}</div>
                    @foreach($jcomments as $jcomment)
                    <hr>
                    <div class="media" style="margin-left: 20px;">
                        <div class="media">
                            <a href="/{{$jcomment->user->slug}}" class="pull-left">
                            @if($jual->user->img)
                                <img src="{{asset('/img/users/'.$jcomment->user->img )}}" class="media-object img-circle">
                            @else
                                <img src=" {{$jcomment->user->getAvatar()}} " class="media-object img-circle">
                            @endif
                            </a>
                            <a href="/{{$jcomment->user->name}}">{{$jcomment->user->getName()}}</a>
                            <small> &horbar; {{$jcomment->created_at->diffForHumans()}}</small>
                        <div class="media">
                            @if($jcomment->img)
                                <div class="text-center">
                                    <img class="img-responsive" src="{{ asset('/img/jcomments/'.$jcomment->img)  }}" alt="{{$jual->tag->name}}">
                                </div>
                            @endif
                            <p> {!!$jcomment->body!!} </p>
                        </div>
                            @if(Auth::check())
                                @if(Auth::user()->id == $jcomment->user_id)
                                    <small>
                                        <a class="pull-right" href="/commentar/{{$jcomment->id}}/edit"><img id="icon" src="/background/sunting.svg"></a>
                                    </small>
                                @endif
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                <hr>
                <div class="text-center"> {{$jcomments->links()}} </div>
                @if(Auth::check())
                    <form action="/commentar/{{$jual->slug}}" method="post" enctype="multipart/form-data">
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
    <script src="/js/slider-22.0.6.mini.js" type="text/javascript"></script>
    <script src="/js/slider1.js" type="text/javascript"></script>
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