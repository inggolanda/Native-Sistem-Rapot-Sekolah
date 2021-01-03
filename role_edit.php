<?php

$tgl="";
$staff="";
$kelas="";
$NIS="";
$kd="";
$Kepandaian="";
$Proyek="";
$Portfolio="";
$Nilaiuts="";
$Nilaiuas="";
$Pesan="";

if (isset($_GET['iduh'])) {
  $iduh = $_GET['iduh'];
  $sql = mysqli_query($conn, "SELECT * FROM uh WHERE id_UH='$iduh'");
  if (count($sql) == 1 ) {
    $get = mysqli_fetch_array($sql);
    $tgl   = $get['tgluh'];
    $staff  = $get['id_staff'];
    $kelas  = $get['id_kelas'];
    $NIS  = $get['NIS'];
    $Kepandaian  = $get['Kepandaian'];
    $Proyek  = $get['Proyek'];
    $Portfolio  = $get['Portfolio'];
  }   
}else if (isset($_GET['iduts'])) {
    $iduts = $_GET['iduts'];
    $sql = mysqli_query($conn, "SELECT * FROM uts WHERE id_uts='$iduts'");
    if (count($sql) == 1 ) {
      $get = mysqli_fetch_array($sql);
      $tgl   = $get['tgluts'];
      $staff  = $get['id_staff'];
      $kelas  = $get['id_kelas'];
      $NIS  = $get['NIS'];
      $Nilaiuts  = $get['Nilai_uts'];
    }   
  }else if (isset($_GET['iduas'])) {
    $iduas = $_GET['iduas'];
    $sql = mysqli_query($conn, "SELECT * FROM uas WHERE id_uas='$iduas'");
    if (count($sql) == 1 ) {
      $get = mysqli_fetch_array($sql);
      $tgl   = $get['tgluas'];
      $staff  = $get['id_staff'];
      $kelas  = $get['id_kelas'];
      $NIS  = $get['NIS'];
      $Nilaiuas  = $get['Nilai_uas'];
      $Pesan  = $get['Pesan'];
    }   
  }  
?>
