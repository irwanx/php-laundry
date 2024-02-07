<form method="POST" id="formAdd">
    <h4 class="text-primary"><b>FORM TAMBAH</b></h4>
    <span class="text-secondary">Tambah Data Layanan Laundry</span>
    <div class="mt-4">
        <label>Jenis Layanan</label>
        <select class="form-control" name="id_jenis">
            <option>- Select option -</option>
        <?php
        include "../config/config.php";
        $query=mysqli_query($conn, "SELECT * FROM tb_jenis ORDER BY Id_jenis DESC") or die(mysqli_error($conn));
        while ($result=mysqli_fetch_array($query)) { ?>
        <option value="<?php echo $result['id_jenis']; ?>"><?php echo $result['nama_jenis']; ?></option>
        <?php } ?>
        </select>
    </div>
    <div class="mt-3">
        <label>Nama Layanan</label>
        <input type="text" class="form-control" name="nama_layanan">
    </div>
    <div class="mt-3 mb-4">
        <label>Harga Layanan</label>
        <input type="text" class="form-control" name="harga">
    </div>
    <input class="btn btn-primary" type="submit" name="simpan" id="simpan" value="Simpan" />
    <button type="button" class="btn btn-danger" id="cancelButton">Batal</button>
</form>
