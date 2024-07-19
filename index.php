

<html>
<head>
	<title>Login</title>
<link rel="stylesheet" href="assets/style.css">
<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="assets/vendor/fontawesome/css/font-awesome.min.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">


<style >
    .form-control {
    border-radius: 0.75rem;
}
    .eyes{
        position: relative;
        left: 27vh;
        bottom: 4vh;
        color: grey;
        cursor: pointer;
    }

</style>

</head>

<!------ Include the above in your HEAD tag ---------->
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="" >
    <div class="container">

      <a class="navbar-brand js-scroll-trigger" href="#" style="margin-top: 10px;margin-left:-65px;font-family: 'IBM Plex Sans', sans-serif;"><h4><i class='bx bx-file' aria-hidden="true"></i><!--<i class="fa fa-hospital-o" aria-hidden="true">--></i>&nbsp APLIKASI PEMBAYARAN SPP</h4></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        
      </div>
    </div>
  </nav>

	

<div class="container register" style="font-family: 'IBM Plex Sans', sans-serif;">
                <div class="row">
                    <div class="col-md-3 register-left" style="margin-top: 10%;right: 5%">
                       
                    </div>
                    <div class="col-md-9 register-right" style="margin-top: 40px;left: 80px;">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            
                            <li class="nav-item">
                                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#home" role="tab" aria-controls="profile" aria-selected="false">Siswa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="admin" aria-selected="false">Admin</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="profile-tab">
                                <h3  class="register-heading">Siswa</h3>
                                <form method="post" action="login_siswa.php">
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Masukan NISN" name="NISN" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Masukan NIS" name="nis" required/>
                                        </div>
                                        
                                        <input type="submit" class="btnRegister" name="login_siswa" value="Login"/>
                                    </div>
                                </div>
                            </form>
                            </div>


                            <div class="tab-pane fade show" id="admin" role="tabpanel" aria-labelledby="profile-tab">
                                <h3  class="register-heading">Admin/Petugas</h3>
                                <form method="post" action="login.php">
                                <div class="row register-form">
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Username" name="username" required/>
                                        </div>
                                        


                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password" name="password" id="inputPass" required/>
                                            <span class="eyes"><i id="inputIcon" class="uil-eye-slash"></i></span>
                                        </div>

                                        <script>
                                            const showHiddenPass = (inputPass, inputIcon) =>{
                                            const input = document.getElementById(inputPass),
                                                iconEye = document.getElementById(inputIcon)

                                            iconEye.addEventListener('click', () =>{
                                                if (input.type === 'password') {
                                                    input.type = 'text'
                                                    iconEye.classList.remove('uil-eye-slash')
                                                    iconEye.classList.add('uil-eye')
                                                }else{
                                                    input.type = 'password'
                                                    iconEye.classList.remove('uil-eye')
                                                    iconEye.classList.add('uil-eye-slash')
                                                }
                                            })
                                        }

                                        showHiddenPass('inputPass','inputIcon')
                                        </script>
                                        
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <select class="form-control" name="level">
                                                <option class="form-control" value="admin">Admin</option>
                                                <option class="form-control" value="petugas">Petugas</option>
                                            </select>
                                        </div>
                                        <input type="submit" class="btnRegister" name="login" value="Login"/>
                                    </div>
                                    
                                </div>
                            </form>


                            </div>
                        </div>

                    </div>
                </div>

            </div>
    </body>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="assets/script.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    </html>

  