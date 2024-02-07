<form method="POST" id="formAdd">
    <h4 class="text-primary"><b>FORM TAMBAH</b></h4>
    <span class="text-secondary">Tambah Data Layanan Laundry</span>
    <div class="mt-3">
        <label>Nama Pelanggan</label>
        <input type="text" class="form-control" name="nama">
    </div>
    <div class="mt-3">
        <label>Alamat Pelanggan</label>
        <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="3"></textarea>
    </div>
    <div class="mt-3 mb-4">
        <label>Nomer Telepon</label>
        <input type="number" class="form-control" name="no_tlp">
    </div>
    <input class="btn btn-primary" type="submit" name="simpan" id="simpan" value="Simpan" />
    <button type="button" class="btn btn-danger" id="cancelButton">Batal</button>
</form>
