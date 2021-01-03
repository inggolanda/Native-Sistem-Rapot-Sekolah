<?php 
    include 'koneksi.php';

    $id = $_GET['id'];

    $res = mysqli_query($conn, "DELETE FROM staff WHERE id_staff='$id'");
            

    if($res){
        header("Location:laporan_staff.php?pesan=delete");
    } else {
        echo "gagal";
    }
?>