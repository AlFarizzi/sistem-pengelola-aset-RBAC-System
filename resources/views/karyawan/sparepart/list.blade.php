@extends('welcome')

@section('content')
@if (session('Berhasil'))
@push('alert')
    <script>
            swal({
            title: "Berhasil",
            text: "{{session('Berhasil')}}",
            icon: "success",
            buttons: {
                confirm: {
                    text: "Berhasil",
                    value: true,
                    visible: true,
                    className: "btn btn-success",
                    closeModal: true
                }
            }
        });
    </script>
@endpush
@endif
    @include('table.head')
        <thead>
            <tr>
                <th>Sparepart</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($spareparts as $item)
                <tr>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->harga}}</td>
                    <td>{{$item->jumlah}}</td>
                    <td>{{$item->total}}</td>
                    <td>
                        <form action="{{route('sparepart.request.cancel',$item)}}" method="post">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Yakin Akan Membatalkan Permintaan Service Ini ?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"> Batalkan</i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    @include('table.footer')
@endsection