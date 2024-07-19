<div class="modal fade text-left" id="ubah<?php echo $row['nisn']; ?>" role="dialog" aria-labelledby="myModalLabel35"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Update Data Siswa</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="controller_update_siswa.php">
                        <div class="modal-body">
                          <div class="form-group">
                            <label>NISN</label>
                            <input type="hidden" name="id" value="<?php echo $row['nisn'];?>">
                            <input type="number" class="form-control" name="nisn" value="<?php echo $row['nisn'];?>" required>
                          </div>
                          <div class="form-group">
                            <label>NIS </label>
                            <input type="number" class="form-control" name="nis" value="<?php echo $row['nis'];?>">
                          </div>
                          <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?php echo $row['nama'];?>">
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
                            <input type="text" class="form-control" name="alamat" value="<?php echo $row['alamat']; ?>">
                          </div>
						  <div class="form-group">
                            <label>NO TELP</label>
                            <input type="text" class="form-control" name="no_telp" value="<?php echo $row['no_telp']; ?>">
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