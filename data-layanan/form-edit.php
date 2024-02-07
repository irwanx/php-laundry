<?php
 include "../config/config.php";
 $id_layanan=$_GET['id_layanan'];
 $query=mysqli_query($conn, "SELECT * FROM tb_layanan WHERE id_layanan='$id_layanan'") or die(mysqli_error($conn));
 $result=mysqli_fetch_array($query);
?>
    <form method="POST" id="formEdit">
        <h4 class="text-primary"><b>FORM EDIT</b></h4>
        <span class="text-secondary">Edit Data Layanan Laundry</span>
        <div class="mt-4">
            <label>Jenis Layanan</label>
            <input type="hidden" name="id_layanan" id="id_layanan" required="" value="<?php echo $result['id_layanan']; ?>" />
            <select class="form-control" name="id_jenis">
                <option>- Select option -</option>
                <option value="<?php echo $result['id_jenis']; ?>" <?php if($result[ 'id_jenis'] > "0" ) echo "selected"; ?>><?php echo $result['id_jenis']; ?></option>
            </select>
        </div>
        <div class="mt-3">
            <label>Nama Layanan</label>
            <input type="text" class="form-control" name="nama_layanan" value="<?php echo $result['nama_layanan']; ?>">
        </div>
        <div class="mt-3 mb-4">
            <label>Harga Layanan</label>
            <input type="text" class="form-control" name="harga" value="<?php echo $result['harga']; ?>">
        </div>
        <input class="btn btn-primary" type="submit" name="simpan" id="simpan" value="Simpan" />
        <button type="button" class="btn btn-danger" id="cancelButton">Batal</button>
    </form>