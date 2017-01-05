<div id="tmp" class="pull-right" style="margin-left: 10px;"></div>
<input type="file" name="img" class="file" id="media">
<div class="input-group col-sm-9">
		<span class="input-group-addon"><img id="icon" src="/background/upload.svg"></span>
  	<input type="text" class="form-control" disabled placeholder="Upload Image">
  	<span class="input-group-btn">
    	<button class="browse btn btn-primary" type="button">Browse</button>
  	</span>
</div>                            
@if($errors->has('img'))
    <span class="help-block"> {{$errors->first('img')}} </span>
@endif