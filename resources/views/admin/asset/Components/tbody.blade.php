<tr>
    <td>{{$item->plat_nomor}}</td>
    <td>{{$item->nama_asset}}</td>
    {{-- <td>{{\Carbon\Carbon::parse($item->tgl_perolehan)->diffForHumans()}}</td>
    <td>{{\Carbon\Carbon::parse($item->tgl_service)->diffForHumans()}}</td>
    <td>{{\Carbon\Carbon::parse($item->tgl_limit)->diffForHumans()}}</td>
    <td>{{\Carbon\Carbon::parse($item->tgl_pajak)->diffForHumans()}}</td> --}}
    <td style="text-align: center;">
        <a href="#" data-asset="{{$item->plat_nomor}}" id="edit" style="display: inline" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i> Edit</a>
        <form style="display: inline" action="{{route('asset.destroy',$item)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
        </form>
    </td>
</tr>