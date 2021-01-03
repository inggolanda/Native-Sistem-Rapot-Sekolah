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
$i=1;
$html='<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/print.css">
  <title>Rapot Siswa</title>
</head>
<body>';
    
    if(isset($_GET["uh"])){
      $id=$_GET['uh'];
      $s ="SELECT * FROM staff WHERE id_staff='$id'";
      $staff = mysqli_query($conn,$s) or die (mysqli_error($conn));
      $nmstaff= mysqli_fetch_array($staff);
            $html.='
            <img src="uploads/Kops.PNG"  alt="">
              <hr></hr>
             
              <p class="Laporan">Laporan Ulangan Harian</p>
              <table class="rapot" border="1" cellpadding="4" cellspacing="1">
                  <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Kelas</th>
                        <th>Siswa</th>
                        <th>Kepandaian</th>
                        <th>Proyek</th>
                        <th>Portfolio</th>
                        </tr>
                   </thead>
                    <tbody>';
                    $squery1 ="SELECT * FROM uh INNER JOIN siswa ON uh.NIS = siswa.NIS WHERE id_staff='$id' ";
                    $sql1 = mysqli_query($conn,$squery1) or die (mysqli_error($conn));
                    while($hasil= mysqli_fetch_array($sql1)) {
                      $UH=$hasil['id_UH'];
                      $squery12 ="SELECT * FROM uh INNER JOIN kelas ON uh.id_kelas = kelas.id_kelas WHERE id_UH='$UH'";
                      $sql12 = mysqli_query($conn,$squery12) or die (mysqli_error($conn));
                      $uh= mysqli_fetch_array($sql12);
                      
                                    $html .= '
                                <tr>
                                    <td> '.$i++.'</td>
                                    <td> '.$hasil["tgluh"].'</td>
                                    <td> '.$uh["Kelas"].'</td>
                                    <td> '.$hasil["nama_siswa"].'</td>
                                    <td> '.$hasil["Kepandaian"].'</td>
                                    <td> '.$hasil["Proyek"].'</td>
                                    <td> '.$hasil["Portfolio"].'</td>
                                </tr>'; } 
                                $html.='
                    </tbody>
            </table> 
            <p class="pr2">Jakarta, '.$hari.' '.$tgl.'-'.$b.'-'.$TH.'</p>
            <p class="pr1">Pengajar</p>
            <p class="pr">'.$nmstaff["nama"].'</p>';
      }else if(isset($_GET["uts"])){
        $id=$_GET['uts'];
        $s ="SELECT * FROM staff WHERE id_staff='$id'";
        $staff = mysqli_query($conn,$s) or die (mysqli_error($conn));
        $nmstaff= mysqli_fetch_array($staff);
                              $html.='
                              <img src="uploads/Kops.PNG"  alt="">
                              <hr></hr>
                              
                                <p class="Laporan">Laporan Ulangan Tengah Semester</p>
                              <table class="rapot" border="1" cellpadding="4" cellspacing="1">
                              <thead class="head">
                              <tr>
                                  <th>ID</th>
                                  <th>Tanggal</th>
                                  <th>Kelas</th>
                                  <th>Siswa</th>
                                  <th>Nilai</th>
                                </tr>
                              </thead>
                              <tbody>';
                              $squery1 ="SELECT * FROM uts INNER JOIN siswa ON uts.NIS = siswa.NIS WHERE id_staff='$id' ";
                              $sql1 = mysqli_query($conn,$squery1) or die (mysqli_error($conn));
                              while($hasil= mysqli_fetch_array($sql1)) {
                                
                                $Uts=$hasil['id_uts'];
                                $squery12 ="SELECT * FROM uts INNER JOIN kelas ON uts.id_kelas = kelas.id_kelas WHERE id_uts='$Uts'";
                                $sql12 = mysqli_query($conn,$squery12) or die (mysqli_error($conn));
                                $uts= mysqli_fetch_array($sql12);
                                
                                              $html .= '
                                          <tr>
                                              <td> '.$i++.'</td>
                                              <td> '.$hasil["tgluts"].'</td>
                                              <td> '.$uts["Kelas"].'</td>
                                              <td> '.$hasil["nama_siswa"].'</td>
                                              <td> '.$hasil["Nilai_uts"].'</td>
                                          </tr>
                                          ';
                            }$html.='</tbody>
                            </table>
                            <p class="pr2">Jakarta, '.$hari.' '.$tgl.'-'.$b.'-'.$TH.'</p>
                            <p class="pr1">Pengajar</p>
                            <p class="pr">'.$nmstaff["nama"].'</p>';
      }else if(isset($_GET["uas"])){
        $id=$_GET['uas'];
        $s ="SELECT * FROM staff WHERE id_staff='$id'";
        $staff = mysqli_query($conn,$s) or die (mysqli_error($conn));
        $nmstaff= mysqli_fetch_array($staff);
                              $html.='<img src="uploads/Kops.PNG"  alt="">
                              <hr></hr>
                              
                              <p class="Laporan">Laporan Ulangan Akhir Semester</p>
                              <table class="rapot" border="1" cellpadding="4" cellspacing="1">
                              <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Tanggal</th>
                                  <th>Kelas</th>
                                  <th>Siswa</th>
                                  <th>Nilai</th>
                                  <th>Pesan</th>
                              </tr>
                              </thead>
                              <tbody>';
                              $squery1 ="SELECT * FROM uas INNER JOIN siswa ON uas.NIS = siswa.NIS WHERE id_staff='$id' ";
                              $sql1 = mysqli_query($conn,$squery1) or die (mysqli_error($conn));
                              while($hasil= mysqli_fetch_array($sql1)) {
                                $UAS=$hasil['id_uas'];
                                $squery12 ="SELECT * FROM uas INNER JOIN kelas ON uas.id_kelas = kelas.id_kelas WHERE id_uas='$UAS'";
                                $sql12 = mysqli_query($conn,$squery12) or die (mysqli_error($conn));
                                $uas= mysqli_fetch_array($sql12);

                                        
                                              $html .= '
                                          <tr>
                                              <td> '.$i++.'</td>
                                              <td> '.$hasil["tgluas"].'</td>
                                              <td> '.$uas["Kelas"].'</td>
                                              <td> '.$hasil["nama_siswa"].'</td>
                                              <td> '.$hasil["Nilai_uas"].'</td>
                                              <td> '.$hasil["Pesan"].'</td>
                                          </tr>
                              ';} $html.='
                            </tbody>
                            </table>
                            <p class="pr2">Jakarta, '.$hari.' '.$tgl.'-'.$b.'-'.$TH.'</p>
                            <p class="pr1">Pengajar</p>
                            <p class="pr">'.$nmstaff["nama"].'</p>';}
                $html.='</body>
                    </html>
                    ';

$mpdf->WriteHTML($html);
 
$mpdf->Output('Laporan.pdf','I');   

?>