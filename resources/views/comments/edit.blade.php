@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading"><a href="/threads/{{$comment->thread->slug}}">{{$comment->thread->title}}</a> </div>
            <div class="panel-body">
                <form id="upload" action="/comment/{{$comment->id}}/edit" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="form-group">
                        <textarea name="body" rows="7" class="form-control"> {{$comment->body}} </textarea>
                    </div>
                    <div class="form-group {{ $errors->has('imgcomment') ? ' has-error' : '' }} ">
                    <div class="media">
                        @if($comment->img)
                            <img id="img" src="{{ asset('/img/comments/'.$comment->img)  }}" alt="{{$comment->thread->title}}" style="max-height:100px;max-width:150px;">
                            <img data-url="/comment/{{$comment->id}}/delete" class="delete" id="kategori" data-id="{{$comment->id}}" src="/background/delete.svg">
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
