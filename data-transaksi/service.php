
<?php
include "../config/config.php";

switch ($_GET['action'])
{

    case 'save':

        $id_pelanggan = $_POST['id_pelanggan'];
        $tgl_masuk = $_POST['tgl_masuk'];
        $id_layanan = $_POST['id_layanan'];
        $id_petugas = $_POST['id_petugas'];
        $tgl_selesai = $_POST['tgl_selesai'];
        $status = $_POST['status'];
        $jml_barang = $_POST['jml_barang'];
        $total = $_POST['total'];
        $tgl_diambil = $_POST['tgl_diambil'];

        $query = mysqli_query($conn, "INSERT INTO tb_transaksi(id_pelanggan, tgl_masuk, id_layanan, id_petugas, tgl_selesai, status, jml_barang, total, tgl_diambil) VALUES('$id_pelanggan', '$tgl_masuk', '$id_layanan', '$id_petugas', '$tgl_selesai', '$status', '$jml_barang', '$total', '$tgl_diambil')");
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

        $id_transaksi = $_POST['id_transaksi'];
        $query = mysqli_query($conn, "DELETE FROM tb_transaksi WHERE id_transaksi='$id_transaksi'");
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