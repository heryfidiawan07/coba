$(document).ready(function(){
	$.ajaxSetup({
	  headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});
	$('.deletefjb').on('click', function(){
		var id   = $(this).attr('data-id');
		var urll = $(this).attr('data-url');
		$.ajax({
			method: "GET",
			url   : urll,
			success : function(){
				$('#li_'+id).remove();
			}
		});
	});

	$('.delete').on('click', function(){
		var id   = $(this).attr('data-id');
		var urll = $(this).attr('data-url');
		$.ajax({
			method: "GET",
			url   : urll,
			success : function(){
				$('#img').remove();
				$('.delete').remove();
			}
		});
	});

});