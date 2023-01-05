<?php
include"header.php";
$delete=$_GET['d_id'];
// echo $delete;
$sql="DELETE FROM `cart` WHERE `cart`.`id` = '$delete'";
$result=mysqli_query($con,$sql);
if($result){
    redirect('cart.php');
}
?>