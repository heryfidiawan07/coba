<div id="tmp"></div>
<label for="media"><i style="font-size: 12px;">Tambahkan gambar : jpg, png</i></label>
<input type="file" id="media" name="img">
@if($errors->has('img'))
    <span class="help-block"> {{$errors->first('img')}} </span>
@endif
