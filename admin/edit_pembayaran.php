<?php
    include 'index.php';
    include '../connection.php';
    session_start();

    $id_pembayaran   = $_GET['id_pembayaran'];
$sisa   = $_GET['sisa'];

if (isset($_GET['id_pembayaran'])) {
  $id_pembayaran = ($_GET["id_pembayaran"]);

  $query = "SELECT * FROM pembayaran,siswa,kelas,spp,petugas WHERE id_pembayaran='$id_pembayaran' AND siswa.nisn=pembayaran.nisn AND siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp";
  $result = mysqli_query($koneksi, $query);
  if (!$result) {
    die("Query Error: " . mysqli_errno($koneksi) .
      " - " . mysqli_error($koneksi));
  }
  $data = mysqli_fetch_assoc($result);
  if (!count($data)) {
    echo "<script>alert('Data tidak ditemukan pada database');window.location='pembayaran.php';</script>";
  }
} else {
  echo "<script>alert('Masukkan data id.');window.location='pembayaran.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div style="position:relative;bottom:80vh;" class="app-content content">
	<div class="content-wrapper">
		<div class="content-body"><!-- Revenue, Hit Rate & Deals -->
        <div class="card box-shadow-2">
        <!--START-->
        
        <div class="container-fluid d-flex justify-content-center">
          <div class="card position-absolute" style="width: 70%;">
            <div class="card-body">
              <form action="controller_edit_pembayaran.php" method="post">
                <div class="row">
                  <input type="hidden" name="id_spp" value="<?= $data['id_spp']; ?>">
                  <input type="hidden" name="spp_masuk" value="<?php echo $data['jumlah_bayar']; ?>">
                  <input value="<?php echo $data['id_pembayaran']; ?>" type="hidden" class="form-control" name="id_pembayaran">
                  <div class="col mb-3">
                    <div class="form-outline">
                      <label class="form-label">Petugas</label>
                      <input type="text" class="form-control" id="InputTanggalBayar" value="<?php echo $data['nama_petugas']; ?>" disabled>
                      <input type="hidden" name="id_petugas" value="<?php echo $data['id_petugas']; ?>">
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
                      <select name="bulan_dibayar" class="form-control" required>
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
                      <select name="tahun_dibayar" class="form-control" required>
                        <?php
                        for ($i = 2020; $i <= date('Y'); $i++) {
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
                    <button type="submit" style="float: right;" class="btn btn-primary btn-bg-gradient-x-blue-cyan">Simpan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!--END-->
        </div>
    </div>
</div>
    
</body>
</html>