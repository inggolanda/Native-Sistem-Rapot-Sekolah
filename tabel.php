<?php
session_start();
include 'koneksi.php';
include 'var.php';
$n;
if($_POST['dropdownValue']){
    $n=$_POST['dropdownValue'];
    if($n==1){?>
        <h1 class="h3 mb-2 text-gray-800"></h1>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Ulangan Harian</h6>
                <div class="row">
                  <div class="text-right mt-4">
                    <a class="btn btn-primary" href="Print_nilai.php?uh=<?php echo $id;?>" target="_blank">
                    <i class="fas fa-download mr-2"></i>
                    Laporan Ulangan Harian
                    </a>
                  </div>
                &ensp;&ensp;
                </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                      <th>ID</th>
                      <th>Tanggal</th>
                      <th>Kelas</th>
                      <th>Siswa</th>
                      <th>Kepandaian</th>
                      <th>Proyek</th>
                      <th>Portfolio</th>
                      <th>Action</th>
                    </tr>
                   </thead>
                   <tbody>
                        <?php 
                            
                          $squery1 ="SELECT * FROM uh INNER JOIN siswa ON uh.NIS = siswa.NIS WHERE id_staff='$id' ";
                            $sql1 = mysqli_query($conn,$squery1) or die (mysqli_error($conn));
                            while($hasil= mysqli_fetch_array($sql1)) {
                              $UH=$hasil['id_UH'];
                              $squery12 ="SELECT * FROM uh INNER JOIN kelas ON uh.id_kelas = kelas.id_kelas WHERE id_UH='$UH'";
                              $sql12 = mysqli_query($conn,$squery12) or die (mysqli_error($conn));
                              $uh= mysqli_fetch_array($sql12);
                              $return = "";
                              foreach($sql1 as $data => $hasil){
                                  $return .= '
                              <tr>
                                  <td> '.$hasil['id_UH'].'</td>
                                  <td> '.$hasil['tgluh'].'</td>
                                  <td> '.$uh['Kelas'].'</td>
                                  <td> '.$hasil['nama_siswa'].'</td>
                                  <td> '.$hasil['Kepandaian'].'</td>
                                  <td> '.$hasil['Proyek'].'</td>
                                  <td> '.$hasil['Portfolio'].'</td>
                                  <td><div class="btn-action">
                                      <div class="row">
                                        <a href="guru.php?iduh='.$hasil['id_UH'].'" class="btn-cstm btn btn-block btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="delete_uh.php?iduh='.$hasil['id_UH'].'" class="btn-cstm btn btn-block btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                      </div>
                                      </div>
                                  </td>
                              </tr>
                              ';
                            }
                            echo $return;
                          }
                      ?>
                   </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>          
    <?php }else if($n==2){ ?>
        <h1 class="h3 mb-2 text-gray-800"></h1>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Ujian Tengah Semester</h6>
                <div class="row">
                  <div class="text-right mt-4">
                    <a class="btn btn-primary" href="Print_nilai.php?uts=<?php echo $id;?>" target="_blank">
                    <i class="fas fa-download mr-2"></i>
                    Laporan Ujian Tengah Semeter
                    </a>
                  </div>
                &ensp;&ensp;
                </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                      <th>ID</th>
                      <th>Tanggal</th>
                      <th>Kelas</th>
                      <th>Siswa</th>
                      <th>Nilai</th>
                      <th>Action</th>
                    </tr>
                   </thead>
                   <tbody>
                        <?php
                        
                        $squery1 ="SELECT * FROM uts INNER JOIN siswa ON uts.NIS = siswa.NIS WHERE id_staff='$id' ";
                        $sql1 = mysqli_query($conn,$squery1) or die (mysqli_error($conn));
                        while($hasil= mysqli_fetch_array($sql1)) {
                          $uts=$hasil['id_uts'];
                          $squery12 ="SELECT * FROM uts INNER JOIN kelas ON uts.id_kelas = kelas.id_kelas WHERE id_uts='$uts'";
                          $sql12 = mysqli_query($conn,$squery12) or die (mysqli_error($conn));
                          $uts= mysqli_fetch_array($sql12);
                              $return = "";
                              foreach($sql1 as $data => $hasil){
                                  $return .= '
                              <tr>
                                  <td> '.$hasil['id_uts'].'</td>
                                  <td> '.$hasil['tgluts'].'</td>
                                  <td> '.$uts['Kelas'].'</td>
                                  <td> '.$hasil['nama_siswa'].'</td>
                                  <td> '.$hasil['Nilai_uts'].'</td>
                                  <td><div class="btn-action">
                                      <div class="row">
                                        <a href="guru.php?iduts='.$hasil['id_uts'].'" class="btn-cstm btn btn-block btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="delete_uh.php?iduts='.$hasil['id_uts'].'" class="btn-cstm btn btn-block btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                      </div>
                                      </div>
                                  </td>
                              </tr>
                              ';
                            }
                            echo $return;
                          }
                      ?>
                   </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    <?php }else if($n==3){ ?>
        <h1 class="h3 mb-2 text-gray-800"></h1>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Ujian Akhir Semester</h6>
                <div class="row">
                  <div class="text-right mt-4">
                    <a class="btn btn-primary" href="Print_nilai.php?uas=<?php echo $id;?>" target="_blank">
                    <i class="fas fa-download mr-2"></i>
                    Laporan Ujian Akhir Semester
                    </a>
                  </div>
                &ensp;&ensp;
                </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                      <th>ID</th>
                      <th>Tanggal</th>
                      <th>Kelas</th>
                      <th>Siswa</th>
                      <th>Nilai</th>
                      <th>Pesan</th>
                      <th>Action</th>
                    </tr>
                   </thead>
                   <tbody>
                        <?php
                        $squery1 ="SELECT * FROM uas INNER JOIN siswa ON uas.NIS = siswa.NIS WHERE id_staff='$id' ";
                        $sql1 = mysqli_query($conn,$squery1) or die (mysqli_error($conn));
                        while($hasil= mysqli_fetch_array($sql1)) {
                          $uas=$hasil['id_uas'];
                          $squery12 ="SELECT * FROM uas INNER JOIN kelas ON uas.id_kelas = kelas.id_kelas WHERE id_uas='$uas'";
                          $sql12 = mysqli_query($conn,$squery12) or die (mysqli_error($conn));
                          $uas= mysqli_fetch_array($sql12);
                              $return = "";
                              foreach($sql1 as $data => $hasil){
                                  $return .= '
                              <tr>
                                  <td> '.$hasil['id_uas'].'</td>
                                  <td> '.$hasil['tgluas'].'</td>
                                  <td> '.$uas['Kelas'].'</td>
                                  <td> '.$hasil['nama_siswa'].'</td>
                                  <td> '.$hasil['Nilai_uas'].'</td>
                                  <td> '.$hasil['Pesan'].'</td>
                                  <td><div class="btn-action">
                                      <div class="row">
                                        <a href="guru.php?iduas='.$hasil['id_uas'].'" class="btn-cstm btn btn-block btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="delete_uh.php?iduas='.$hasil['id_uas'].'" class="btn-cstm btn btn-block btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                      </div>
                                      </div>
                                  </td>
                              </tr>
                              ';
                            }
                            echo $return;
                          }
                      ?>
                   </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <?php 
    }
}
?>
<script src="js/freelancer.min.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

