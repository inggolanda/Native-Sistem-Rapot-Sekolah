<?php 
    include 'koneksi.php';

    $id = $_GET['id'];

    $res = mysqli_query($conn, "DELETE FROM siswa WHERE NIS='$id'");
            

    if($res){
        header("Location:laporan_siswa.php?pesan=delete");
    } else {
        echo "gagal";
    }
?>