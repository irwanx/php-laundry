<table class="table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Pelanggan</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "../config/config.php";
        $no=1;
        $query=mysqli_query($conn, "SELECT * FROM tb_pelanggan ORDER BY id_pelanggan DESC") or die(mysqli_error($conn));
        while ($result=mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td>
                    <?php echo $no++; ?>
                </td>
                <td>
                    <?php echo $result['nama']; ?>
                </td>
                <td>
                    <?php echo $result['alamat']; ?>
                </td>
                <td>
                    <?php echo $result['no_tlp']; ?>
                </td>
                <td>
                    <button class="btn btn-warning" id="EditButton" value="<?php echo $result['id_pelanggan']; ?>"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger" id="DeleteButton" value="<?php echo $result['id_pelanggan']; ?>"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            <?php
            }
        ?>
    </tbody>
</table>