<?php
 include "../config/config.php";
 $id_pelanggan=$_GET['id_pelanggan'];
 $query=mysqli_query($conn, "SELECT * FROM tb_pelanggan WHERE id_pelanggan='$id_pelanggan'") or die(mysqli_error($conn));
 $result=mysqli_fetch_array($query);
?>
    <form method="POST" id="formEdit">
        <h4 class="text-primary"><b>FORM EDIT</b></h4>
        <span class="text-secondary">Edit Data Pelanggan Laundry</span>
        <div class="mt-4">
            <label>Nama Pelanggan</label>
            <input type="hidden" name="id_pelanggan" id="id_pelanggan" required="" value="<?php echo $result['id_pelanggan']; ?>" />
            <input type="text" class="form-control" name="nama" value="<?php echo $result['nama']; ?>">
        </div>
        <div class="mt-3">
            <label>Alamat Pelanggan</label>
            <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="3"><?php echo $result['alamat']; ?></textarea>
        </div>
        <div class="mt-3 mb-4">
            <label>Nomer Telepon</label>
            <input type="text" class="form-control" name="no_tlp" value="<?php echo $result['no_tlp']; ?>">
        </div>
        <input class="btn btn-primary" type="submit" name="simpan" id="simpan" value="Simpan" />
        <button type="button" class="btn btn-danger" id="cancelButton">Batal</button>
    </form>