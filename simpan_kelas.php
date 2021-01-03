<?php 
    include 'koneksi.php';

    $kelas   = $_POST['kelas'];
    $guru  = $_POST['guru'];
    $NIS  = $_POST['siswa'];
    
         
    
    
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $res = mysqli_query($conn, "UPDATE kelas SET kelas='$kelas', id_staff='$guru', NIS='$NIS' WHERE id_kelas='$id'");
    } else {
        $res = mysqli_query($conn, "INSERT INTO kelas VALUES (NULL,'$kelas','$guru','$NIS')");       
    }

    if($res){
      if(isset($_GET['id'])){
          header("Location:kelas.php?pesan=edit");
      } else {
          header("Location:kelas.php?pesan=tambah");
      }
  } else {
      echo "gagal";
  }
?>