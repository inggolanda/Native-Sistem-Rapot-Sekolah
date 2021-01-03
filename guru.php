<?php 
  

  session_start();
 include 'qlas.php';
 include 'koneksi.php';
  
 $iduh;
 $iduts;
 $iduas;

 
 $squery ="SELECT * FROM kelas INNER JOIN staff ON kelas.id_staff = staff.id_staff 
                                    JOIN siswa ON kelas.NIS = siswa.NIS ORDER BY
 nama_siswa ASC"  ;
 $kelassiswa = mysqli_query($conn,$squery) or die (mysqli_error($conn));
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php 
 include 'var.php';
 include 'role_edit.php';
 ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Madrasah Iqra</title>

  <!-- Custom fonts for this theme -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">


  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Theme CSS -->
  <link href="css/freelancer.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Guru <?php echo $mapel;?></a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#Input">Input</a>
          </li>
          
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Laporan</a>
          </li>

          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="login.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

      <!-- Masthead Avatar Image -->
      <img class="rounded-circle" src="uploads/<?php echo $photo;?>"  alt="" width="200" height="200">

      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0"><?php echo $nama;?></h1>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Masthead Subheading -->
      <p class="masthead-subheading font-weight-light mb-0"><?php echo $jk;?></p>

    </div>
  </header>

  <!-- Portfolio Section -->
  <section class="page-section portfolio" id="Input">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Input Data</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Portfolio Grid Items -->
      <div class="row">

        <!-- NilaiUH 1 -->
        <div class="col-md-6 col-lg-4">
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#nilaiUH">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
              <div class="portfolio-item-caption-content text-center text-white">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/nilai3.png" alt=""width=300px>
          </div>
        </div>

        <!-- nilaiUTS -->
        <div class="col-md-6 col-lg-4">
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#nilaiUTS">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
              <div class="portfolio-item-caption-content text-center text-white">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/nilai2.png" alt="">
          </div>
        </div>

        <!-- nilaiUAS -->
        <div class="col-md-6 col-lg-4">
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#nilaiUAS">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
              <div class="portfolio-item-caption-content text-center text-white">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/nilai1.png" alt=""width=300px>
          </div>
        </div>

      
      <!-- /.row -->

    </div>
  </section>
<!-- Contact Section -->
<section class="page-section" id="contact">
    <div class="container">
    

      <!-- Contact Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Laporan</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>
      <!-- Contact Section Form -->
          <select id="tabel" class="form-control" name="table">
            <option value="">Pilih Laporan</option>
            <option <?php //if ($iduh!=null) { echo 'selected'; } ?>value="1">Ulangan Harian</option>
            <option <?php //else if ($iduts!=null) { echo 'selected'; } ?>value="2">Ujian Tengah Semester</option>
            <option <?php //else if ($iduas!=null) { echo 'selected'; } ?> value="3">Ujian Akhir Semester</option>
            <?php include 'tabel.php'; ?>
          </select>
      </div>
      </div>
    </div>
  </section>
  <div id="laporan" class="container-fluid">
    
  </div>

  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <div class="row">

        <!-- Footer Location -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Location</h4>
          <p class="lead mb-0">Jl. Raya Pondok Ranggon RT. 005/05 No. 53 Cipayung – Jakarta Timur.
            <br><br>Madrasah Ibtidaiyah Terpadu <br>Taman Imani IQRA</p>
        </div>

        <!-- Footer Social Icons -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Around the Web</h4>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-facebook-f"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-twitter"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-linkedin-in"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-dribbble"></i>
          </a>
        </div>

        <!-- Footer About Text -->
        <div class="col-lg-4">
          <h4 class="text-uppercase mb-4">Tentang Sekolah</h4>
          <p class="lead mb-0">Madrasah Ibtidaiyah Terpadu <br>Taman Imani IQRA 
            
            </p>
        </div>

      </div>
    </div>
  </footer>

  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &copy; KKP 2019</small>
    </div>
  </section>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>

  <!-- Nilia Modals -->

  <!-- NilaiUH -->
  <?php
  echo $_SESSION['id_role'];
  include 'uh.php';
  include 'uts.php';
  include 'uas.php';
  ?>
  

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
       
       $(document).ready(function(){
       $('#tabel').change(function(){
           
           var inputValue = $(this).val();
           // alert("value in js "+inputValue);
               
                $.ajax({
               url:"tabel.php",
               method:"POST",
               data:{dropdownValue:inputValue},
               success:function(data){
               $('#laporan').html(data);
               console.log(data)
               }
             }) 
           });
          })
   </script>

  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>
  





</body>

</html>
