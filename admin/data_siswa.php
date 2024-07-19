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
</head>
<body>
 
<div style="position:relative;bottom:80vh;" class="app-content content">
	<div class="content-wrapper">
		<div class="content-body"><!-- Revenue, Hit Rate & Deals -->
        <div class="card box-shadow-2">
        <!--START-->
        
        <div class="row">
	<div class="col-md-12">
		<div class="card box-shadow-2">
			
			<div class="card-header">
				<h1 style="text-align: center">Data Siswa</h1>
				<button type="button" class="btn btn-primary btn-bg-gradient-x-purple-blue box-shadow-2"
						data-toggle="modal" data-target="#bootstrap">
					<i class="ft-plus-circle"></i> Tambah data siswa
				</button>
			</div>
			<hr>
			<div class="card-body">
				
				<table style="width:100%;" class="table table-responsive table-bordered zero-configuration">
					<thead>
					<tr>
              				<th>NO</th>
							<th>NISN</th>
							<th>NIS</th>
							<th>NAMA SISWA</th>
							<th scope="col">KELAS</th>
							<th>ALAMAT</th>
							<th>NO TELP</th>
							<th>ID SPP</th>
						  	<th style="text-align:center;"><i class="ft-settings spinner"></i></th>
					</tr>
					</thead>
					<tbody>

          <?php
                              // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
                              $query = "SELECT * FROM siswa,kelas,spp where siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp ORDER BY nisn ASC";
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
							<td><?php echo $row['nisn']; ?></td>
							<td><?php echo $row['nis']?></td>
							<td><?php echo $row['nama']; ?></td>
							<td><?php echo $row['nama_kelas']; ?></td>
              				<td><?php echo $row['alamat']; ?></td>
							<td><?php echo $row['no_telp']; ?></td>
							<td><?php echo substr ($row['id_spp'], 0, 20); ?></td>						

							<td>
								<!--<button
									class="btn btn-success btn-sm  btn-bg-gradient-x-purple-blue box-shadow-2 karyawan-lihat"
									data-toggle="modal" data-target="#lihat" value=""
									title="Lihat selengkapnya"><i class="ft-eye"></i></button>
								<button
									class="btn btn-success btn-sm  btn-bg-gradient-x-blue-green box-shadow-2 karyawan-edit"
									data-toggle="modal" data-target="#ubah<?php echo $row['nisn']; ?>" value=""
									title="Update data siswa"><i class="ft-edit"></i></button>
								<button
									class="btn btn-danger btn-sm  btn-bg-gradient-x-red-pink box-shadow-2 karyawan-hapus"
									data-toggle="modal" data-target="#hapus" value=""
									title="Hapus data siswa"><i class="ft-trash"></i></button>-->
								<a href="../admin/edit_siswa.php?id=<?php echo $row['nisn']; ?>"class="btn btn-success btn-sm  btn-bg-gradient-x-blue-green box-shadow-2"><i class="ft-edit"></i></a>
                <a href="../admin/hapus_siswa.php?id=<?php echo $row['nisn']; ?>" class="btn btn-danger btn-sm  btn-bg-gradient-x-red-pink box-shadow-2" onClick="return confirm('Anda yakin akan menghapus data ini?')"><i class="ft-trash"></i></a>
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
				<h3 class="modal-title" id="myModalLabel35"> Tambah Data Siswa</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="controller_tambah_siswa.php">
                        <div class="modal-body">
                          <div class="form-group">
                            <label>NISN</label>
                            <input maxlength="10" type="text" class="form-control" name="nisn" placeholder="masukan nisn">
                          </div>
                          <div class="form-group">
                            <label>NIS </label>
                            <input maxlength="8" type="text" class="form-control" name="nis" placeholder="nis">
                          </div>
                          <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama">
                          </div>
                          <div class="form-group">
                            <label>Kelas</label>
							<select class="form-control" name="id_kelas">
                             <option value="not_option"> silahkan pilih kelas</option>
                              <?php
                                  // jalankan query untuk menampilkan semua data diurutkan berdasarkan
                                  $query = "SELECT * FROM kelas ORDER BY nama_kelas ASC";
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
                             <option value="<?php echo $row['id_kelas']; ?>"><?php echo $row['nama_kelas']; ?></option>
                             <?php
                                    $no++; //untuk nomor urut terus bertambah 1
                                  }
                                  ?>
                             </select>
                          </div>
						  <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                          </div>
						  <div class="form-group">
                            <label>NO TELP</label>
                            <input type="text" class="form-control" name="no_telp" placeholder="NO TELP">
                          </div>
						  <div class="form-group">
                            <label>TAHUN MASUK</label>
							<select class="form-control" name="tahun">
                             <option value="not_option"> silahkan pilih tahun masuk</option>
                              <?php
                                  // jalankan query untuk menampilkan semua data diurutkan berdasarkan
                                  $query = "SELECT * FROM spp ORDER BY tahun ASC";
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
                             <option value="<?php echo $row['id_spp']; ?>"><?php echo $row['tahun']; ?></option>
                             <?php
                                    $no++; //untuk nomor urut terus bertambah 1
                                  }
                                  ?>
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
				<h3 class="modal-title" id="myModalLabel35"> Lihat Data Karyawan</h3>
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
                              $query = "SELECT * FROM siswa,kelas,spp where siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp ORDER BY nisn ASC";
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
<div class="modal fade text-left" id="ubah<?php echo $data['nisn']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Update Data Karyawan</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="controller_edit_siswa.php">
                      <div class="modal-body">
                         <input name="id" value="<?php echo $data['nisn']; ?>" hidden />
                         <div class="form-group">
                         <label>NISN</label>
                            <input class="form-control" name="nisn" value="<?php echo $data['nisn']; ?>"   />
                        </div> 
                        <div class="form-group">
                        <label>NIS</label>
                            <input class="form-control" type="text" name="nis" value="<?php echo $data['nis']; ?>" />
                        </div>
                        <div class="form-group">
                          <label>NAMA</label>
                              <input class="form-control" type="text" name="nama" value="<?php echo $data['nama']; ?>" required=""/>
                        </div>
                           <div class="form-group">
                          <label>KELAS</label>
                             <select class="form-control" name="id_kelas">
                                    
                                    <?php
                                    $idbarangyangdipilih=$data['id_kelas']; 
                                    // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
                                    $query = "SELECT * FROM kelas ORDER BY nama_kelas ASC";
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
                                  <option value="<?php echo $row['id_kelas']; ?>" <?php if($row['id_kelas']=="$idbarangyangdipilih"){?> selected="selected" <?php } ?>><?php echo $row['nama_kelas']; ?></option>
                               <?php
                                      $no++; //untuk nomor urut terus bertambah 1
                                    }
                                    ?>
                            </select>
                        </div>
                           <div class="form-group">
                          <label>ALAMAT</label>
                              <input class="form-control" type="text" name="alamat" value="<?php echo $data['alamat']; ?>" required=""/>
                        </div>
                           <div class="form-group">
                          <label>NO TELP</label>
                              <input class="form-control" type="text" name="no_telp" value="<?php echo $data['no_telp']; ?>" required=""/>
                        </div>
                           <div class="form-group">
                          <label>TAHUN MASUK</label>
                             <select class="form-control" name="tahun">
                                    
                                    <?php
                                    $idbarangyangdipilih=$data['id_spp']; 
                                    // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
                                    $query = "SELECT * FROM spp ORDER BY tahun ASC";
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
                                  <option value="<?php echo $row['id_spp']; ?>" <?php if($row['id_spp']=="$idbarangyangdipilih"){?> selected="selected" <?php } ?>><?php echo $row['tahun']; ?></option>
                               <?php
                                      $no++; //untuk nomor urut terus bertambah 1
                                    }
                                    ?>
                            </select>
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
				<h3 class="modal-title" id="myModalLabel35"> Hapus Data Siswa ?</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-blue-cyan" data-dismiss="modal" value="Tutup">
				<div id="">

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