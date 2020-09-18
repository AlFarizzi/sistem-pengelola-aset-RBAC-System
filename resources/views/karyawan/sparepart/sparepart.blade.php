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
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Permintaan Service</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route("sparepart.request.send")}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">Nama Sparepart</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Sparepart">
                                </div>
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label class="form-label">Harga Sparepart</label>
                                        <input type="number" name="harga" class="form-control" placeholder="Masukan Harga Sparepart per Buah">
                                    </div>
                                    <div class="col form-group">
                                        <label  class="form-label">Jumlah</label>
                                        <input type="number" name="jumlah" class="form-control" placeholder="Masukan Jumlah Sparepart Yang Diminta">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-paper-plane"> Kirim</i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection