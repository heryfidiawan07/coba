@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="/fjb/{{$comment->jual->slug}}">{{$comment->jual->title}}</a>
            </div>
            <div class="panel-body">
                <form id="upload" action="/commentar/{{$comment->id}}/edit" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="form-group">
                        <textarea name="body" rows="7" class="form-control"> {{$comment->body}} </textarea>
                    </div>
                    
                    <div class="form-group {{ $errors->has('imgcomment') ? ' has-error' : '' }} ">
                        <div class="media">
                            @if($comment->img)
                                <img id="img" src="{{ asset('/img/comments/'.$comment->img)  }}" alt="{{$comment->jual->title}}" style="width: 100px;">
                                <img data-url="/commentar/{{$comment->id}}/delete" data-id="{{$comment->id}}" class="delete" id="kategori" src="/background/delete.svg">
                            @endif
                            @if(!$comment->img)
                                @include('layouts.partials.upload')
                            @endif
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
