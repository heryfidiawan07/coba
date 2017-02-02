@extends('layouts.app')

@section('content')
<div class="container">
		@include('layouts.partials.welcomecontent')	
		<div class="row">
      <div class="col-md-12">
        @include('news.newthreadsphoto')
      </div>
    </div>

    <hr>

    <div class="row">
      <div class="col-md-12">
        @include('news.fjbnewsphoto')
      </div>
    </div>
</div>
@endsection
@section('js') <script src="/js/welcontent.js"></script> @stop