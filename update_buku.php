<?php

require_once "include/koneksi.php";
session_start();

$sql = "SELECT * FROM buku WHERE id_buku='$_GET[id]'";
$result = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($result)

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit | Buku</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div>Perpustakaan</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                MAIN NAVIGATION
            </div>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Nav Item - Data User -->
            <li class="nav-item">
                <a class="nav-link" href="tbl_user.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data User</span></a>
            </li>

            <!-- Nav Item - Data Anggota Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Anggota</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="tbl_siswa.php">Data Siswa</a>
                        <a class="collapse-item" href="tbl_guru.php">Data Guru</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Data Buku Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Data Buku</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item active" href="tbl_buku.php">Daftar Buku</a>
                        <a class="collapse-item" href="tbl_kategori.php">Kategori Buku</a>
                        <a class="collapse-item" href="tbl_rak.php">Rak Buku</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Transaksi Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Transaksi</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="tbl_peminjaman.php">Peminjaman Buku</a>
                        <a class="collapse-item" href="tbl_pengembalian.php">Pengembalian Buku</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Cetak Laporan -->
            <li class="nav-item">
                <a class="nav-link" href="tbl_denda.php">
                    <i class="fas fa-fw fa-dollar-sign"></i>
                    <span>Denda</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <img class="col-md-1 profile-user-img img-responsive img-circle" src="img/Logo-Kelas-E.jpg">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']; ?></span>
                                <img class="img-profile rounded-circle" src="img/<?php echo $_SESSION['foto']; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profil.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-12">

                            <!-- Overflow Hidden -->
                            <div class="card mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit Buku</h6>
                                </div>
                                <div class="card-body">

                                    <form method="POST" action="update_buku_aksi.php">
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>ID Buku</label>
                                                <input type="text" name="id_buku" class="form-control"
                                                    value="<?php echo $row['id_buku']; ?>">
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Nama Buku</label>
                                                <input type="text" name="nama" class="form-control"
                                                    value="<?php echo $row['nama']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Penerbit</label>
                                                <input type="text" name="penerbit" class="form-control"
                                                    value="<?php echo $row['penerbit']; ?>">
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Pengarang</label>
                                                <input type="text" name="pengarang" class="form-control"
                                                    value="<?php echo $row['pengarang']; ?>">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label>Tahun Terbit</label>
                                                <input type="text" name="tahun_terbit" class="form-control"
                                                    value="<?php echo $row['tahun_terbit']; ?>">
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Tanggal Masuk</label>
                                                <input type="date" name="tanggal_masuk" class="form-control"
                                                    value="<?php echo $row['tanggal_masuk']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Jumlah Buku</label>
                                                <input type="number" name="stok_buku" class="form-control"
                                                    value="<?php echo $row['stok_buku']; ?>">
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Kategori</label>
                                                <select class="form-control select2" required="required"
                                                    name="id_kategori">
                                                    <option disabled selected value> -- Pilih Kategori -- </option>
                                                    <?php

                                                    $sql = "SELECT * FROM kategori ORDER BY id_kategori DESC";
                                                    $result = mysqli_query($koneksi, $sql);
                                                    while ($row = mysqli_fetch_assoc($result)) {

                                                        echo "<option value='$row[kategori_buku]'>$row[kategori_buku]</option>";
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group row">

                                            <div class="col-sm-6">
                                                <label>Rak Buku</label>
                                                <select class="form-control select2" required="required" name="id_rak">
                                                    <option disabled selected value> -- Pilih Rak -- </option>
                                                    <?php

                                                    $sql = "SELECT * FROM rak ORDER BY id_rak DESC";
                                                    $result = mysqli_query($koneksi, $sql);
                                                    while ($row = mysqli_fetch_assoc($result)) {

                                                        echo "<option value='$row[rak_buku]'>$row[rak_buku]</option>";
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <hr>
                                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                        <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->






            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span><b>SISTEM INFORMASI PERPUSTAKAAN</b></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>