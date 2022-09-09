<?php 
include "header-file.php";
include "security.php";
?>

<div class="container-fluid">

    <?php include "header.php"; ?>

    <div class="row">
        <div class="col-md-12 p-4">
            <div class="row mt-5 p-3">
                <?php
                $query="SELECT * FROM contact";
                $res=mysqli_query($con,$query);
                if(mysqli_num_rows($res)){
                    while($row=mysqli_fetch_assoc($res)){
                   echo" 
                   <div class='col-md-3 p-4 border ml-3'> 
                        <h5>Name: <span>".$row['name']."</span> </h5>
                        <h5>Email: <span>".$row['email']."</span> </h5>
                        <h5>Purpose: <span>".$row['purpose']."</span> </h5>
                        <h5>Message: <span>".$row['message']."</span> </h5>
                        <a href='delete-query.php?delete_query=".$row['id']."'><i class='zmdi zmdi-delete'></i></a>
                    </div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>