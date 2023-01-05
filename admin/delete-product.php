<?php
include"header.php";
 $post_id=$_GET['pr_id'];
 $sql="DELETE FROM product WHERE p_id = '$post_id'";
 $result=mysqli_query($con,$sql);
 if($result){
    redirect("product.php");
 }
?>