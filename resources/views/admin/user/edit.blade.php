@extends('welcome')

@section('content')
@if(session('Berhasil'))
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
                                <h4>
                                    {{-- <p>{{request()->path()}}</p> --}}
                                    Edit Data {{$user->username}}
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('user.edit',$user)}}" method="post" >
                                    @csrf
                                    @method('put')
                                    <div class="form-row">
                                        <div class="col form-group">
                                            <label class="form-label">Username</label>
                                            <input type="text" name="username" value="{{$user->username}}" class="form-control">
                                        </div>
                                        <div class="col form-group">
                                            <label class="form-label">Nama</label>
                                            <input type="text" name="nama" value="{{$user->nama}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col form-group">
                                            <label class="form-label">No.Telepon</label>
                                            <input type="text" name="no_hp" value="{{$user->no_hp}}" class="form-control">
                                        </div>
                                        <div class="col form-group">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" value="{{$user->email}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col form-group">
                                            <label class="form-label">Alamat</label>
                                            <input type="text" name="alamat" value="{{$user->alamat}}" class="form-control">
                                        </div>
                                        <div class="col form-group">
                                            <label class="form-label">NIK</label>
                                            <input type="text" name="nik" value="{{$user->nik}}" class="form-control">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"> Ubah</i></button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection