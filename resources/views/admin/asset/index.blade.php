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
                                <a class="nav-link" :class="{active: tab == 1}"  href="#" @click="tab = 1" >Divisi A</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" :class="{active: tab == 2}" href="#" @click="tab = 2" >Divisi B</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" :class="{active: tab == 3}" href="#" @click="tab = 3" >Divisi C</a>
                            </li>
                        </ul>
                        </div>
                        <div class="card-body" x-show="tab == 1">
                            <a href="#" class="btn btn-primary btn-sm mb-3 ml-3" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus-circle"></i> Tambah</a>
                            <table id="as_A" class="display table table-striped table-hover" >
                                @include('admin.asset.Components.thead')
                                <tbody>
                                    @foreach ($as_A as $item)
                                        @include('admin.asset.Components.tbody')    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-body" x-show="tab == 2">
                            <a href="#" class="btn btn-primary btn-sm mb-3 ml-3" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus-circle"></i> Tambah</a>
                            <table id="as_B" class="display table table-striped table-hover" >
                                @include('admin.asset.Components.thead')
                                <tbody>
                                    @foreach ($as_B as $item)
                                        @include('admin.asset.Components.tbody')    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-body" x-show="tab == 3">
                            <a href="#" class="btn btn-primary btn-sm mb-3 ml-3" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus-circle"></i> Tambah</a>
                            <table id="as_C" class="display table table-striped table-hover" >
                                @include('admin.asset.Components.thead')
                                <tbody>
                                    @foreach ($as_C as $item)
                                        @include('admin.asset.Components.tbody')    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

@include('admin.asset.Components.modal')
@endsection