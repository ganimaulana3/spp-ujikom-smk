<?php

session_start();
include 'connection.php';

  if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);
    $level = $_POST['level'];

    if($level == "admin"){

      $query = "SELECT * FROM petugas,siswa WHERE username = '$username' && password = '$password' && level='$level'";
      $rs = $koneksi->query($query);
      $num = $rs->num_rows;
      $rows = $rs->fetch_assoc();

      if($num > 0){

        $_SESSION['id_petugas'] = $rows['id_petugas'];
        $_SESSION['username'] = $rows['username'];
        $_SESSION['password'] = $rows['password'];
        $_SESSION['nama_petugas'] = $rows['nama_petugas'];
        $_SESSION['nama'] = $rows['nama'];
        $_SESSION['admin'] = $rows['level'];

        echo "<script type = \"text/javascript\">
        window.location = (\"admin/dashboard.php\")
        </script>";
      }

      else{

        echo "<script>alert('Username atau Password salah!');window.location='index.php';</script>";

      }
    }
    else if($level == "petugas"){

      $query = "SELECT * FROM petugas,siswa WHERE username = '$username' && password = '$password' && level='$level'";
      $rs = $koneksi->query($query);
      $num = $rs->num_rows;
      $rows = $rs->fetch_assoc();

      if($num > 0){

        $_SESSION['id_petugas'] = $rows['id_petugas'];
        $_SESSION['username'] = $rows['username'];
        $_SESSION['password'] = $rows['password'];
        $_SESSION['nama_petugas'] = $rows['nama_petugas'];
        $_SESSION['nama'] = $rows['nama'];
        $_SESSION['petugas'] = $rows['level'];

        echo "<script type = \"text/javascript\">
        window.location = (\"petugas/dashboard.php\")
        </script>";
      }

      else{

        echo "<script>alert('Username atau Password salah!');window.location='index.php';</script>";

      }
    }
    else{

        echo "<script>alert('Username atau Password salah!');window.location='index.php';</script>";

    }
}
?>