<?php
    include '../admin/index.php';
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
        
        <div class="container">
		<div class="col-lg-12">
			<div class="page-header">
				<br>
				<br>
				
        
				<h2 class="text-center">LAPORAN
				</h2>
			</div>
			<br>
		<form method="POST" action="ekspor.php" enctype="multipart/form-data" >
        <div>
          <label>Dari Tanggal</label>
          <input type="date" class="form-control mb-3" name="daritanggal" autofocus="" required="" />
        </div>
        <div>
          <label>Sampai Tanggal</label>
         <input type="date" class="form-control mb-3" name="sampaitanggal" required=""/>
        </div>
        
        <div class="mb-5">
		 <button title="Cetak Laporan" type="submit" class="btn btn-success btn-bg-gradient-x-purple-blue box-shadow-2"><i class="ft-printer"></i></button>
        </div>
        </section>
      </form>

      <table style="width:100%;" class="table table-responsive table-bordered zero-configuration">
									<thead>
										<tr>
											<th>No</th>
											<th>NISN</th>
											<th>Nama</th>
											<th>Kelas</th>
											<th>SPP</th>
											<th>Nominal</th>
											<th>Tanggal Bayar</th>
											<th>Jumlah Bayar</th>
											<th>Sisa</th>
											<th>Petugas</th>
											<th>Keterangan</th>
											<th style="text-align: center"><i class="ft-settings spinner"></i></th>
										</tr>
									</thead>
									<tbody>

										<?php
										$query = "SELECT * FROM pembayaran INNER JOIN siswa ON pembayaran.nisn=siswa.nisn INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN spp ON pembayaran.id_spp=spp.id_spp INNER JOIN petugas ON pembayaran.id_petugas=petugas.id_petugas";
										$result = mysqli_query($koneksi, $query);
										if (!$result) {
											die("Query Error: " . mysqli_errno($koneksi) .
												" - " . mysqli_error($koneksi));
										}
										$no = 1;
										while ($row = mysqli_fetch_assoc($result)) {
											$sisa = $row['nominal'] - $row['jumlah_bayar'];
										?>

											<tr>
												<td><?php echo $no; ?></td>
												<td><?php echo $row['nisn']; ?></td>
												<td><?php echo $row['nama'] ?></td>
												<td><?php echo $row['nama_kelas']; ?></td>
												<td><?php echo $row['tahun']; ?></td>
												<td><?php echo $row['nominal']; ?></td>
												<td><?php echo $row['tgl_bayar']; ?></td>
												<td><?php echo $row['jumlah_bayar']; ?></td>
												<td>Rp<?php echo number_format($sisa, 2, ',', '.'); ?></td>
												<td><?php echo $row['nama_petugas']; ?></td>

												<td>
													<!--<button
									class="btn btn-success btn-sm  btn-bg-gradient-x-purple-blue box-shadow-2 karyawan-lihat"
									data-toggle="modal" data-target="#lihat" value=""
									title="Lihat selengkapnya"><i class="ft-eye"></i></button>
								<button
									class="btn btn-success btn-sm  btn-bg-gradient-x-blue-green box-shadow-2 karyawan-edit"
									data-toggle="modal" data-target="#ubah" value=""
									title="Update data siswa"><i class="ft-edit"></i></button>
								<button
									class="btn btn-danger btn-sm  btn-bg-gradient-x-red-pink box-shadow-2 karyawan-hapus"
									data-toggle="modal" data-target="#hapus" value=""
									title="Hapus data siswa"><i class="ft-trash"></i></button>-->
													<?php
													if ($sisa == 0) {
														echo "<span class='badge badge-success'><i class='ft-check-circle'></i> Sudah Lunas</span>";
													} else { 
														echo "<span class='badge badge-warning'><i class='ft-x-circle'></i> Belum Lunas</span>";													
													}
													?>


												</td>
												<td>
													<button class="btn btn-success btn-sm  btn-bg-gradient-x-purple-blue box-shadow-2" data-toggle="modal" data-target="#slip<?php echo $row['nisn'] ?>"><i class="ft-printer"></i></button>
												</td> 
												

											</tr>
										<?php
											$no++; //untuk nomor urut terus bertambah 1
										}
										?>

									</tbody>
								</table>
							</div>
						</div>
					</div>

                    <?php
				$query = "SELECT * FROM pembayaran INNER JOIN siswa ON pembayaran.nisn=siswa.nisn INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN spp ON pembayaran.id_spp=spp.id_spp INNER JOIN petugas ON pembayaran.id_petugas=petugas.id_petugas";
				$result = mysqli_query($koneksi, $query);
				if (!$result) {
					die("Query Error: " . mysqli_errno($koneksi) .
						" - " . mysqli_error($koneksi));
				}
				$no = 1;
				while ($row = mysqli_fetch_assoc($result)) {
					$sisa = $row['nominal'] - $row['jumlah_bayar'];
				?>

				<!--modal print-->
					<div class="modal fade text-left" id="slip<?php echo $row['nisn'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header d-print-none">
									<h3 class="modal-title" id="myModalLabel35"> Kwitansi Pembayaran SPP</h3>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body ">
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
												<div class="tengah"><b><u>Kwitansi SPP</u></b></div>
												<br>
											</div>
										</div>
										<div class="row">
											<div class="col-6">
												<table>
													<tr>
														<td>Nama</td>
														<td>:</td>
														<td> <?php echo $row['nama'] ?></td>
													</tr>
													<tr>
														<td>NISN</td>
														<td>:</td>
														<td> <?php echo $row['nisn'] ?></td>
													</tr>
													<tr>
														<td>NIS</td>
														<td>:</td>
														<td> <?php echo $row['nis'] ?></td>
													</tr>
												</table>
											</div>
											<div class="col-6">
												<table>
													<tr>
														<td>Kelas</td>
														<td>:</td>
														<td> <?php echo $row['nama_kelas'] ?></td>
													</tr>
													<tr>
														<td>Alamat</td>
														<td>:</td>
														<td> <?php echo $row['alamat'] ?></td>
													</tr>
													<tr>
														<td>Nomor HP</td>
														<td>:</td>
														<td> <?php echo $row['no_telp'] ?></td>
													</tr>
												</table>
											</div>
										</div>
										<hr>
										<br>
										<div class="row">
											<div class="col-6">
												<table style="width: 100%">
													<tr>
														<td>Tgl Bayar</td>
														<td>:</td>
														<td> <?php echo $row['tgl_bayar'] ?></td>
													</tr>
													<tr>
														<td>Bulan Bayar</td>
														<td>:</td>
														<td> <?php echo $row['bulan_dibayar'] ?></td>
													</tr>
													<tr>
														<td>Tahun Bayar</td>
														<td>:</td>
														<td> <?php echo $row['tahun_dibayar'] ?></td>
													</tr>
												</table>
											</div>
											<div class="col-6">
												<table style="width: 100%">
													<tr>
														<td>Nominal</td>
														<td>:</td>
														<td> Rp.<?php echo $row['nominal'] ?></td>
													</tr>
													<tr>
														<td>Jumlah Bayar</td>
														<td>:</td>
														<td> Rp.<?php echo $row['jumlah_bayar'] ?></td>
													</tr>
													<tr>
														<td>Keterangan</td>
														<td>:</td>
														<td> <?php
																if ($sisa == 0) {
																	echo "<span> Sudah Lunas</span>";
																} else {
																	echo "<span> Belum Lunas</span>";
																}
																?></td>
													</tr>
												</table>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-12">
												<p class="tengah"><b><span id="slip-bersih"></span></b></p>
											</div>
										</div>
										<div class="row">
											<div class="col-12">
												<p class="tengah"><i><span id="slip-terbilang"></span></i></p>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-12">
												<p class="tengah">

													<i><span id="slip-sisa-pinjam"></span></i>
												</p>
											</div>
										</div>
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
												<p><b><u><?php echo $row['nama']?></u></b></p>
											</div>
											<div class="col-6 text-center">
												<p>Banjar, <?= date_indo(date('Y-m-d')) ?></p>
												<p>Petugas</p>
												<br>
												<br>
												<br>
												<p><b><u><?php echo $row['nama_petugas']?></u></b></p>
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer d-print-none">
									<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal" value="Tutup">
									<button onclick="window.print()" class="btn btn-primary btn-bg-gradient-x-purple-blue"><i class="fa fa-print"></i> Cetak
									</button>
								</div>
							</div>
						</div>
					</div>
				<?php
					$no++; //untuk nomor urut terus bertambah 1
				}
				?>

        <!--END-->
        </div>
    </div>
</div>

</body>
</html>