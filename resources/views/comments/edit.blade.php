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
                    <div class="alert alert-info">
                        @if($comment->img)
                            <img src="{{ asset('/img/comments/'.$comment->img)  }}" alt="{{$comment->thread->title}}" style="max-height:100px;max-width:150px;">
                            <a href="/comment/{{$comment->id}}/delete" class="btn btn-warning btn-sm">delete</a>
                        @endif
                        @if(!$comment->img)
                            @include('layouts.partials.commentprogress')
                        @endif
                    </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-info btn-sm" value="update comment">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
