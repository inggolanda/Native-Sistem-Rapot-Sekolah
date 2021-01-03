<?php

if(isset($_GET['kelas'])){?>
    
    <table class="rapot" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>

        <th>ID</th>
        <th>Kelas</th>
        <th>Wali Kelas</th>
        <th>Siswa</th>
      </tr>
     </thead>
     <tbody><?php
            include 'koneksi.php'; 
              
            $squery ="SELECT * FROM kelas INNER JOIN staff ON kelas.id_staff = staff.id_staff 
                                              JOIN siswa ON kelas.NIS = siswa.NIS" ;
              $sql = mysqli_query($conn,$squery) or die (mysqli_error($conn));
             
              while($hasil= mysqli_fetch_array($sql)) {
                $return = "";
                foreach($sql as $data => $hasil){
                    $return .= '
                <tr>
                    <td> '.$hasil['id_kelas'].'</td>
                    <td> '.$hasil['Kelas'].'</td>
                    <td> '.$hasil['nama'].'</td>
                    <td> '.$hasil['nama_siswa'].'</td>
                </tr>
                ';
              }
              echo $return;
            }
        ?>
     </tbody>
  </table>

}

?>