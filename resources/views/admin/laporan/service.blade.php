@extends('welcome')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('service.print')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label">Pilih Kategori Laporan</label>
                                        <select name="status" class="form-control">
                                            <option value="#" disabled selected> Pilih Kategori Laporan </option>
                                            <option value="1">Konfirmasi</option>
                                            <option value="2">Belum Konfirmasi</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm ml-3"><i class="fa fa-paper-plane"></i> Pilih</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection