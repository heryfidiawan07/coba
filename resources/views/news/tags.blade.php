@if(Auth::check())
  <a href="/threads/mythreads" class="btn btn-danger btn-sm" style="color: white !important;">Threads saya</a>
  <br><br>
@endif

<table class="table table-condensed">
    <th class="warning"><h3>Kategori</h3></th>
    @foreach($tags as $tag)
      <tr class="success">
        <td class="info">
          <a href="/tags/{{$tag->slug}}"> {{$tag->name}} </a>
        </td>
      </tr>
    @endforeach
</table>
<hr>