<?php

session_start();
include 'connection.php';

  if(isset($_POST['login_siswa'])){

    $NISN = $_POST['NISN'];
    $nis = $_POST['nis'];

    $query = "SELECT * FROM siswa,petugas WHERE nisn = '$NISN' AND nis = '$nis' ";
    $rs = $koneksi->query($query);
    $num = $rs->num_rows;
    $rows = $rs->fetch_assoc();

    if($num > 0){

      $_SESSION['id_petugas'] = $rows['id_petugas'];
      $_SESSION['nisn'] = $rows['nisn'];
      $_SESSION['nis'] = $rows['nis'];
      $_SESSION['nama'] = $rows['nama'];
      $_SESSION['nama_petugas'] = $rows['nama_petugas'];

      echo "<script type = \"text/javascript\">
        window.location = (\"siswa/dashboard.php\")
        </script>";
    }

    else{

      echo "<script>alert('NISN atau nis salah!');window.location='index.php';</script>";

    }
  }
?>