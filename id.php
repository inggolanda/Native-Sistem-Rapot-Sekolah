<?php
include 'koneksi.php';
$_SESSION['id_roles'];
$ids;
if (isset($_GET['idstaff'])) {
    $ids = $_GET['idstaff'];
    $_SESSION['id_roles']=$ids;
}else if ($_SESSION['id_roles']!=null) {
    $ids = $_SESSION['id_roles'];
}

?>