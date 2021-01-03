<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Madrasah Iqra</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">

  <!--<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  -->
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">
    <div class="row justify-content-center"> 
      <div class="col-xl-10 col-lg-12 col-md-2">
        <div class="card o-hidden border-0 shadow-lg my-5 kecil">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-3">Welcome</h1>
                  </div>
                  <form class="user"action="" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="username" placeholder="Enter user">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                    </div>
                    <div class="btn btn-primary btn-user btn-block">
			                  <input type="submit" name="login" class="btn btn-primary" value="Submit"/>
                    </div>
                      <?php

                        if(isset($_POST['login'])){                          
                          $cek_data = mysqli_query($conn, "SELECT * FROM staff WHERE
                          user = '".$_POST['username']."' AND pass = '".$_POST['password']."'");
                          $data = mysqli_fetch_array($cek_data);
                          $level = $data['jabatan'];
                          $username = $data['user'];
                          if(mysqli_num_rows($cek_data) > 0){
                            $_SESSION['user'] = $username;
                            if($level == 'Tata Usaha'){
                              header('location:laporan_staff.php?idstaff='.$data['id_staff'].'');
                            }else if($level == 'Guru'){
                              header('location:guru.php?id='.$data['id_staff'].'');
                            }
                          }else{
                            echo '<h2 style="color:white">LOGIN GAGAL</h2>';
                          }
                        }
                      ?>
                  </form>
                  <hr>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
