<?php 
session_start();
include '../koneksi.php';

if (!isset($_SESSION['log'])) {
    header('location:../index.php');
} else {
};
$nama = $_SESSION['nama'];
$id = $_GET['id'];

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
if (isset($_POST['update'])) {
    $id_admin = $_POST['id_admin'];
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $updatestatus = mysqli_query($conn, "update admin set username='$username',nama='$nama' where id_admin='$id_admin' ");
  
    if ($updatestatus ) {
        echo " 
		<meta http-equiv='refresh' content='1; url= user.php'/>  ";
    } else {
        echo "
		 <meta http-equiv='refresh' content='1; url= user.php'/> ";
    }
};
if (isset($_POST['hapus'])) {
    $id_admin = $_POST['id_admin'];
  
    $updatestatus = mysqli_query($conn, "DELETE FROM admin where id_admin='$id_admin'");
  
    if ($updatestatus ) {
        echo " 
		<meta http-equiv='refresh' content='1; url=user.php'/>  ";
    } else {
        echo "
		 <meta http-equiv='refresh' content='1; url= user.php'/> ";
    }
};

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="canonical" href="https://demo-basic.adminkit.io/" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="../assets/img/icons/icon-48x48.png" />
    <link href="../assets/css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <script src="js/jquery.js"></script>
    <script src="js/jquery.ui.datepicker.js"></script>
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/cover/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>PT. NIKI FOUR</title>


</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar" style="background-color: #0d6efd;;">
                <h1 class="sidebar-brand">
                    <i class="align-middle" data-feather="home" style="color:white;"></i> <span class="align-middle"
                        style="color:white;"> &nbsp;PT. NIKI FOUR</span>
                </h1>

                <ul class="sidebar-nav">
                    <li class="sidebar-header" style="color:black;">
                        Pages
                    </li>

                    <li class="sidebar-item ">
                        <a class="sidebar-link" href="admin_home.php" style="background-color: #0d6efd;;color:white;">
                            <i class="align-middle" data-feather="sliders" style="color:black;"></i> <span
                                class="align-middle">Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="user.php" style="background-color: #0d6efd;;color:white;">
                            <i class="align-middle" data-feather="user" style="color:black;"></i> <span
                                class="align-middle">Data User</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="barang.php" style="background-color: #0d6efd;;color:white;">
                            <i class="align-middle" data-feather="package" style="color:black;"></i> <span
                                class="align-middle">Data Material</span>
                        </a>
                    </li>

                    <li class="sidebar-item ">
                        <a class="sidebar-link" href="hitung3.php" style="background-color: #0d6efd;color:white;">
                            <i class="align-middle" data-feather="bar-chart-2" style="color:black;"></i> <span
                                class="align-middle">Hasil
                                Peramalan</span>
                        </a>
                    </li>
                </ul>

                <div class="sidebar-cta">
                    <div class="sidebar-cta-content" style="background-color: #0d6efd">
                        <div class="d-grid">
                            <a href="../logout.php" class="btn btn-light">Log out</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg" style="background-color: #c1daff;">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center "></i>
                </a>

                <div class=" navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">



                        <li class="nav-item dropdown">

                            <a class="nav-link  d-none d-sm-inline-block" href="#">
                                <span class="text-drak">Hallo, <?php echo $nama ?>
                                    (<?php echo $_SESSION['role'] ?>)</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content">
                <div class="container-fluid p-0">
                    <h4 class=" mb-3"><strong>Update Data</strong> User</h6><br>

                        <?php 
               
               $data=mysqli_query($conn, "select * from admin where id_admin='$id'");
               while ($b=mysqli_fetch_array($data)){
               ?>
                        <form method="post">
                            <div class="card ">
                                <div class="card-body">
                                    <div class=" col-md-1">

                                        <input type="hidden" name="id_admin" class="form-control" placeholder="Nama"
                                            value="<?php echo $b['id_admin'] ?>">
                                    </div>
                                    <div class="row">

                                        <div class=" col-md-6">
                                            <label for="inputAddress" class="form-label">Username</label>
                                            <input type="text" name="username" class="form-control"
                                                placeholder="Username" value="<?php echo $b['username'] ?>">
                                        </div>

                                        <div class=" col-md-6">
                                            <label for="inputAddress" class="form-label">Nama</label>
                                            <input type="text" name="nama" class="form-control" placeholder="Nama"
                                                value="<?php echo $b['nama'] ?>">
                                        </div>
                                    </div><br>
                                    <div class=" row">
                                        <div class=" col-md-6">
                                            <input type="submit" name="update" class="btn btn-primary" value="Update" \>

                                            <input type="submit" name="hapus" class="btn btn-primary" value="Hapus" \>
                                        </div>
                                    </div>
                                </div>
                            </div>

                </div> <?php }?>
                </form>

            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a class="text-muted" target="_blank"><strong>PT. NIKI FOUR</strong></a> &copy;
                            </p>
                        </div>

                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="../assets/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
    $(document).ready(function() {
        $('#example1').DataTable();
    });
    </script>

</body>

</html>