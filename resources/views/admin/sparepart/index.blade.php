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
<div class="main-panel" x-data="{tab: 1}">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                        <ul class="nav nav-pills nav-primary card-header-pills">
                            @can('Confirm & Reject Sparepart Request')
                                <li class="nav-item">
                                    <a class="nav-link" :class="{active: tab == 1}"  href="#" @click="tab = 1" >Konfirmasi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" :class="{active: tab == 2}" href="#" @click="tab = 2" >Belum Konfirmasi</a>
                                </li>
                            @endcan
                            @can('CRUD Sparepart')
                                <li class="nav-item">
                                    <a class="nav-link" :class="{active: tab == 3}" href="#" @click="tab = 3" >Tambah Sparepart</a>
                                </li>
                            @endcan
                        </ul>
                        </div>
                        @can('Confirm & Reject Sparepart Request')
                            <div class="card-body" x-show="tab == 1">
                                <table id="basic-datatables" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Nama Sparepart</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($confir as $conf)
                                            <tr>
                                                <td>{{$conf->nama}}</td>
                                                <td>Rp.{{number_format($conf->harga)}}</td>
                                                <td>{{number_format($conf->jumlah)}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-body" x-show="tab == 2">
                                <table id="basic-datatables2" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Nama Sparepart</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th style="text-align: center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($b_confir as $conf)
                                            <tr>
                                                <td>{{$conf->nama}}</td>
                                                <td>{{number_format($conf->harga)}}</td>
                                                <td>{{number_format($conf->jumlah)}}</td>
                                                <td style="text-align: center;">
                                                    <form action="{{route('sparepart.confirm',$conf)}}" method="post" style="display: inline" >
                                                        @csrf
                                                        @method('put')
                                                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"> Konfirmasi</i></button>
                                                    </form>
                                                    <form action="{{route('sparepart.reject',$conf)}}" method="post" style="display: inline;" >
                                                    @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Tolak</button>
                                                    </form>
                                                    {{-- <a href="{{route('sparepart.confirm'$conf)}}" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Konfirmasi</a>
                                                    <a href="{{route('sparepart.reject',$conf)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Tolak</a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endcan
                        @can('CRUD Sparepart')
                            <div class="card-body" x-show="tab == 3">
                                <form action="{{route('sparepart.create')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label">Nama Sparepart</label>
                                        <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Sparepart">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">harga</label>
                                        <input type="number" name="harga" class="form-control" placeholder="Masukan Harga Sparepart per Buah">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">jumlah</label>
                                        <input type="number" name="jumlah" class="form-control" placeholder="Masukan harga Sparepart">
                                    </div>
                                    <button type="submit" class="ml-3 btn btn-primary btn-sm"><i class="fa fa-paper-plane"></i> Kirim</button>
                                </form>
                            </div>
                        @endcan
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection