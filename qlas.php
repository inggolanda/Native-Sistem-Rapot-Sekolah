
<?php
 include 'koneksi.php';
 //include 'role_edit.php';
 
    $ids;
    if($_POST['dropdownValue']){
        //p($_POST['dropdownValue']);
    //}
     //function p($ids){
        $ids=$_POST['dropdownValue'];
        echo $ids;
                                          
            $sql ="SELECT * FROM kelas WHERE NIS='$ids'" ;
            $kelas = mysqli_query($conn,$sql) or die (mysqli_error($conn));
            
            while ($rowk=mysqli_fetch_array($kelas)):;?>
            <?php 
                if (isset($_GET['iduh'])) { ?>
                <option <?php if($kelas==$rowk['id_kelas']){ echo "selected"; } ?> value="<?php echo $rowk['id_kelas'];?>">
                <?php echo $rowk['Kelas'];?> 
                </option>                          
                <?php } else {

            ?>
            <option value="<?php echo $rowk['id_kelas'];?>">
                <?php echo $rowk['Kelas'];; ?> 
            </option>

        <?php } endwhile;  
     } else if ($NIS!==NULL){
        $ids=$NIS;
        $sql ="SELECT * FROM kelas WHERE NIS='$ids'" ;
        $kelas = mysqli_query($conn,$sql) or die (mysqli_error($conn));
        
        while ($rowk=mysqli_fetch_array($kelas)):;?>
        <?php 
            if (isset($_GET['iduh'])) { ?>
            <option <?php if($kelas==$rowk['id_kelas']){ echo "selected"; } ?> value="<?php echo $rowk['id_kelas'];?>">
            <?php echo $rowk['Kelas'];?> 
            </option>                          
            <?php } else {

        ?>
        <option value="<?php echo $rowk['id_kelas'];?>">
            <?php echo $rowk['Kelas'];; ?> 
        </option>

    <?php } endwhile;

     }
     
 ?>
 