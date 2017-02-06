@extends('layouts.app')

@section('content')

		@include('layouts.partials.welcomecontent')	
		<div class="row">
        @include('news.newthreadsphoto')
    </div>

    <br>

    <div class="row">
        @include('news.fjbnewsphoto')
    </div>

@endsection
@section('js') <script src="/js/welcontent.js"></script> @stop