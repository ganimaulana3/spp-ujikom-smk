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
        
        <div class="container">
		<div class="col-lg-12">
			<div class="page-header">
				<br>
				<br>
				
        
				<h2 class="text-center">TRANSAKSI PEMBAYARAN
				</h2>
			</div>
			<br>
		<form action="controller_transaksi.php" method="post">
            </div>
          </div>
            <div style="left: 230px;" class="input-group mb-3 position-relative">
             <div class="input-group-prepend">
            <span style="width:20vh;" class="input-group-text" id="basic-addon1">ID Petugas</span>
               </div>
                <input type="text" name="id_petugas" class="form-control col-5" placeholder="id petugas" aria-label="masukkan id petugas" aria-describedby="basic-addon1">
                </div>

                <div style="left: 230px;" class="input-group mb-3 position-relative">
             <div class="input-group-prepend">
            <span style="width:20vh;" class="input-group-text" id="basic-addon1">NISN</span>
               </div>
                <input type="text" name="nisn" class="form-control col-5" placeholder="nisn" aria-label="masukkan nisn" aria-describedby="basic-addon1" required>
                </div>

               <div style="left: 230px;" class="input-group mb-3 position-relative">
             <div class="input-group-prepend">
            <span style="width:20vh;" class="input-group-text" id="basic-addon1">Tanggal Bayar</span>
               </div>
                <input type="date" name="tgl_bayar" class="form-control col-5" placeholder="tgl_bayar" aria-label="tanggal" aria-describedby="basic-addon1" required >
                </div> 

              <div style="left: 230px;" class="input-group mb-3 position-relative">
              <div class="input-group-prepend">
                <label style="width:20vh;" class="input-group-text" for="inputGroupSelect01">Bulan Bayar</label>
              </div>
              <select class="custom-select col-5" name= "bulan_dibayar" id="inputGroupSelect01" required>
                <option value="">--pilih bulan--</option>
                <option value="januari">Januari</option>
                <option value="februari">Februari</option>
                <option value="maret">Maret</option>
                <option value="januari">April</option>
                <option value="februari">Mei</option>
                <option value="maret">Juni</option>
                <option value="januari">Juli</option>
                <option value="februari">Agustus</option>
                <option value="maret">September</option>
                <option value="januari">oktober</option>
                <option value="februari">november</option>
                <option value="maret">desember</option>
              </select>
            </div>  

              <div style="left: 230px;" class="input-group mb-3 position-relative">
                <div class="input-group-prepend">
                  <label style="width:20vh;" class="input-group-text" for="inputGroupSelect01">Tahun Bayar</label>
                </div>
                <select class="custom-select col-5" name="tahun_dibayar" id="inputGroupSelect01" required>
                  <option value="">--pilih tahun--</option>
                  <option value="2021">2021</option>
                  <option value="2022">2022</option>
                  <option value="2023">2023</option>
                </select>
              </div>

              <div style="left: 230px;" class="input-group mb-3 position-relative">
             <div class="input-group-prepend">
            <span style="width:20vh;" class="input-group-text" id="basic-addon1">ID SPP</span>
               </div>
                <input type="text" name="id_spp" class="form-control col-5" placeholder="id spp" aria-label="masukkan id" aria-describedby="basic-addon1" required>
                </div>

                <div style="left: 230px;" class="input-group mb-3 position-relative">
             <div class="input-group-prepend">
            <span style="width:20vh;" class="input-group-text" id="basic-addon1">jumlah</span>
               </div>
                <input type="text" name="jumlah_bayar" class="form-control col-5" placeholder="jumlah bayar" aria-label="masukkan nominal" aria-describedby="basic-addon1">
                </div>
            <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-primary">Bayar</button>
            </form>
            </div>
            <br/>   

        <!--END-->
        </div>
        </div>
    </div>
</div>

</body>
</html>

<?php
    include '../admin/footer.php';
?>