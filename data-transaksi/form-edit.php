<?php
 include "../config/config.php";
 $id_transaksi=$_GET['id_transaksi'];
 $query=mysqli_query($conn, "SELECT * FROM tb_transaksi WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($conn));
 $result=mysqli_fetch_array($query);
?>
    <form method="POST" id="formEdit">
        <h4 class="text-primary"><b>FORM EDIT</b></h4>
        <span class="text-secondary">Edit Data Transaksi Laundry</span>
        <div class="mt-4">
            <label>Tanggal Selesai</label>
            <input type="hidden" name="id_transaksi" id="id_transaksi" required="" value="<?php echo $result['id_transaksi']; ?>" />
            <input type="hidden" name="status" id="status" required="" value="2" />
            <input type="date" class="form-control" name="tgl_selesai" value="<?php echo $result['tgl_selesai']; ?>">
        </div>
        <input class="btn btn-primary" type="submit" name="simpan" id="simpan" value="Simpan" />
        <button type="button" class="btn btn-danger" id="cancelButton">Batal</button>
    </form>