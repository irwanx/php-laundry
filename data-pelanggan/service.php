
<?php
include "../config/config.php";

switch ($_GET['action'])
{

    case 'save':

        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_tlp = $_POST['no_tlp'];

        $query = mysqli_query($conn, "INSERT INTO tb_pelanggan(nama, alamat, no_tlp) VALUES('$nama', '$alamat', '$no_tlp')");
        if ($query)
        {
            echo "Simpan Data Berhasil";
        }
        else
        {
            echo "Simpan Data Gagal :" . mysqli_error($conn);
        }
    break;

    case 'edit':

        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_tlp = $_POST['no_tlp'];

        $query = mysqli_query($conn, "UPDATE tb_pelanggan SET nama='$nama', alamat='$alamat', no_tlp='$no_tlp'");
        if ($query)
        {
            echo "Edit Data Berhasil";
        }
        else
        {
            echo "Edit Data Gagal :" . mysqli_error($conn);
        }
    break;

    case 'delete':

        $id_pelanggan = $_POST['id_pelanggan'];
        $query = mysqli_query($conn, "DELETE FROM tb_pelanggan WHERE id_pelanggan='$id_pelanggan'");
        if ($query)
        {
            echo "Hapus Data Berhasil";
        }
        else
        {
            echo "Hapus Data Gagal :" . mysqli_error($conn);
        }
    break;
    }
?>