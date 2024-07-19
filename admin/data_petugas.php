<?php
    include '../admin/index.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    
<div style="position:relative;bottom:80vh;" class="app-content content">
	<div class="content-wrapper">
		<div class="content-body"><!-- Revenue, Hit Rate & Deals -->
        <!--START-->
        
		<div class="row">
	<div class="col-md-12">
		<div class="card box-shadow-2">

				

			<div class="card-header">
				<h1 style="text-align: center">Data Petugas</h1>
				<button type="button" class="btn btn-primary btn-bg-gradient-x-purple-blue box-shadow-2"
						data-toggle="modal" data-target="#bootstrap">
					<i class="ft-plus-circle"></i> Tambah data petugas
				</button>
			</div>
			<hr>
			<div class="card-body">
				<table style="width:100%" class="table table-bordered zero-configuration">
					<thead>
					<tr>
						<th>NO</th>
						<th>USERNAME</th>
						<th>PASSWORD</th>
						<th>NAMA_P</th>
						<th>LEVEL</th>
						<th style="text-align: center"><i class="ft-settings spinner"></i></th>
					</tr>
					</thead>
					<tbody>
					<?php
                              // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
                              $query = "SELECT * FROM petugas ORDER BY id_petugas ASC";
                              $result = mysqli_query($koneksi, $query);
                              //mengecek apakah ada error ketika menjalankan query
                              if(!$result){
                                die ("Query Error: ".mysqli_errno($koneksi).
                                   " - ".mysqli_error($koneksi));
                              }

                              //buat perulangan untuk element tabel dari data mahasiswa
                              $no = 1; //variabel untuk membuat nomor urut
                              // hasil query akan disimpan dalam variabel $data dalam bentuk array
                              // kemudian dicetak dengan perulangan while
                              while($row = mysqli_fetch_assoc($result))
                              {
                              ?>

						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $row['username']?></td>
							<td><?php echo $row['password']?></td>
							<td><?php echo $row['nama_petugas']?></td>
							<td><?php echo $row['level']?></td>
							<td>
								<!--<button
									class="btn btn-success btn-sm  btn-bg-gradient-x-purple-blue box-shadow-2 karyawan-lihat"
									data-toggle="modal" data-target="#lihat" value=""
									title="Lihat selengkapnya"><i class="ft-eye"></i></button>
								<button
									class="btn btn-success btn-sm  btn-bg-gradient-x-blue-green box-shadow-2 karyawan-edit"
									data-toggle="modal" data-target="#ubah" value=""
									title="Update data karyawan"><i class="ft-edit"></i></button>
								<button
									class="btn btn-danger btn-sm  btn-bg-gradient-x-red-pink box-shadow-2 karyawan-hapus"
									data-toggle="modal" data-target="#hapus" value=""
									title="Hapus data karyawan"><i class="ft-trash"></i></button>-->
									<?php
									if ($row['level'] == 'admin'){ ?>
									
								<a href="edit_petugas.php?id=<?php echo $row['id_petugas']; ?>"class="btn btn-success btn-sm  btn-bg-gradient-x-blue-green box-shadow-2"><i class="ft-edit"></i></a>
								<?php
								}else{?>
								
								<a href="edit_petugas.php?id=<?php echo $row['id_petugas']; ?>"class="btn btn-success btn-sm  btn-bg-gradient-x-blue-green box-shadow-2"><i class="ft-edit"></i></a>
		                        <a href="hapus_petugas.php?id=<?php echo $row['id_petugas']; ?>" class="btn btn-danger btn-sm  btn-bg-gradient-x-red-pink box-shadow-2" onClick="return confirm('Anda yakin akan menghapus data ini?')"><i class="ft-trash"></i></a>
								<?php
								}
								?>
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
</div>

<!-- Modal tambah -->
<div class="modal fade text-left" id="bootstrap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Tambah Data Petugas</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="controller_tambah_petugas.php">
                        <div class="modal-body">
                          <div class="form-group">
                            <input type="text" class="form-control" name="id_pengguna" placeholder="ID Pengguna" hidden>
                          </div>
                          <div class="form-group">
                            <label>USERNAME </label>
                            <input type="text" class="form-control" name="username" placeholder="Username">
                          </div>
                          <div class="form-group">
                            <label>PASSWORD</label>
                            <input type="text" class="form-control" name="password" placeholder="Password">
                          </div>
                          <div class="form-group">
                            <label>NAMA PENGGUNA</label>
                            <input type="text" class="form-control" name="nama_petugas" placeholder="Nama Pengguna">
                          </div>
						  <div class="form-group">
                            <label>LEVEL</label>
                            <select type="text" name="level" class="form-control col-3" required>
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                                </select>
                                </div>
                          </div>
						  <div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal"
					   value="Tutup">
				<input type="submit" class="btn btn-primary btn-bg-gradient-x-blue-cyan" value="Simpan">
			</div>
                      </form>
			
		</div>
	</div>
</div>


<!-- Modal lihat -->
<div class="modal fade text-left" id="lihat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Lihat Data Petugas</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<fieldset class="form-group floating-label-form-group">
					<label for="lihat_nama">Nama</label>
					<input type="text" class="form-control" name="nama" id="lihat_nama" placeholder="Nama Karyawan"
						   autocomplete="off" readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="lihat_tempat">Tempat Lahir</label>
					<input type="text" class="form-control" name="tempat_lahir" id="lihat_tempat" value=""
						   placeholder="Tempat Lahir" autocomplete="off" readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="lihat_tl">Tanggal Lahir</label>
					<div class='input-group'>
						<input type="date" class="form-control" name="tanggal_lahir" id="lihat_tl"
							   placeholder="Tanggal Lahir" autocomplete="off" readonly>
						<div class="input-group-append">
										<span class="input-group-text">
											<span class="ft-calendar"></span>
										</span>
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="lihat_alamat">Alamat</label>
					<textarea class="form-control" id="lihat_alamat" rows="3" name="alamat" placeholder="Alamat"
							  autocomplete="off" readonly></textarea>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="lihat_tg">Tanggal Bergabung</label>
					<div class='input-group'>
						<input type="date" class="form-control" id="lihat_tg" name="tanggal_gabung"
							   placeholder="Tanggal Bergabung" autocomplete="off" readonly>
						<div class="input-group-append">
										<span class="input-group-text">
											<span class="ft-calendar"></span>
										</span>
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="lihat_jabatan_karyawan">Jabatan</label>
					<input type="text" class="form-control" name="jabatan" id="lihat_jabatan_karyawan"
						   placeholder="Jabatan" autocomplete="off" readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="lihat_gaji_pokok">Gaji Perhari</label>
					<input type="text" class="form-control" name="jabatan" id="lihat_gaji_pokok"
						   placeholder="Gaji pokok" autocomplete="off" readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="lihat_nohp">Nomor HP</label>
					<input type="number" class="form-control" id="lihat_nohp" name="nomor_hp" placeholder="Nomor HP"
						   autocomplete="off" readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="lihat_norek">Nomor Rekening</label>
					<input type="number" class="form-control" id="lihat_norek" name="nomor_rekening" placeholder="Nomor rekening boleh kosong"
						   autocomplete="off" readonly>
				</fieldset>
			</div>
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal"
					   value="Tutup">
			</div>
		</div>
	</div>
</div>

<?php
                              // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
                              $query = "SELECT * FROM petugas ORDER BY id_petugas ASC";
                              $result = mysqli_query($koneksi, $query);
                              //mengecek apakah ada error ketika menjalankan query
                              if(!$result){
                                die ("Query Error: ".mysqli_errno($koneksi).
                                   " - ".mysqli_error($koneksi));
                              }

                              //buat perulangan untuk element tabel dari data mahasiswa
                              $no = 1; //variabel untuk membuat nomor urut
                              // hasil query akan disimpan dalam variabel $data dalam bentuk array
                              // kemudian dicetak dengan perulangan while
                              while($data = mysqli_fetch_assoc($result))
                              {
                              ?>
<!-- Modal update -->
<div class="modal fade text-left" id="ubah<?php echo $data['id_petugas']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Update Data Petugas</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="controller_edit_petugas.php">
                      <div class="modal-body">
                        <input name="id" value="<?php echo $data['id_petugas']; ?>"  hidden />
                        <div class="form-group">
                          <label>USERNAME</label>
                            <input class="form-control" type="text" name="username" value="<?php echo $data['username']; ?>" required=""/>
                        </div>
                        <div class="form-group">
                          <label>PASSWORD</label>
                              <input class="form-control" type="text" name="password" value="<?php echo $data['password']; ?>" required=""/>
                        </div>
                        <div class="form-group">
                          <label>NAMA PENGGUNA</label>
                              <input class="form-control" type="text" name="nama_petugas" value="<?php echo $data['nama_petugas']; ?>" required=""/>
                        </div>
                          <div class="form-group">
                          <select class="form-control" name="level" id="" hidden>
                            <?php
                            if($data['level'] == 'petugas'){
                              echo " <option value='petugas'>Petugas</option>
                                    <option value='admin'>Admin</option>";
                            }elseif ($data['level'] == 'admin') {
                              echo "<option value='admin'>Admin</option>
                              <option value='petugas'>Petugas</option>";
                            }
                            ?>
                          </select>
                          </div>
                        </div>
                         
						<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal"
					   value="Tutup">
				<input type="submit" class="btn btn-primary btn-bg-gradient-x-blue-cyan" value="Update">
			</div>
                      </div>
					  
			
                    </form>
			
		</div>
	</div>
</div>
<?php
                           $no++; //untuk nomor urut terus bertambah 1
                           }
                         ?>


<!-- Modal hapus -->
<div class="modal fade text-left" id="hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Hapus Data Petugas ?</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-blue-cyan" data-dismiss="modal" value="Tutup">
				<div id="hapuskaryawan">

				</div>
			</div>
		</div>
	</div>
</div>


        <!--END-->
        </div>
    </div>
</div>

</body>
</html>