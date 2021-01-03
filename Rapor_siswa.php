<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
require 'koneksi.php';
 if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $squery ="SELECT * FROM kelas INNER JOIN siswa ON kelas.NIS=siswa.NIS WHERE id_kelas='$id'" ;
                            $sql = mysqli_query($conn,$squery) or die (mysqli_error($conn));
                            $hasil= mysqli_fetch_array($sql);
                            $n=$hasil['NIS'];
 }
 $guru ="SELECT * FROM kelas INNER JOIN staff ON kelas.id_staff=staff.id_staff WHERE id_kelas='$id'" ;
                            $gr = mysqli_query($conn,$guru) or die (mysqli_error($conn));
                            $g= mysqli_fetch_array($gr);
 $qmapel ="SELECT * FROM staff WHERE jabatan='Guru'" ;
 $staff = mysqli_query($conn,$qmapel) or die (mysqli_error($conn));

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
 $tahun=getdate();
 $N=$tahun["year"]+1;
$html='<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/print.css">
  <title>Rapot Siswa</title>
</head>
<body>
<img src="uploads/Kops.PNG"  alt="">
<hr></hr>
      <table class="header">
        <tr>
            <td align="left">Nama</td>
            <td class="left">'.$hasil["nama_siswa"].'</th>
            <td class="tgl" rowspan="4"><img src="uploads/'.$hasil["photo"].'"  alt="width="70" height="65""></td>
        </tr>
        <tr>
            <td align="left">NIS</td>
            <td class="left">'.$n.'</td>
            
        </tr>
        <tr align="left">
            <td>Kelas</td>
            <td class="left">'.$hasil["Kelas"].'</td>
        </tr>
        <tr align="left">
            <td>Tahun</td>
            <td class="left">'.$tahun["year"].'/'.$N.'</td>
        </tr>
      </table>
      <hr></hr>
      <h5>PENGETAHUAN DAN KETERAMPILAN</h5>
      <table class="rapot" border="1" cellpadding="4" cellspacing="1">
        <thead>
            <tr>
                <th class="NO" rowspan="2">NO</th>
                <th colspan="4" rowspan="2" class="pelajaran">Mata Pelajaran</th>
                <th rowspan="2">KKM</th>
                <th colspan="2">Kepandaian</th>
                <th colspan="2">Keterampilan</th>
                <th rowspan="2" class="masukan">Masukan</th>
            </tr>
            <tr>
                <th>Nilai</th>
                <th>Predikat</th>
                <th>Nilai</th>
                <th>Predikat</th>
            </tr>
            <tr>
                <th colspan="11"></th>
            </tr>
        </thead>
        <tbody>';
                $i=1;
                while ($row=mysqli_fetch_array($staff)):;
                $squery1 ="SELECT * FROM uh WHERE NIS='$n' and id_staff= '$row[0]'";
                        $sql1= mysqli_query($conn,$squery1) or die (mysqli_error($conn));
                        $uh= mysqli_fetch_array($sql1);
                $squery2 ="SELECT * FROM uts WHERE NIS='$n' and id_staff= '$row[0]'";
                        $sql2= mysqli_query($conn,$squery2) or die (mysqli_error($conn));
                        $uts= mysqli_fetch_array($sql2);
                $squery3 ="SELECT * FROM uas WHERE NIS='$n' and id_staff= '$row[0]'";
                        $sql3= mysqli_query($conn,$squery3) or die (mysqli_error($conn));
                        $uas= mysqli_fetch_array($sql3);

                            $staff1=$row[0];


                                $qmapel1 = "SELECT * FROM mapel INNER JOIN staff ON mapel.id_mapel=staff.id_mapel WHERE id_staff='$staff1'";
                                $mp = mysqli_query($conn,$qmapel1) or die (mysqli_error($conn));
                                $hasil2= mysqli_fetch_array($mp);

                                $pengetahuan=$uh['Kepandaian']*0.6+$uts['Nilai_uts']*0.2+$uas['Nilai_uas']*0.2;
                                $jumlah=$uh['Proyek']+$uh['Portfolio'];
                                $keterampilan=$jumlah/2;
                                    if($pengetahuan>=90){
                                        $predikatp='A';
                                    }else if($pengetahuan>=80){
                                        $predikatp='B';
                                    }else if($pengetahuan>=70){
                                        $predikatp='C';
                                    }else {
                                        $predikatp='D';
                                    }
                                    if($keterampilan>=90){
                                        $predikatK='A';
                                    }else if($keterampilan>=80){
                                        $predikatK='B';
                                    }else if($keterampilan>=70){
                                        $predikatK='C';
                                    }else{
                                        $predikatK='D';
                                    }
                $html .= '

        <tr> 
            <td>'.$i++.'</td>
            <td colspan="4" class="pelajaran">'.$hasil2["mapel"].'</td>
            <td>'.$hasil2["kkm"].'</td>
            <td>'.$pengetahuan.'</td>
            <td>'.$predikatp.'</td>
            <td>'.$keterampilan.'</td>
            <td>'.$predikatK.'</td>
            <td class="masukan">'.$uas["Pesan"].'</td>
        </tr>';
        $Tketerampilan += $pengetahuan;
        $Tkepandaian += $keterampilan;
    endwhile;
        $html .= ' 
        <tr>
        <td colspan="6">Total</td>
        <td colspan="2">'.$Tkepandaian.'</td>
        <td colspan="2">'.$Tketerampilan.'</td>
        <td></td>
        </tr>';



      $html.='</table>
      <br>
      <table class="KKM" border="1" cellpanding="30" cellspacing="1" style"width:100%">
        <tr> 
            <td rowspan="3">KKM</td>
            <td colspan="4">Predikat</td>
        </tr>
        <tr>
            <td>D</td>
            <td>C</td>
            <td>B</td>
            <td>A</td>
        </tr>
        <tr>
            <td>0&le;X&le;69</td>
            <td>70&le;X&le;79</td>
        </tr>
      </table>
      <table class="rapott">
      <tr>
        <td align="left"></td>
        <td align="right"><br>Jakarta, '.$hari.' '.$tgl.'-'.$b.'-'.$TH.'</td>
      </tr>
      <tr>
        <td align="left">Wali Kelas</td>
        <td align="right"><br>Kepala Madrasah</td>
      </tr>
      </table>
      <table class="nama">
       <tr>
        <td><b><u>'.$g["nama"].'<u></b></td>
        <td align="right" ><b><u>Ulya Ifsantin, Lc<u></b></td>
       </tr>
      </table>

      
</body>
</html>


';

$mpdf->WriteHTML($html);
 
$mpdf->Output('Rapot-Siswa.pdf','I');   

?>