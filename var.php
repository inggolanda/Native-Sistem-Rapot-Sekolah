<?php

//session_start();

$_SESSION['id_role'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $squery ="SELECT * FROM staff 
                INNER JOIN mapel ON staff.id_mapel = mapel.id_mapel WHERE id_staff='$id'" ;
    $data = mysqli_query($conn,$squery) or die (mysqli_error($conn));
      if (count($data) == 1 ) {
        $get = mysqli_fetch_array($data);
        $nama  = $get['nama'];
        $jk  = $get['jk'];     
        $jabatan  = $get['jabatan'];
        $mapel   = $get['mapel'];
        $photo  = $get['photo'];
        $_SESSION['id_role']=$id;
      }
 } else if ($_SESSION['id_role']!=null) {
  $id = $_SESSION['id_role'];

  $squery ="SELECT * FROM staff 
              INNER JOIN mapel ON staff.id_mapel = mapel.id_mapel WHERE id_staff='$id'" ;
  $data = mysqli_query($conn,$squery) or die (mysqli_error($conn));
    if (count($data) == 1 ) {
      $get = mysqli_fetch_array($data);
      $nama  = $get['nama'];
      $jk  = $get['jk'];     
      $jabatan  = $get['jabatan'];
      $mapel   = $get['mapel'];
      $photo  = $get['photo'];
      $_SESSION['id_role']=$id;
    }
}else{
    $nama="";
    $Mapel="";
    $jabatan="";
  }
?>