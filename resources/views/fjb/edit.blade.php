@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
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
            <div class="form-group {{ $errors->has('deskripsi') ? ' has-error' : '' }} ">
                <label for="deskripsi">Deskription</label>
                <textarea name="deskripsi" id="deskripsi" rows="10" class="form-control">{{$jual->deskripsi}}</textarea>
                @if($errors->has('deskripsi'))
                    <span class="help-block"> {{$errors->first('deskripsi')}} </span>
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
            @if(count($jual->galery) < 4)
                @include('layouts.partials.uploadfjb')
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
