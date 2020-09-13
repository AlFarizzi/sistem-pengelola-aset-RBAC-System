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
                                <li class="nav-item">
                                    <a class="nav-link" :class="{active: tab == 1}"  href="#" @click="tab = 1" >Konfirmasi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" :class="{active: tab == 2}" href="#" @click="tab = 2" >Belum Konfirmasi</a>
                                </li>
                        </ul>
                        </div>
                            <div class="card-body" x-show="tab == 1">
                                <table id="basic-datatables" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Jenis</th>
                                            <th>Nama User</th>
                                            <th>Nama Asset</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($confir as $conf)
                                            <tr>
                                                <td>{{$conf->jenis}}</td>
                                                <td>{{$conf->user->nama}}</td>
                                                <td>{{$conf->asset->nama}}</td>
                                                <td>Rp.{{number_format($conf->harga)}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-body" x-show="tab == 2">
                                <table id="basic-datatables2" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Jenis</th>
                                            <th>Nama User</th>
                                            <th>Nama Asset</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($b_confir as $conf)
                                            <tr>
                                                <td>{{$conf->jenis}}</td>
                                                <td>{{$conf->user->nama}}</td>
                                                <td>{{$conf->asset->nama}}</td>
                                                <td>Rp.{{number_format($conf->harga)}}</td>
                                                <td>
                                                    <form style="display:inline" action="{{route('service.confirm',$conf)}}" method="post">
                                                        @csrf
                                                        @method('put')
                                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Konfirmasi</button>    
                                                    </form>                                                    
                                                    <form style="display:inline" action="{{route('service.reject',$conf)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button onclick="return confirm('Yakin Akan Menolak Permintaan Service Ini')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Tolak</button>    
                                                    </form>                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection