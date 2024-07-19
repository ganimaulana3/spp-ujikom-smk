<?php
    include '../admin/index.php';

	$sql = "SELECT * FROM siswa";
  $query = mysqli_query($koneksi, $sql);
  if(mysqli_num_rows($query)>0){
    $siswa = mysqli_num_rows($query);
  }else{
    $siswa = 0;
  }

  
                    $query = "SELECT * FROM pembayaran INNER JOIN siswa ON pembayaran.nisn=siswa.nisn INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN spp ON pembayaran.id_spp=spp.id_spp INNER JOIN petugas ON pembayaran.id_petugas=petugas.id_petugas";
                    $result = mysqli_query($koneksi, $query);
                    if (!$result) {
                      die("Query Error: " . mysqli_errno($koneksi) .
                        " - " . mysqli_error($koneksi));
                    }
                    while ($row = mysqli_fetch_assoc($result)) {
						$sisa = $row['nominal'] - $row['jumlah_bayar'];
                      	$nominal = $row['nominal'];
					  	$jumlah_dibayar = $row['jumlah_bayar'];
					}
					if(mysqli_num_rows($result)>0){
						$lunas = $jumlah_dibayar < $nominal;
					}else{
						$lunas = 0;
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
        
		<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
			<br>
			<br>
            <span class="text-cursive h1 text-red d-block mb-2">Selamat Datang <?php echo $_SESSION['nama_petugas']?></span>
            <h2 style="font-family: bold;" class="text-cursive">DI APLIKASI PEMBAYARAN SPP</h2>
          </div>
        </div>

		<div class="site-section">
      <div class="container">
        <div class="row">
					
          <div class="col-12 text-center">
            <span class="text-cursive h5 text-red d-block mb-3">SMK NEGERI 1 BANJAR</span>
						<img src="../assets/images/logo/logo_smk_1.jpg" alt="image">
						<p><br></p>

          </div>
        </div>
        <!--<div class="row">
          <div class="col-md-3 mb-4">
            <a href="assets/frontend/images/sigaka/1.jpg" data-fancybox="gal"><img src="assets/frontend/images/sigaka/1.jpg" alt="Image" class="img-fluid"></a>
          </div>
          <div class="col-md-3 mb-4">
            <a href="assets/frontend/images/sigaka/2.jpg" data-fancybox="gal"><img src="assets/frontend/images/sigaka/2.jpg" alt="Image" class="img-fluid"></a>
          </div>
          <div class="col-md-3 mb-4">
            <a href="assets/frontend/images/sigaka/3.jpg" data-fancybox="gal"><img src="assets/frontend/images/sigaka/3.jpg" alt="Image" class="img-fluid"></a>
          </div>
          <div class="col-md-3 mb-4">
            <a href="assets/frontend/images/sigaka/4.jpg" data-fancybox="gal"><img src="assets/frontend/images/sigaka/4.jpg" alt="Image" class="img-fluid"></a>
          </div>

          <div class="col-md-3 mb-4">
            <a href="../../assets/style/images/img_5.jpg" data-fancybox="gal"><img src="../../assets/style/images/img_5.jpg" alt="Image" class="img-fluid"></a>
          </div>
          <div class="col-md-3 mb-4">
            <a href="../../assets/style/images/img_2.jpg" data-fancybox="gal"><img src="../../assets/style/images/img_3.jpg" alt="Image" class="img-fluid"></a>
          </div>
          <div class="col-md-3 mb-4">
            <a href="../../assets/style/images/img_2.jpg" data-fancybox="gal"><img src="../../assets/style/images/img_2.jpg" alt="Image" class="img-fluid"></a>
          </div>
          <div class="col-md-3 mb-4">
            <a href="../../assets/style/images/img_1.jpg" data-fancybox="gal"><img src="../../assets/style/images/img_1.jpg" alt="Image" class="img-fluid"></a> 
          </div>-->
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