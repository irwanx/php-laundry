
<?php
include "../config/config.php";

switch ($_GET['action'])
{

    case 'save':

        $id_jenis = $_POST['id_jenis'];
        $nama_layanan = $_POST['nama_layanan'];
        $harga = $_POST['harga'];

        $query = mysqli_query($conn, "INSERT INTO tb_layanan(id_jenis, nama_layanan, harga) VALUES('$id_jenis', '$nama_layanan', '$harga')");
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

        $id_jenis = $_POST['id_jenis'];
        $nama_layanan = $_POST['nama_layanan'];
        $harga = $_POST['harga'];

        $query = mysqli_query($conn, "UPDATE tb_layanan SET id_jenis='$id_jenis', nama_layanan='$nama_layanan', harga='$harga'");
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

        $id_layanan = $_POST['id_layanan'];
        $query = mysqli_query($conn, "DELETE FROM tb_layanan WHERE id_layanan='$id_layanan'");
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