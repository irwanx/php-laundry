
<?php
include "../config/config.php";

switch ($_GET['action'])
{

    case 'save':

        $nama_jenis = $_POST['nama_jenis'];
        $kategori = $_POST['kategori'];

        $query = mysqli_query($conn, "INSERT INTO tb_jenis(nama_jenis, kategori) VALUES('$nama_jenis', '$kategori')");
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

        $nama_jenis = $_POST['nama_jenis'];
        $kategori = $_POST['kategori'];

        $query = mysqli_query($conn, "UPDATE tb_jenis SET  nama_jenis='$nama_jenis', kategori='$kategori'");
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

        $id_jenis = $_POST['id_jenis'];
        $query = mysqli_query($conn, "DELETE FROM tb_jenis WHERE id_jenis='$id_jenis'");
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