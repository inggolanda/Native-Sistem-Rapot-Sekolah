<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tata Usaha</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">

  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <!-- Custom fonts for this template-->
  
  <link href="vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="Dashboard.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <img class="img-fluid" src="img/portfolio/sekolah.png" width="80px">
        </div>
        <div class="sidebar-brand-text mx-1">Tata Usaha <sup>Madrasah Ibtidaiyah Iqra</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item ">
        <a class="nav-link" href="Dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Input User
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="staff.php" >
          <i class="glyphicon glyphicon-user"></i>
          <span>Staff</span>
        </a>
       
      </li>
      <!-- Nav Item - Siswa Menu -->
      <li class="nav-item ">
        <a class="nav-link" href="Siswa.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>Siswa</span></a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="kelas.php">
          <i class="glyphicon glyphicon-list-alt"></i>
          <span>kelas</span>
        </a>
      </li>

      <li class="nav-item ">
        <a class="nav-link" href="mapel.php">
          <i class="glyphicon glyphicon-tasks"></i>
          <span>Mata Pelajaran</span></a>
      </li>

      <li class="nav-item ">
        <a class="nav-link" href="jadwal.php">
          <i class="glyphicon glyphicon-calendar"></i>
          <span>Jadwal</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#seting" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Seting</span>
        </a>
        <div id="seting" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login </h6>
            <a class="collapse-item" href="login.php">Login</a>
            <a class="collapse-item" href="login.php">Setting Dashbord</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      
      <!-- Nav Item - Tables -->
      <li class="nav-item  active ">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporan" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-table"></i>
          <span>Laporan</span></a>
          <div id="laporan" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"> Lihat Data </h6>
            <a class="collapse-item" href="laporan_staff.php">Data Staff</a>
            <a class="collapse-item" href="laporan_siswa.php">Data Siswa</a>
            <a class="collapse-item" href="laporan_mapel.php">Data Mata Pelajaran</a>
            <a class="collapse-item" href="laporan_kelas.php">Data Kelas</a>
            <a class="collapse-item" href="laporan_jadwal.php">Data Jadwal</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-300 small"></span>
                <i class="glyphicon glyphicon-user"></i>
                
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="login.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <section class="content">
          <?php include "dasborr.php";?>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <!-- <form method="post" action="addCustomer.php"> -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    
                    
                    
                    
                  </div>
                </div>
              </div>

              <!--<div class="box-footer">
                  <input type="submit" name="addCustomer" class="btn btn-primary" value="Submit"/>
                  <a href="jadwal.html" class="btn btn-warning">Cancel</a>
              </div>-->
          </div>
        </div>
      </div>
    </section>

  <!-- Bootstrap core JavaScript-->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="dist/js/demo.js"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
  	<script>
  $(function(){
    $('#datepicker').datepicker({
      autoclose: true,
      daysOfWeekDisabled: [0]
    })
    $("#datepicker1").datepicker( {
    format: " yyyy",
    viewMode: "years", 
    minViewMode: "years"
});
    $('.timepicker').timepicker({
      showInputs: false
    })
    
  })
    
</script>

</body>

</html>
