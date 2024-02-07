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
    $alamat = $_POST['alamat'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM tb_petugas WHERE nama='$nama'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO tb_petugas (nama, alamat, password)
                    VALUES ('$nama', '$alamat', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
         
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
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
    <div class="container-fluid py-5 mt-3">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-xl-8">
                <div class="d-flex justify-content-center mt-5"><img src="assets/img/laundry.gif" width="575px" alt=""></div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-xl-4">
                <div class="py-2 mb-3">
                    <h4 class="text-primary">REGISTER PAGE</h4>
                    <span>Halo petugas, waktunya berkerja</span>
                </div>
                <form action="" method="POST" class="login-nama">
                    <div class="form-group me-5 mb-3">
                        <label class="mb-2 text-primary">Username</label>
                        <input type="text" class="form-control" placeholder="abdulgani" name="nama" id="nama" value="<?php echo $nama; ?>" required>
                    </div>
                    <div class="form-group me-5 mb-3">
                        <label class="mb-2 text-primary">Alamat</label>
                        <textarea type="text" class="form-control" placeholder="abdulgani" name="alamat" id="alamat" value="<?php echo $alamat; ?>" required></textarea>
                    </div>
                    <div class="form-group me-5 mb-3">
                        <label class="mb-2 text-primary">Password</label>
                        <input type="password" class="form-control" placeholder="abdulgani" name="password" id="password" value="<?php echo $_POST['password']; ?>" required>
                    </div>
                    <div class="form-group me-5 mb-3">
                        <label class="mb-2 text-primary">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="abdulgani" name="cpassword" id="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
                    </div>
                    <div class="d-grid gap-2 me-5">
                        <button name="submit" class="btn btn-primary">Register</button>
                    </div>
                    <div class="mt-2">Have an account ? <a href="login.php" class="text-decoration-none mt-1">Login</a></div>
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