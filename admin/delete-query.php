<?php
    include "function.inc.php";
    include "config.php";
    $id=$_GET['delete_query'];

    $delete="DELETE FROM contact WHERE id='$id'";
    $result=mysqli_query($con,$delete);
    if($result){
        redirect('query.php');
    }
?>