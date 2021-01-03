<?php 
    session_start();
    include 'koneksi.php';
    include 'var.php';
    
    
    $tgluas   = $_POST['tgluas'];
    $kelas  = $_POST['kelas'];
    $NISuas  = $_POST['NIS'];
    $nilai  = $_POST['nilai'];
    $pesan  = $_POST['pesan'];

    if (isset($_GET['iduas'])) {
      $iduas = $_GET['iduas'];
      $ids=$id;
      $res = mysqli_query($conn, "UPDATE uas SET tgluas='$tgluas', id_staff='$ids',id_kelas='$kelas', NIS='$NISuas',Nilai_uas='$nilai',Pesan='$pesan' WHERE id_uas='$iduas'");
    } else {
        $ids = $_GET['id'];
        $res = mysqli_query($conn, "INSERT INTO uas VALUES (NULL,'$tgluas','$ids','$kelas','$NISuas','$nilai','$pesan')");       
    }

    if($res){
      if(isset($_GET['iduas'])){
          header("Location:guru.php?pesan=edit");
      } else {
          header("Location:guru.php?pesan=tambah");
      }
  } else {
      echo "gagal";
  }
?>