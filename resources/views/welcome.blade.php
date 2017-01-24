@extends('layouts.app')

@section('title') Fidawa - Forum Diskusi dan Forum Jual Beli. @stop
@section('description') Diskusikan apa yang ingin anda tanyakan di forum. Cari barang atau pasang iklan anda di forum jual beli. @stop
@section('image') http://fidawa.com/icon2.jpg @stop

@section('content')
<div class="container">
		@include('layouts.partials.welcomecontent')	
</div>
@endsection
@section('js') <script src="/js/welcontent.js"></script> @stop