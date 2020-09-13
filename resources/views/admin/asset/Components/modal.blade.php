
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
                    <div class="form-group">
                        <label for="" class="form-label">Nama Asset</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label"></label>
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <label class="form-label">Tanggal Service</label>
                            <input type="date" name="tgl_service" id="tgl_service" class="form-control">
                        </div>
                        <input type="hidden" name="no_asset" id="no_asset">
                        <div class="col form-group">
                            <label class="form-label">Tanggal Pajak</label>
                            <input type="date" name="tgl_pajak" id="tgl_pajak" class="form-control">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-paper-plane"></i> Kirim</button>
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
                        <input placeholder="Masukan Jumlah Nama Asset" type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah</label>
                        <input placeholder="Masukan Jumlah Asset" type="number" name="jumlah" id="jumlah" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label"></label>
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <label class="form-label">Tanggal Perolehan</label>
                            <input type="date" name="tgl_perolehan" id="tgl_pajak" class="form-control">
                        </div>
                        <div class="col form-group">
                            <label class="form-label">Tanggal Limit</label>
                            <input type="date" name="tgl_limit" id="tgl_pajak" class="form-control">
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
                        <label class="form-label">Divisi</label>
                        <select name="id_tipe" class="form-control">
                            <option value="1">Divisi A</option>
                            <option value="2">Divisi B</option>
                            <option value="3">Divisi C</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-paper-plane"></i> Kirim</button>
                </form>
			</div>
		</div>
	</div>
</div>