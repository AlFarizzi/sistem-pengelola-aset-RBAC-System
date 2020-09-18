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
                            <form action="{{route('service.requestSend')}}" method="post">
                               @csrf
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label class="form-label">Jenis Service</label>
                                        <select name="id_jenis" class="form-control">
                                            <option value="1">Ringan</option>
                                            <option value="2">Berat</option>
                                        </select>
                                    </div>
                                    <div class="col form-group">
                                        <label class="form-label">Asset Yang Akan Di Service</label>
                                        <select name="id_asset" class="js-example-basic-single form-control">
                                            @foreach ($assets as $item)
                                                <option value="{{$item->id}}">{{$item->nama_asset}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="form-label">Biaya Service</label>
                                    <input type="number" name="harga"  class="form-control" placeholder="Masukan Estimasi Biaya Service">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Detail Servive</label>
                                    <textarea name="detail" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <button type="submit" class="ml-3 btn btn-primary btn-sm"><i class="fa fa-paper-plane"> Kirim</i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection