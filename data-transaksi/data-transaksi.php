<table class="table table-borderless">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Pelanggan</th>
            <th>Tgl Masuk</th>
            <th>Nama Layanan</th>
            <th>Nama Petugas</th>
            <th>Tgl Selesai</th>
            <th>Status</th>
            <th>Jumlah Barang</th>
            <th>Total</th>
            <th>Tgl Ambil</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "../config/config.php";
        $no=1;
        $query=mysqli_query($conn, "SELECT tb_transaksi.id_transaksi, tb_transaksi.id_pelanggan, tb_transaksi.id_layanan, tb_transaksi.tgl_masuk, tb_petugas.nama AS petugas ,tb_transaksi.id_petugas, tb_transaksi.tgl_selesai, tb_transaksi.status, tb_transaksi.jml_barang, tb_transaksi.total, tb_transaksi.tgl_diambil, tb_layanan.nama_layanan, tb_pelanggan.nama, tb_pelanggan.no_tlp, tb_layanan.harga FROM tb_transaksi JOIN tb_layanan ON tb_transaksi.id_layanan=tb_layanan.id_layanan JOIN tb_petugas ON tb_transaksi.id_petugas=tb_petugas.id_petugas JOIN tb_pelanggan ON tb_transaksi.id_pelanggan=tb_pelanggan.id_pelanggan;") or die(mysqli_error($conn));
        while ($result=mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td>
                    <?php echo $no++; ?>
                </td>
                <td>
                    <div><?php echo $result['nama']; ?></div><?php echo $result['no_tlp']; ?>
                </td>
                <td>
                    <?php echo $result['tgl_masuk']; ?>
                </td>
                <td>
                    <?php echo $result['nama_layanan']; ?>
                </td>
                <td>
                    <?php echo $result['petugas']; ?>
                </td>
                <td>
                    <?php echo $result['tgl_selesai']; ?>
                </td>
                <td>
                    <?php echo $result['status']; ?>
                </td>
                <td>
                    <?php echo $result['jml_barang']; ?>
                </td>
                <td>
                    <?php echo $result['total']; ?>
                </td>
                <td>
                    <?php echo $result['tgl_diambil']; ?>
                </td>
                <td>
                    <button class="btn btn-primary" id="EditButton" value="<?php echo $result['id_transaksi']; ?>"><i class="fa-regular fa-clock"></i></button>
                </td>
            </tr>
            <?php
            }
        ?>
    </tbody>
</table>