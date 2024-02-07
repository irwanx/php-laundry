<form method="POST" id="formAdd">
    <h4 class="text-primary"><b>FORM TAMBAH</b></h4>
    <span class="text-secondary">Tambah Data Layanan Laundry</span>
    <div class="mt-4">
        <label>Nama Pelanggan</label>
        <select class="form-control" name="id_pelanggan">
            <option>- Select option -</option>
        <?php
        include "../config/config.php";
        $query=mysqli_query($conn, "SELECT * FROM tb_pelanggan ORDER BY id_pelanggan DESC") or die(mysqli_error($conn));
        while ($result=mysqli_fetch_array($query)) { ?>
        <option value="<?php echo $result['id_pelanggan']; ?>"><?php echo $result['nama']; ?></option>
        <?php } ?>
        </select>
        <input type="hidden" name="status" id="status" value="1">
    </div>
    <div class="mt-3 mb-4">
        <label>Tanggal Masuk</label>
        <input type="date" class="form-control" name="tgl_masuk">
    </div>
    <div class="mt-3 mb-4">
        <label>Jumlah Barang</label>
        <input type="number" class="form-control" name="jml_barang" id="jml_barang">
    </div>
    <div class="mt-4">
        <label>Pilih Layanan</label>
        <select class="form-control" name="id_layanan" id="id_layanan">
            <option>- Select option -</option>
        <?php
        include "../config/config.php";
        $query=mysqli_query($conn, "SELECT * FROM tb_layanan ORDER BY id_layanan DESC") or die(mysqli_error($conn));
        while ($result=mysqli_fetch_array($query)) { ?>
        <option value="<?php echo $result['id_layanan']; ?>" data-harga="<?php echo $result['harga']; ?>"><?php echo $result['nama_layanan']; ?></option>
        <?php } ?>
        </select>
    </div>
    <div class="mt-3 mb-4">
        <label>ID Petugas</label>
        <select class="form-control" name="id_petugas">
            <option>- Select option -</option>
        <?php
        include "../config/config.php";
        $query=mysqli_query($conn, "SELECT * FROM tb_petugas ORDER BY id_petugas DESC") or die(mysqli_error($conn));
        while ($result=mysqli_fetch_array($query)) { ?>
        <option value="<?php echo $result['id_petugas']; ?>"><?php echo $result['nama']; ?></option>
        <?php } ?>
        </select>
    </div>
    <div class="mt-3 mb-4">
        <label>Total</label>
        <input type="text" class="form-control" name="total" id="total" readonly>
    </div>
    <input class="btn btn-primary" type="submit" name="simpan" id="simpan" value="Simpan" />
    <button type="button" class="btn btn-danger" id="cancelButton">Batal</button>
</form>
<script>
$("#jml_barang, #id_layanan").change(function(){
    var harga = $(this).find(':selected').attr('data-harga');
    var jumlah = $("#jml_barang").val();

    var total = harga * jumlah;
    $("#total").val(total);
});
</script>
