<?php
    include '../admin/index.php';

    // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM siswa,kelas,spp where siswa.nisn='$id' AND siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='../admin/data_siswa.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='../admin/data_siswa.php';</script>";
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
        
        <div class="row">
	<div class="col-md-12">
		<div class="card box-shadow-2">
			
			<div class="card-header">
				<h1 style="text-align: center">Update Data Siswa</h1>
			</div>
			<hr>

			<form class="wizard-content mt-2" method="post" action="controller_edit_siswa.php">
                      <div class="wizard-pane">
                         <input name="id" value="<?php echo $data['nisn']; ?>" hidden />
                         <div class="form-group row align-items-center">
                         <label class="col-md-4 text-md-right ">NISN</label>
                          <div class="col-lg-4 col-md-6">
                            <input class="form-control" name="nisn" value="<?php echo $data['nisn']; ?>"   />
                          </div>
                        </div> 
                        <div class="form-group row align-items-center">
                        <label class="col-md-4 text-md-right ">NIS</label>
                          <div class="col-lg-4 col-md-6">
                            <input class="form-control" type="text" name="nis" value="<?php echo $data['nis']; ?>" />
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right ">NAMA</label>
                          <div class="col-lg-4 col-md-6">
                              <input class="form-control" type="text" name="nama" value="<?php echo $data['nama']; ?>" required=""/>
                          </div>
                        </div>
                           <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right ">KELAS</label>
                          <div class="col-lg-4 col-md-6">
                             <select class="form-control col-4" name="id_kelas">
                                    
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
                        </div>
                           <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right ">ALAMAT</label>
                          <div class="col-lg-4 col-md-6">
                              <input class="form-control" type="text" name="alamat" value="<?php echo $data['alamat']; ?>" required=""/>
                          </div>
                        </div>
                           <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right ">NO TELP</label>
                          <div class="col-lg-4 col-md-6">
                              <input class="form-control" type="text" name="no_telp" value="<?php echo $data['no_telp']; ?>" required=""/>
                          </div>
                        </div>
                           <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right">TAHUN MASUK</label>
                          <div class="col-lg-4 col-md-6">
                             <select class="form-control col-4" name="tahun">
                                    
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
                        </div>
                          <center>
                            <button type="submit" class="btn btn-primary btn-bg-gradient-x-blue-cyan">UPDATE<i class="fas fa-arrow-right"></i></button>
                            </center>
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