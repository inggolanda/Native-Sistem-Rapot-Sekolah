<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
require 'koneksi.php';
$hari=date('l');
 switch ($hari){
     case 'Monday':$hari="Senin";break;
     case 'Tuesday':$hari="Selasa";break;
     case 'Wednesday':$hari="Rabu";break;
     case 'Thrusday':$hari="Kamis";break;
     case 'Friday':$hari="Jum'at";break;
     case 'Saturday':$hari="Sabtu";break;
     case 'Sunday':$hari="Minggu";break;
 }
 $b=date('m');
 switch ($b){
     case '01':$b="Januari";break;
     case '02':$b="Februari";break;
     case '03':$b="Maret";break;
     case '04':$b="April";break;
     case '05':$b="Mei";break;
     case '06':$b="Juni";break;
     case '07':$b="Juli";break;
     case '08':$b="Agustus";break;
     case '09':$b="September";break;
     case '10':$b="Oktober";break;
     case '11':$b="November";break;
     case '12':$b="Desember";break;

 }
 $tgl=date('d');
 $TH=date('Y');

$html='<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/print.css">
  <title>Rapot Siswa</title>
</head>
<body>';
    if(isset($_GET["kelas"])){
      $id=$_GET["kelas"];
      $s ="SELECT * FROM staff WHERE id_staff='$id'";
      $staff = mysqli_query($conn,$s) or die (mysqli_error($conn));
      $nmstaff= mysqli_fetch_array($staff);
            $html.='
            <img src="uploads/Kops.PNG"  alt="">
              <hr></hr>
              <p class="Laporan">Laporan Kelas</p>
              <table class="rapot" border="1" cellpadding="4" cellspacing="1">
              <thead>
                <tr>

                  <th>No</th>
                  <th>Kelas</th>
                  <th>Wali Kelas</th>
                  <th>Siswa</th>
                </tr>
              </thead>
              <tbody>';
                      $i=1;
                      $squery ="SELECT * FROM kelas INNER JOIN staff ON kelas.id_staff = staff.id_staff 
                                                        JOIN siswa ON kelas.NIS = siswa.NIS" ;
                        $sql = mysqli_query($conn,$squery) or die (mysqli_error($conn));
                      
                        while($hasil= mysqli_fetch_array($sql)) {
                          
                              $html.='
                              <tr>
                              <td> '.$i++.'</td>
                              <td> '.$hasil["Kelas"].'</td>
                              <td> '.$hasil["nama"].'</td>
                              <td> '.$hasil["nama_siswa"].'</td>
                          </tr>'; } $html.='
              </tbody>
            </table>
            
            <p class="pr2">Jakarta, '.$hari.' '.$tgl.'-'.$b.'-'.$TH.'</p>
            <p class="pr1"><br>Tata Usaha</p>
            <p class="pr">'.$nmstaff["nama"].'</p>';
            ;
      }else if(isset($_GET["siswa"])){
        $id=$_GET["siswa"];
      $s ="SELECT * FROM staff WHERE id_staff='$id'";
      $staff = mysqli_query($conn,$s) or die (mysqli_error($conn));
      $nmstaff= mysqli_fetch_array($staff);
            $html.='
            <img src="uploads/Kops.PNG"  alt="">
            <hr></hr>
              <p class="Laporan">Laporan Siswa</p>
            <table class="rapot" border="1" cellpadding="4" cellspacing="1">
            <thead class="head">
                    <tr>
                      <th>NIS</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Tanggal Lahir </th>
                      <th>Wali Murid</th>
                      <th>Kontak</th>
                      <th>Tahun Ajaran</th>
                    </tr>
                   </thead>
                   <tbody>';
                            $sql = mysqli_query($conn, "SELECT * FROM siswa");
                            while($hasil= mysqli_fetch_array($sql)) {
                              $html.='<tr>
                                  <td> '.$hasil["NIS"].'</td>
                                  <td> '.$hasil["nama_siswa"].'</td>
                                  <td>'.$hasil["jk"].'</td>
                                  <td>'.$hasil["tgl"].'</td>
                                  <td>'.$hasil["walimurid"].'</td>
                                  <td>'.$hasil["kontak"].'</td>
                                  <td>'.$hasil["tahunajaran"].'</td>';
                            }$html.='</tbody>
                            </table>
                            <p class="pr2">Jakarta, '.$hari.' '.$tgl.'-'.$b.'-'.$TH.'</p>    
                            <p class="pr1">Tata Usaha</p>
                            <p class="pr">'.$nmstaff["nama"].'</p>';
      }else if(isset($_GET["staff"])){
        $id=$_GET["staff"];
        $s ="SELECT * FROM staff WHERE id_staff='$id'";
        $staff = mysqli_query($conn,$s) or die (mysqli_error($conn));
        $nmstaff= mysqli_fetch_array($staff);
                              $html.='<img src="uploads/Kops.PNG"  alt="">
                              <hr></hr>
                              
                              <p class="Laporan">Laporan Staff</p>
                              <table class="rapot" border="1" cellpadding="4" cellspacing="1">
                              <thead>
                              <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Jabatan</th>
                                <th>Tugas</th>
                                <th>Kontak</th>
                                <th>Status</th>
                              </tr>
                             </thead>
                             <tbody>'; 
                                      
                                    $squery ="SELECT * FROM staff INNER JOIN mapel ON staff.id_mapel = mapel.id_mapel " ;
                                    $sql = mysqli_query($conn,$squery) or die (mysqli_error($conn));
                                     
                                      while($hasil= mysqli_fetch_array($sql)) {
                                        $html .= '
                                        <tr>
                                            <td> '.$hasil["id_staff"].'</td>
                                            <td> '.$hasil["nama"].'</td>
                                            <td>'.$hasil["jk"].'</td>
                                            <td>'.$hasil["jabatan"].'</td>
                                            <td>'.$hasil["mapel"].'</td>
                                            <td>'.$hasil["kontak"].'</td>
                                            <td>'.$hasil["status"].'</td>
                                        </tr>';} $html.='
                                        </tbody>
                                      </table>
                                      
                                      <p class="pr2">Jakarta, '.$hari.' '.$tgl.'-'.$b.'-'.$TH.'</p>
                                      <p class="pr1"><br>Tata Usaha</p>
                                      <p class="pr">'.$nmstaff["nama"].'</p>';
        }else if(isset($_GET["mapel"])){
          $id=$_GET["mapel"];
          $s ="SELECT * FROM staff WHERE id_staff='$id'";
          $staff = mysqli_query($conn,$s) or die (mysqli_error($conn));
          $nmstaff= mysqli_fetch_array($staff);
                                  $html.='<img src="uploads/Kops.PNG"  alt="">
                                  <hr></hr>
                                  <p class="Laporan">Laporan Mata Pelajaran</p>
                                  <table class="rapot" border="1" cellpadding="4" cellspacing="1">
                                  <thead>
                                  <tr>
                                    <th>ID</th>
                                    <th>Mata Pelajaran</th>
                                    <th>KKM</th>
                                  </tr>
                                </thead>
                                <tbody>'; 
                                          
                                $sql = mysqli_query($conn, "SELECT * FROM mapel");
                                              $i=1;
                                while($hasil= mysqli_fetch_array($sql)) {
                                  $html.='
                                  <tr>
                                      <td> '.$hasil["id_mapel"].'</td>
                                      <td> '.$hasil["mapel"].'</td>
                                      <td>'.$hasil["kkm"].'</td>
                                  </tr>';} 
                                  $html.='
                                  </tbody>
                                </table>
                                <p class="pr2">Jakarta, '.$hari.' '.$tgl.'-'.$b.'-'.$TH.'</p>
                                <p class="pr1">Tata Usaha</p>
                                <p class="pr">'.$nmstaff["nama"].'</p>';}
                $html.='</body>
                    </html>
                    ';

$mpdf->WriteHTML($html);
 
$mpdf->Output('Laporan_TU.pdf','I');   

?>