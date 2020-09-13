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
<a href="#" class="btn btn-primary btn-sm ml-3 mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-circle"></i> Tambah</a>
    <thead>
        <tr>
            <th>Username</th>
            <th>Nama</th>
            <th>Email</th>
            <th style="text-align: center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->username}}</td>
                <td>{{$user->nama}}</td>
                <td>{{$user->email}}</td>
                <td style="text-align: center">
                    <a href="{{route('user.view',$user)}}" class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></a>
                    <a href="{{route('user.edit',$user)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                    <form style="display:inline" action="{{route('user.destroy',$user)}}" method="post">
                        @csrf
                        @method('delete')
                        <button onclick="return confirm('Yakin Akan Menghapus Data Ini ?')"" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
    </tbody>                                     
@include('table.footer')

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <form action="{{route('user.create')}}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="col form-group">
                            <label class="form-label">username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="col form-group">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <label class="form-label">password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="col form-group">
                            <label for="Konfirmasi Password"></label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <label class="form-label">alamat</label>
                            <input type="text" name="alamat" class="form-control">
                        </div>
                        <div class="col form-group">
                            <label class="form-label">email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <label class="form-label">No.HP</label>
                            <input type="text" name="no_hp" class="form-control">
                        </div>
                        <div class="col form-group">
                            <label class="form-label">NIK</label>
                            <input type="text" name="nik" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <label  class="form-label">Jenis Kelamin</label>
                            <select name="jk" class="form-control">
                                <option value="Laki - Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col form-group">
                            <label class="form-label">Level</label>
                            <select name="level" class="form-control">
                                <option value="admin">Admin</option>
                                <option value="karyawan">Karyawan</option>
                                <option value="keuangan">Keuangan</option>
                                <option value="pimpinan">Pimpinan</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-paper-plane"> Kirim</i></button>
                    </div>
                </form>
			</div>
		</div>
	</div>
</div>
@endsection