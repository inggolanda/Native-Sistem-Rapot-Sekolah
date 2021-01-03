<?php 
    session_start();
    include 'koneksi.php';
    include 'var.php';
    
    
    $tgluh   = $_POST['tgluh'];
    $kelas  = $_POST['kelas'];
    $NISuh  = $_POST['NIS'];
    $kepandaian  = $_POST['kepandaian'];
    $proyek  = $_POST['proyek'];
    $Portfolio  = $_POST['Portfolio'];
    if (isset($_GET['iduh'])) {
      $iduh = $_GET['iduh'];
      $ids=$id;
      $res = mysqli_query($conn, "UPDATE uh SET tgluh='$tgluh', id_staff='$ids',id_kelas='$kelas', NIS='$NISuh', Kepandaian='$kepandaian', Proyek='$proyek', Portfolio='$Portfolio' WHERE id_UH='$iduh'");
   
    } else {
      $ids = $_GET['id'];
      $res = mysqli_query($conn, "INSERT INTO uh VALUES (NULL,'$tgluh','$ids','$kelas','$NISuh','$kepandaian','$proyek','$Portfolio')");       
    
    }

    if($res){
      if(isset($_GET['iduh'])){
          header("Location:guru.php?pesan=edit");
      } else {
          header("Location:guru.php?pesan=tambah");
      }
    } else {
        echo "gagal";
    }
?>