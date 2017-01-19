@extends('layouts.app')

@section('content')
<div class="col-md-6">
    <div class="panel panel-default" style="padding: 10px 10px;">
        <h4 class="text-center">Jual Barang Anda di Sini <img id="icon" src="/background/ide.svg"></h4>
        <form action="" method="post" enctype="multipart/form-data">
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
                    <option value="">Select kategory</option>
                    @foreach($jtags as $jtag)
                        <option value=" {{$jtag->id}} "> {{$jtag->name}} </option>
                    @endforeach
                </select>
                @if($errors->has('tag_id'))
                    <span class="help-block"> {{$errors->first('tag_id')}} </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('deskripsi') ? ' has-error' : '' }} ">
                <label for="deskripsi">deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="10" class="form-control">{{old('deskripsi')}}</textarea>
                @if($errors->has('deskripsi'))
                    <span class="help-block"> {{$errors->first('deskripsi')}} </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }} ">
                @include('layouts.partials.uploadfjb')
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-sm" value="post">
            </div>
        </form>
    </div>
</div>

@endsection
