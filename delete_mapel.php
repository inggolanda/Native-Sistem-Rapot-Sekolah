<?php 
    include 'koneksi.php';

    $id = $_GET['id'];

    $res = mysqli_query($conn, "DELETE FROM mapel WHERE id_mapel='$id'");
            

    if($res){
        header("Location:laporan_mapel.php?pesan=delete");
    } else {
        echo "gagal";
    }
?>