<?php
include "config.php";
include "function.inc.php";
$d_id=$_GET['id'];
$delete="DELETE FROM staff_info WHERE id='$d_id'";
$output=mysqli_query($con,$delete);
if($output){
    redirect('main.php');
}
?>