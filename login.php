<!-- //* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                        FUNCTION PHP
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - *// -->
<?php 
 
include 'config/config.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['nama'])) {
    header("Location: admin.php");
}
 
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $password = md5($_POST['password']);
 
    $sql = "SELECT * FROM tb_petugas WHERE nama='$nama' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['nama'] = $row['nama'];
        header("Location: admin.php");
    } else {
        echo "<script>alert('nama atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
 
?>
<!-- /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                        SCRIPT HTML CSS
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */ -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mr.Bear-Laundry</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="assets/js/jquery.min.js"></script>
</head>
<body>
    <div class="container-fluid py-5 mt-5">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-xl-8">
                <div class="d-flex justify-content-center mt-3"><img src="assets/img/laundry.gif" width="575px" alt=""></div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-xl-4">
                <div class="py-2 mb-5">
                    <h4 class="text-primary">LOGIN PAGE</h4>
                    <span>Halo petugas, waktunya berkerja</span>
                </div>
                <form action="" method="POST" class="login-nama">
                    <div class="form-group me-5 mb-3">
                        <label class="mb-2 text-primary">Username</label>
                        <input type="text" class="form-control" placeholder="abdulgani" name="nama" id="nama" value="<?php echo $nama; ?>" required>
                    </div>
                    <div class="form-group mb-5 me-5">
                        <label class="mb-2 text-primary">Password</label>
                        <input type="password" class="form-control" placeholder="abdulgani" name="password" id="password" value="<?php echo $password; ?>" required>
                    </div>
                    <div class="d-grid gap-2 me-5">
                        <button name="submit" class="btn btn-primary">Login</button>
                    </div>
                    <div class="mt-2">Don't have an account ? <a href="register.php" class="text-decoration-none mt-1">Register</a></div>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/all.min.js"></script>
    <script src="assets/js/fontawesome.min.js"></script>
    <script src="assets/js/datatables.min.js"></script>
    <script src="assets/js/datatables.bootstrap.min.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>
</html>