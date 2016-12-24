@if(Auth::check())
	<a href="/barang-di-jual/mythreads" class="btn btn-danger btn-sm" style="color: white !important;">Iklan saya</a>
  <br><br>
@endif

<table class="table table-condensed">
    <th class="warning"><h3>Kategori</h3></th>
    @foreach($jtags as $jtag)
      <tr>
        <td class="info">
          <a href="/kategory/{{$jtag->slug}}"> {{$jtag->name}} </a>
        </td>
      </tr>
    @endforeach
</table>
<hr>