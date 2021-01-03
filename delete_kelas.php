<?php 
    include 'koneksi.php';

    $id = $_GET['id'];

    $res = mysqli_query($conn, "DELETE FROM kelas WHERE id_kelas='$id'");
            

    if($res){
        header("Location:laporan_kelas.php?pesan=delete");
    } else {
        echo "gagal";
    }
?>