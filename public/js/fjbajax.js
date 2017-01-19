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
			success : function(data){	
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
			success : function(data){
				if (data.img == null) {
					$('#img').remove();
					$('.delete').remove();
				}
			}
		});
	});

});