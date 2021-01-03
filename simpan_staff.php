<?php 
  include 'koneksi.php';

  $nama_file =$_FILES['Photo']['name'];
  $ukuran_file =$_FILES['Photo']['size'];
  $tmp_file =$_FILES['Photo']['tmp_name'];

  $path = "uploads/".$nama_file;


	
  $nama = $_POST['nama'];
  $jk = $_POST['jk'];
  $jabatan = $_POST['Jabatan'];
  $mapel = $_POST['mapel'];
  $alamat =$_POST['Alamat'];
  $kontak =$_POST['kontak'];
  $status =$_POST['status'];
  $user =$_POST['user'];
  $password =$_POST['password'];

  
  	if (isset($_GET['id'])) {
      $id = $_GET['id'];
	        if(move_uploaded_file($tmp_file, $path)){ 
				$sql = mysqli_query($conn, "UPDATE staff SET nama='$nama', jk='$jk', jabatan='$jabatan', id_mapel='$mapel', alamat='$alamat', kontak='$kontak', status='$status', user='$user', pass='$password' WHERE id_staff='$id'");
			}
	}else{
		      if(move_uploaded_file($tmp_file, $path)){ 
		         $sql = mysqli_query($conn, "INSERT into staff values (null, '$nama', '$jk', '$jabatan', '$mapel', '$alamat', '$kontak', '$status', '$user', '$password', '$nama_file')");   
		    	}
	 	}
	 	
  	
  if($sql){
      if(isset($_GET['id'])){
          header("Location:staff.php?pesan=edit");
      } else {
          header("Location:staff.php?pesan=tambah");
      }
  } else {
      echo "gagal";
  }
?>