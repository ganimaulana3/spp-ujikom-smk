<?php
    include '../siswa/index.php';

    // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM siswa,kelas,spp,pembayaran,petugas where siswa.nisn='$id' AND siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp AND petugas.id_petugas=pembayaran.id_petugas AND siswa.nisn=pembayaran.nisn";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
	$sisa = $data['nominal'] - $data['jumlah_bayar'];

      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='../siswa/history_pembayaran.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='../siswa/history_pembayaran.php';</script>";
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
		.tengah {
			text-align: center;
		}

		.kotak {
			border: 1px solid rgba(0, 0, 0, 0.1);
			padding: 5px;
		}

		@media print {
			body * {
				visibility: hidden;
			}

			.kotak,
			.kotak * {
				visibility: visible;
			}

			.kotak {
				position: absolute;
				width: 100%;
				margin-top: 300px;
				transform: scale(2);
				left: 0;
				top: 0;
			}
		}
	</style>
</head>
<body>
    
<div style="position:relative;bottom:80vh;" class="app-content content">
	<div class="content-wrapper">
		<div class="content-body"><!-- Revenue, Hit Rate & Deals -->
        <div class="card box-shadow-2">
        <!--START-->
		

        <div class="kotak d-print-block">
										<br>
										<div class="row">
											<div class="col-12">
												<div class="tengah">
													<h3><b>SMK NEGERI 1 BANJAR</b></h3>
												</div>
												<div class="tengah">Jalan KH. Mustofa, Lingk. Parunglesang RT.05 RW.10 Kelurahan Banjar Kecamatan Telepon: (0265) 744860</div>
												<div class="tengah">surel: smkn1banjar@gmail.com &nbsp; situs: smkn1banjar.sch.id</div>
												<div class="tengah">KOTA BANJAR - 46311</div>
												<hr>
												<div class="tengah"><b><u>Catatan SPP</u></b></div>
												<br>
											</div>
										</div>
										<div style="left:85px;" class="row position-relative">
											<div class="col-6">
												<table class="position-relative" style="width: 100%">
													<tr>
														<td>Nama</td>
														<td>:</td>
														<td> <?php echo $data['nama']; ?></td>
													</tr>
													<tr>
														<td>NISN</td>
														<td>:</td>
														<td> <?php echo $_SESSION['nisn']; ?></td>
													</tr>
													<tr>
														<td>NIS</td>
														<td>:</td>
														<td> <?php echo $data['nis']; ?></td>
													</tr>
												</table>
											</div>
											<div class="col-6">
												<table style="width: 100%">
													<tr>
														<td>Kelas</td>
														<td>:</td>
														<td> <?php echo $data['nama_kelas']; ?></td>
													</tr>
													<tr>
														<td>Alamat</td>
														<td>:</td>
														<td> <?php echo $data['alamat']; ?></td>
													</tr>
													<tr>
														<td>Nomor HP</td>
														<td>:</td>
														<td> <?php echo $data['no_telp']; ?></td>
													</tr>
												</table>
											</div>
										</div>
										<hr>
										<br>
										<div style="left:85px;" class="row position-relative">
											<div class="col-6">
												<table class="position-relative" style="width: 100%">
													<tr>
														<td>Tgl Bayar</td>
														<td>:</td>
														<td> <?php echo date_indo(date($data['tgl_bayar']), "d-m-Y"); ?></td>
													</tr>
													<tr>
														<td>Bulan Bayar</td>
														<td>:</td>
														<td> <?php echo $data['bulan_dibayar']; ?></td>
													</tr>
													<tr>
														<td>Tahun Bayar</td>
														<td>:</td>
														<td> <?php echo $data['tahun_dibayar']; ?></td>
													</tr>
												</table>
											</div>
											<div class="col-6">
												<table style="width: 100%">
													<tr>
														<td>Nominal</td>
														<td>:</td>
														<td> Rp.<?php echo $data['nominal']; ?></td>
													</tr>
													<tr>
														<td>Jumlah Bayar</td>
														<td>:</td>
														<td> Rp.<?php echo $data['jumlah_bayar']; ?></td>
													</tr>
													<tr>
														<td>Keterangan</td>
														<td>:</td>
														<td> <?php
																if ($sisa == 0) {
																	echo "<span> Sudah Lunas <i class='ft-check-circle'></i></span>";
																} else {
																	echo "<span> Belum Lunas <i class='ft-x-circle'></i></span>";
																}
																?></td>
													</tr>
												</table>
											</div>
										</div>
										<br>
										<br>
                    					<br>
										<br>
										<br>
										<br>
										<div class="row">
											<div class="col-6 text-center">
												<p><br></p>
												<p>Penyetor</p>
												<br>
												<br>
												<br>
												<p><b><u><?php echo $data['nama'] ?></u></b></p>
											</div>
											<div class="col-6 text-center">
												<p>Banjar, <?= date_indo(date('Y-m-d')) ?></p>
												<p>Petugas</p>
												<br>
												<br>
												<br>
												<p><b><u><?php echo $data['nama_petugas'] ?></u></b></p>
											</div>
										</div>
									</div>

									
	
        <!--END-->
        </div>
    </div>
</div>

</body>
</html>
