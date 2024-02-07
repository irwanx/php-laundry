<table class="table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Id Jenis</th>
            <th>Nama Layanan</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "../config/config.php";
        $no=1;
        $query=mysqli_query($conn, "SELECT * FROM tb_layanan ORDER BY Id_layanan DESC") or die(mysqli_error($conn));
        while ($result=mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td>
                    <?php echo $no++; ?>
                </td>
                <td>
                    <?php echo $result['id_jenis']; ?>
                </td>
                <td>
                    <?php echo $result['nama_layanan']; ?>
                </td>
                <td>
                    <?php echo $result['harga']; ?>
                </td>
                <td>
                    <button class="btn btn-warning" id="EditButton" value="<?php echo $result['id_layanan']; ?>"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger" id="DeleteButton" value="<?php echo $result['id_layanan']; ?>"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            <?php
            }
        ?>
    </tbody>
</table>