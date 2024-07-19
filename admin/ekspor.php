<?php
include '../connection.php';



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Kwitansi Pembayaran SPP SMKN 1 BANJAR</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/fontawesome-free/css/all.css">
</head>

<body onload="window.print(); window.onafterprint = window.close(); ">
	<?php
	if (isset($_POST['daritanggal'])) {
		$daritanggal = ($_POST['daritanggal']);
		$sampaitanggal = ($_POST['sampaitanggal']);

	?>
		<p align="center">DATA TRANSAKSI PEMBAYARAN SPP </p>
		<p align="center">SMKN 1 BANJAR</p>
		<p align="center">DARI TANGGAL <?php echo $daritanggal; ?> SAMPAI TANGGAL <?php echo $sampaitanggal; ?></p>
		<p>&nbsp;</p>

		<div class="container">
		<center>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>NISN</th>
						<th>Nama</th>
						<th>Kelas</th>
						<th>Tanggal Bayar</th>
						<th>Bulan Dibayar</th>
						<th>Tahun Dibayar</th>
						<th>Jumlah dibayar</th>
						<th>Petugas</th>

				</thead>
				<tbody>
					<?php
					$query = "SELECT * FROM pembayaran,siswa,spp,petugas,kelas WHERE pembayaran.nisn=siswa.nisn AND siswa.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas AND siswa.id_kelas=kelas.id_kelas AND (pembayaran.tgl_bayar between '$daritanggal' AND '$sampaitanggal')";
					$result = mysqli_query($koneksi, $query);
					if (!$result) {
						die("Query Error: " . mysqli_errno($koneksi) .
							" - " . mysqli_error($koneksi));
					}
					$no = 1;
					while ($data = mysqli_fetch_assoc($result)) {
						$tahunsekarang = date('Y');
						$tahunmasuksiswa = $data['tahun'];
						$diff  = ($tahunsekarang - $tahunmasuksiswa);
						if ($diff == 0) {
							$kelasnow = "X";
						} else if ($diff == 1) {
							$bulansekarang = date('n');
							if ($bulansekarang == 7 || $bulansekarang == 8 || $bulansekarang == 9 || $bulansekarang == 10 || $bulansekarang == 11 || $bulansekarang == 12) {
								$kelasnow = "XI";
							} else {
								$kelasnow = "X";
							}
						} else if ($diff == 2) {
							$bulansekarang = date('n');
							if ($bulansekarang == 7 || $bulansekarang == 8 || $bulansekarang == 9 || $bulansekarang == 10 || $bulansekarang == 11 || $bulansekarang == 12) {
								$kelasnow = "XII";
							} else {
								$kelasnow = "XI";
							}
						} else if ($diff == 3) {
							$bulansekarang = date('n');
							if ($bulansekarang == 7 || $bulansekarang == 8 || $bulansekarang == 9 || $bulansekarang == 10 || $bulansekarang == 11 || $bulansekarang == 12) {
								$kelasnow = "alumni";
							} else {
								$kelasnow = "XII";
							}
						} else if ($diff > 3) {

							$kelasnow = "alumni";
						}

					?>

						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $data['nisn']; ?></td>
							<td><?php echo $data['nama']; ?></td>
							<td><?php echo $data['nama_kelas']; ?></td>
							<td><?php echo $data['tgl_bayar']; ?></td>
							<td><?php echo $data['bulan_dibayar'] ?></td>
							<td><?php echo $data['tahun_dibayar']; ?></td>
							<td><?php echo $data['jumlah_bayar']?></td>
							<td><?php echo $data['nama_petugas']; ?></td>


						</tr>

				<?php
						$no++;
					}
				}
				?>
				</tbody>
			</table>
		</center>
		</div>
</body>

</html>