<?php 
    session_start();
    include 'koneksi.php';
    include 'var.php';
    
    $tgluts   = $_POST['tgluts'];
    $kelas  = $_POST['kelas'];
    $NISuts  = $_POST['NIS'];
    $nilai  = $_POST['nilai'];

    if (isset($_GET['iduts'])) {
      $iduts = $_GET['iduts'];
      $ids=$id;
      echo $ids;
      $res = mysqli_query($conn, "UPDATE uts SET tgluts='$tgluts', id_staff='$ids',id_kelas='$kelas', NIS='$NISuts',Nilai_uts='$nilai' WHERE id_uts='$iduts'");
    } else {
        $ids = $_GET['id'];
        $res = mysqli_query($conn, "INSERT INTO uts VALUES (NULL,'$tgluts','$ids','$kelas','$NISuts','$nilai')");       
    }

    if($res){
      if(isset($_GET['iduts'])){
          header("Location:guru.php?pesan=edit");
      } else {
          header("Location:guru.php?pesan=tambah");
      }
  } else {
      echo "gagal";
  }
?>