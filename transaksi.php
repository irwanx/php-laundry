<?php 
 
session_start();
 
if (!isset($_SESSION['nama'])) {
    header("Location: login.php");
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mr.Bear-Laundry</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/sidebar.css">
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="assets/js/jquery.min.js"></script>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #3C82F3;">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html"><b>MR BEAR LAUNDRY</b></a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <?php echo "<p class='text-white mt-3'>Selamat Datang, " . $_SESSION['nama'] . "</p>"; ?>
        </div>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion" id="sidenavAccordion" style="background-color: #DDF7E3;">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                    <div class="sb-sidenav-menu-heading" style="color: #3C83F5;"><b>Core</b></div>
                        <a class="nav-link" href="admin.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading" style="color: #3C83F5;"><b>Service</b></div>
                        <a class="nav-link" href="layanan.php">
                            <div class="sb-nav-link-icon"><i class="fa-regular fa-face-smile-wink"></i></div>
                            Layanan
                        </a>
                        <a class="nav-link" href="jenis.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-hashtag"></i></div>
                            Jenis
                        </a>
                        <div class="sb-sidenav-menu-heading" style="color: #3C83F5;"><b>Pelanggan</b></div>
                        <a class="nav-link" href="pelanggan.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Pelanggan
                        </a>
                        <div class="sb-sidenav-menu-heading" style="color: #3C83F5;"><b>Transaksi</b></div>
                        <a class="nav-link" href="transaksi.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-dollar"></i></div>
                            Transaksi
                        </a>
                        <form action="" method="POST" class="login-email">
                        <div class="d-grid gap-2 px-3">
                            <a href="logout.php" class="btn btn-danger mt-3">Sign Out</a>
                        </div>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h4 class="mt-4 text-primary">Data Transaksi</h4>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Manajemen Data Transaksi Pelanggan</li>
                    </ol>
                    <div class="d-flex justify-content-end mb-3">
                        <button class="btn btn-primary" id="addButton">Tambah</button>
                    </div>
                    <div class="card mb-5">
                        <div class="card-body">
                            <div id="contentData"></div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 mt-auto" style="background-color: #2574EE;">
                <div class="container-fluid px-4">
                    <div class="d-flex justify-content-center small">
                        <div class="text-white">COPYRIGHT &copy; MR BEAR LAUNDRY <?php echo date('Y')?></div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/all.min.js"></script>
    <script src="assets/js/fontawesome.min.js"></script>
    <script src="assets/js/datatables.min.js"></script>
    <script src="assets/js/datatables.bootstrap.min.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            //load data mahasiswa saat aplikasi dijalankan 
            loadData();

            //Load form add
            $("#addButton").on("click", function() {
                $.ajax({
                    url: 'data-transaksi/form-add.php',
                    type: 'get',
                    success: function(data) {
                        $('#contentData').html(data);
                    }
                });
            });

            //Load form edit dengan parameter IdMhsw
            $("#contentData").on("click", "#EditButton", function() {
                var id_pelanggan = $(this).attr("value");
                $.ajax({
                    url: 'data-transaksi/form-edit.php',
                    type: 'get',
                    data: {
                        id_pelanggan: id_pelanggan
                    },
                    success: function(data) {
                        $('#contentData').html(data);
                    }
                });
            });

            //button batal
            $("#contentData").on("click", "#cancelButton", function() {
                loadData();
            });

            //simpan data mahasiswa
            $("#contentData").on("submit", "#formAdd", function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'data-transaksi/service.php?action=save',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {
                        alert(data);
                        loadData();
                    }
                });
            });

            //edit data mahasiswa
            $("#contentData").on("submit", "#formEdit", function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'data-transaksi/service.php?action=edit',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {
                        alert(data);
                        loadData();
                    }
                });
            });

            //hapus data mahasiswa berdasarkan IdMhsw
            $("#contentData").on("click", "#DeleteButton", function() {
                var id_transaksi = $(this).attr("value");
                $.ajax({
                    url: 'data-transaksi/service.php?action=delete',
                    type: 'post',
                    data: {
                        id_transaksi: id_transaksi
                    },
                    success: function(data) {
                        alert(data);
                        loadData();
                    }
                });
            });
        })

        function loadData() {
            $.ajax({
                url: 'data-transaksi/data-transaksi.php',
                type: 'get',
                success: function(data) {
                    $('#contentData').html(data);
                }
            });
        }
    </script>
</body>
</html>