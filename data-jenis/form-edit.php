<?php
 include "../config/config.php";
 $id_jenis=$_GET['id_jenis'];
 $query=mysqli_query($conn, "SELECT * FROM tb_jenis WHERE id_jenis='$id_jenis'") or die(mysqli_error($conn));
 $result=mysqli_fetch_array($query);
?>
    <form method="POST" id="formEdit">
        <h4 class="text-primary"><b>FORM EDIT</b></h4>
        <span class="text-secondary">Edit Jenis Layanan Laundry</span>
        <div class="mt-4">
            <label>Nama Jenis Layanan</label>
            <input type="hidden" name="id_jenis" id="id_jenis" required="" value="<?php echo $result['id_jenis']; ?>" />
            <input type="text" class="form-control" name="nama_jenis" value="<?php echo $result['nama_jenis']; ?>">
        </div>
        <div class="mt-3 mb-4">
            <label>Kategori Jenis</label>
            <input type="text" class="form-control" name="kategori" value="<?php echo $result['kategori']; ?>">
        </div>
        <input class="btn btn-primary" type="submit" name="simpan" id="simpan" value="Simpan" />
        <button type="button" class="btn btn-danger" id="cancelButton">Batal</button>
    </form>