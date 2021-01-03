<?php 
    include 'koneksi.php';

    $mapel   = $_POST['mapel'];
    $KKM  = $_POST['KKM'];
    
         
    
    
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $res = mysqli_query($conn, "UPDATE mapel SET mapel='$mapel', kkm='$KKM' WHERE id_mapel='$id'");
    } else {
        $res = mysqli_query($conn, "INSERT INTO mapel VALUES (NULL,'$mapel','$KKM')");       
    }

    if($res){
      if(isset($_GET['id'])){
          header("Location:mapel.php?pesan=edit");
      } else {
          header("Location:mapel.php?pesan=tambah");
      }
  } else {
      echo "gagal";
  }
?>