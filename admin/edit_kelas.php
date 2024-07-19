<?php
    include '../admin/index.php';

    // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM kelas WHERE id_kelas='$id'";
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
          echo "<script>alert('Data tidak ditemukan pada database');window.location='../admin/data_kelas.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='../admin/data_kelas.php';</script>";
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
				<h1 style="text-align: center">Update Data Kelas</h1>
			</div>
			<hr>

			<form class="wizard-content mt-2" method="post" action="controller_edit_kelas.php">
                      <div class="wizard-pane">
                        <input name="id" value="<?php echo $data['id_kelas']; ?>"  hidden />
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right">NAMA KELAS</label>
                          <div class="col-lg-4 col-md-6">
                            <input class="form-control" type="text" name="nama_kelas" value="<?php echo $data['nama_kelas']; ?>" required=""/>
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right">KOMPETENSI KEAHLIAN</label>
                          <div class="col-lg-4 col-md-6">
                              <input class="form-control" type="text" name="kompetensi_keahlian" value="<?php echo $data['kompetensi_keahlian']; ?>" required=""/>
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