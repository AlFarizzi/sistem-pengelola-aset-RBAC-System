
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <form action="{{route('asset.update')}}" method="post">
                    @csrf
                    @method('put')
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="" class="form-label">Nama Asset</label>
                        <input placeholder="Masukan Jumlah Nama Asset" type="text" id="nama_asset" name="nama_asset" id="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Plat Nomor</label>
                        <input type="text" name="plat_nomor" id="plat_nomor" class="form-control">
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <label class="form-label">Tanggal Perolehan</label>
                            <input type="date" name="tgl_perolehan" id="tgl_perolehan" class="form-control">
                        </div>
                        <div class="col form-group">
                            <label class="form-label">Tanggal Pajak</label>
                            <input type="date" name="tgl_pajak" id="tgl_pajak" class="form-control">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm ml-3"><i class="fa fa-paper-plane"></i> Kirim</button>
                </form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <form action="{{route('asset.create')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="" class="form-label">Nama Asset</label>
                        <input placeholder="Masukan Jumlah Nama Asset" type="text" name="nama_asset" id="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Plat Nomor</label>
                        <input type="text" name="plat_nomor" id="" class="form-control">
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <label class="form-label">Tanggal Perolehan</label>
                            <input type="date" name="tgl_perolehan" id="tgl_pajak" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <label class="form-label">Tanggal Service</label>
                            <input type="date" name="tgl_service" id="tgl_service" class="form-control">
                        </div>
                        <div class="col form-group">
                            <label class="form-label">Tanggal Pajak</label>
                            <input type="date" name="tgl_pajak" id="tgl_pajak" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Penanggung Jawab</label>
                        <select name="id_user" class="form-control">
                            @foreach ($karyawan as $i)
                                <option value="{{$i->id}}">{{$i->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Divisi</label>
                        <select name="id_tipe" class="form-control">
                            @foreach ($tipe as $i)
                                <option value="{{$i->id}}">{{$i->type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm ml-3"><i class="fa fa-paper-plane"></i> Kirim</button>
                </form>
			</div>
		</div>
	</div>
</div>