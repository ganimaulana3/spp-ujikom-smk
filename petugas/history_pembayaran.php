<?php
    include '../petugas/index.php';
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
        
    <div class="container">
      <div class="row">
        <!-- /.col-md-6 -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <br>
              <h1 class="card-title text-center">HISTORY PEMBAYARAN</h1>
              <br>
              <br>
              <hr>
              
              
            </div>
            

    

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
													} else { ?>
														<a class="badge badge-warning text-white" href="edit_pembayaran.php?nisn=<?php echo $row['nisn'] ?>&sisa=<?php echo $sisa ?>" title="Bayar Sekarang!"><i class='ft-x-circle'></i> Belum Lunas</a>
													<?php
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

        <!--END-->
        </div>
    </div>
</div>

</body>
</html>
