@if(Auth::check())
	<a href="/fjb/mythreads" class="btn btn-warning btn-sm" style="color: white !important;">My JB</a>
  <br><br>
@endif

<table class="table table-condensed">
    <th class="warning"><h3>Jual beli</h3></th>
    @foreach($jtags as $jtag)
      <tr>
        <td class="info">
          <a href="/kategory/{{$jtag->slug}}"><img id="icon" src="/background/tag.svg"> {{$jtag->name}} </a>
        </td>
      </tr>
    @endforeach
</table>
<hr>