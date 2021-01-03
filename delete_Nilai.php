<?php 
    include 'koneksi.php';

    if(isset($_GET['uh'])){
        $id=$_GET['uh'];
    $res = mysqli_query($conn, "DELETE FROM uh WHERE id_UH ='$id'");
            

    if($res){
        header("Location:guru.php?pesan=delete");
    } else {
        echo "gagal";
    }
}else if(isset($_GET['uts'])){
    $id=$_GET['uts'];
    $res = mysqli_query($conn, "DELETE FROM uts WHERE id_uts='$id'");
            

    if($res){
        header("Location:guru.php?pesan=delete");
    } else {
        echo "gagal";
    }
}else if(isset($_GET['uas'])){
    $id=$_GET['uas'];
    $res = mysqli_query($conn, "DELETE FROM uas WHERE id_uas='$id'");
            

    if($res){
        header("Location:guru.php?pesan=delete");
    } else {
        echo "gagal";
    }
}
?>