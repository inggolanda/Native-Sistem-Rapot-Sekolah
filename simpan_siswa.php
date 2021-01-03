
<?php 
  include 'koneksi.php';

  $nama_file =$_FILES['Photo']['name'];
  $ukuran_file =$_FILES['Photo']['size'];
  $tmp_file =$_FILES['Photo']['tmp_name'];

  $path = "uploads/".$nama_file;


	$NIS = $_POST['NIS'];
  $nama = $_POST['nama'];
  $jk = $_POST['jk'];
  $tgl = $_POST['tgl'];
  $alamat =$_POST['alamat'];
  $wali =$_POST['wali'];
  $kontak =$_POST['kontak'];
  $ajaran =$_POST['ajaran'];
  $password =$_POST['password'];

  
  	if (isset($_GET['id'])) {
      $id = $_GET['id'];
	        if(move_uploaded_file($tmp_file, $path)){ 
				$sql1 = mysqli_query($conn, "UPDATE siswa SET nama_siswa='$nama', jk='$jk',  tgl ='$tgl', alamat='$alamat',walimurid='$wali', kontak='$kontak', tahunajaran='$ajaran', pass ='$password',photo ='$nama_file' WHERE NIS='$id'");
			}
	}else{
		      if(move_uploaded_file($tmp_file, $path)){ 
		         $sql1 = mysqli_query($conn, "INSERT into siswa values ($NIS, '$nama', '$jk', '$tgl','$alamat','$wali','$kontak', '$ajaran', '$password', '$nama_file')");   
		    	}
	 	}
	 	
  	
  if($sql1){
      if(isset($_GET['id'])){
          header("Location:siswa.php?pesan=edit");
      } else {
          header("Location:siswa.php?pesan=tambah");
      }
  } else {
      echo "gagal";
  }
?>