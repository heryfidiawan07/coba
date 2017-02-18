
	<div>
		<button type="button" class="btn btn-demo" data-toggle="modal" data-target="#myModal">
			Kategory &#62;&#62;
		</button>
	</div>
	<!-- Modal -->
	<div class="modal left fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#60; close</span></button>
					<h4 class="modal-title" id="myModalLabel" style="color: white;">Kategory</h4>
				</div>

				<div class="modal-body">
					@include('news.tags')
					<hr>
					@include('news.jtags')
				</div>

			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->
