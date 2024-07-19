<?php
session_start();
include '../connection.php';

$nisn   = $_GET['nisn'];
$sisa   = $_GET['sisa'];

if (isset($_GET['nisn'])) {
  $nisn = ($_GET["nisn"]);

  $query = "SELECT * FROM pembayaran WHERE nisn='$nisn'";
  $result = mysqli_query($koneksi, $query);
  if (!$result) {
    die("Query Error: " . mysqli_errno($koneksi) .
      " - " . mysqli_error($koneksi));
  }
  $data1 = mysqli_fetch_assoc($result);
  if (!count($data1)) {
    echo "<script>alert('Data tidak ditemukan pada database');window.location='transaksi_pembayaran.php';</script>";
  }
} else {
  echo "<script>alert('Masukkan data id.');window.location='transaksi_pembayaran.php';</script>";
}
?>
<?php

$nisn   = $_GET['nisn'];
$sisa   = $_GET['sisa'];

$query = "SELECT * FROM siswa,kelas,spp where nisn='$nisn' AND siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp";
$result = mysqli_query($koneksi, $query);
if (!$result) {
  die("Query Error: " . mysqli_errno($koneksi) .
    " - " . mysqli_error($koneksi));
}
$data = mysqli_fetch_assoc($result);
if (!count($data)) {
  echo "<script>alert('Data tidak ditemukan pada database');window.location='transaksi_pembayaran.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pembayaran SPP - Admin</title>

  <!-- Custom fonts for this template-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate">
          <i class="fas fa-university"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SPP SEKOLAH</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Interface
      </div>
      <li class="nav-item">
        <a class="nav-link" href="siswa.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Petugas</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="siswa.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Siswa</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="kelas.php">
          <i class="fas fa-fw fa-address-book "></i>
          <span>Kelas</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="spp.php">
          <i class="fas fa-fw fa-address-card "></i>
          <span>SPP</span></a>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="pembayaran.php">
          <i class="fas fa-fw fa-credit-card"></i>
          <span>Pembayaran</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="catatan.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>Catatan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cetak-laporan.php">
          <i class="fas fa-fw fa-print"></i>
          <span>Cetak Laporan</span>
        </a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

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



          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nama'] ?></span>
                <img class="img-profile rounded-circle" src="../assets/img/undraw_profile.svg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown"> <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid d-flex justify-content-center">
          <div class="card position-absolute" style="width: 70%;">
            <div class="card-body">
              <form action="proses-admin/pembayaran/editpembayaran.php" method="post">
                <div class="row">
                  <input type="hidden" name="id_spp" value="<?= $data['id_spp']; ?>">
                  <input type="hidden" name="spp_masuk" value="<?php echo $data1['jumlah_bayar']; ?>">
                  <input value="<?php echo $data1['id_pembayaran']; ?>" type="hidden" class="form-control" name="id_pembayaran">
                  <div class="col mb-3">
                    <div class="form-outline">
                      <label class="form-label">Petugas</label>
                      <input type="text" class="form-control" id="InputTanggalBayar" value="<?php echo $_SESSION['nama'] . " - " . $_SESSION['level'];  ?>" disabled>
                      <input type="hidden" name="id_petugas" value="<?php echo $_SESSION['id_petugas']; ?>">
                    </div>
                  </div>
                  <div class="col mb-3">
                    <div class="form-outline">
                      <label class="form-label">Nama Siswa</label>
                      <input value="<?php echo $data['nisn'] . ' - ' . $data['nama'] . ' - ' . $data['nama_kelas']; ?>" type="text" class="form-control" disabled>
                      <input type="hidden" name="nisn" value="<?php echo $data['nisn'];  ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col mb-3">
                    <div class="form-outline">
                      <label for="InputTanggalBayar">Tanggal Bayar</label>
                      <input type="date" name="tgl_bayar" value="<?php echo date('Y-m-d') ?>" class="form-control" id="InputTanggalBayar" placeholder="Tanggal Bayar" value="<?= $tgl; ?>" required>
                    </div>
                  </div>
                  <div class="col mb-3">
                    <div class="form-outline">
                      <label for="InputBulanBayar">Bulan Bayar</label>
                      <select name="bulan_dibayar" class="form-select text-secondary" required>
                        <option value="" selected>--Pilih Nama Bulan--</option>
                        <option value="januari">Januari</option>
                        <option value="februari">Februari</option>
                        <option value="maret">Maret</option>
                        <option value="april">April</option>
                        <option value="mei">Mei</option>
                        <option value="juni">Juni</option>
                        <option value="juli">Juli</option>
                        <option value="agustus">Agustus</option>
                        <option value="september">September</option>
                        <option value="oktober">Oktober</option>
                        <option value="november">November</option>
                        <option value="desember">Desembar</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col mb-3">
                    <div class="form-outline">
                      <label class="form-label">Tahun Bayar</label>
                      <select name="tahun_dibayar" class="form-select text-secondary" required>
                        <?php
                        for ($i = 2010; $i <= date('Y'); $i++) {
                          echo "<option value='$i'>$i</option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col mb-3">
                    <label class="form-label">Jumlah Bayar ( Jumlah yang Harus di bayar <b>Rp <?php echo number_format($sisa, 2, ',', '.') ?> </b>)</label>
                    <input max="<?php echo $sisa ?>" type="number" class="form-control" name="jumlah_bayar" id="jumlah_bayar" required>
                  </div>
                </div>
                <div class="row d-flex justify-content-end">
                  <div class="col mb-3">
                    <button type="submit" style="float: right;" class="btn btn-outline-primary col-2">Save</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
        <!-- Modal Tambah Siswa -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Priska Nur Yustiyani 2023</span>
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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-dark" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../assets/js/demo/datatables-demo.js"></script>

</body>

</html>