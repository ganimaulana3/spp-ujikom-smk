<?php
    include '../admin/index.php';

    // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM petugas WHERE id_petugas='$id'";
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
          echo "<script>alert('Data tidak ditemukan pada database');window.location='petugas.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='petugas.php';</script>";
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

			<form class="wizard-content mt-2" method="post" action="controller_edit_petugas.php">
                      <div class="wizard-pane">
                        <input name="id" value="<?php echo $data['id_petugas']; ?>"  hidden />
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right ">USERNAME</label>
                          <div class="col-lg-4 col-md-6">
                            <input class="form-control" type="text" name="username" value="<?php echo $data['username']; ?>" required=""/>
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right ">PASSWORD</label>
                          <div class="col-lg-4 col-md-6">
                              <input class="form-control" type="text" name="password" value="<?php echo $data['password']; ?>" required=""/>
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right ">NAMA PENGGUNA</label>
                          <div class="col-lg-4 col-md-6">
                              <input class="form-control" type="text" name="nama_petugas" value="<?php echo $data['nama_petugas']; ?>" required=""/>
                          </div>
                        </div>
                          <div class="form-group row align-items-center">
                          <div class="col-lg-4 col-md-6">
                          <select class="form-control col-5" name="level" id="" hidden>
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