<?php include "header.php"; ?>
<?php include "nav-bar.php"; ?>

<div class="container-fluid second_wrap">
   <div class="row ">
       <div class="col-md-12 heading">
            <h4>Atal Utkrisht </br>Late Mahimanand Nautiyal G.I.C</h4>
            <p>Jibya, Kotdhar, Uttarkashi, Uttarakhand</p>
       </div>
   </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 heading-1 mt-4">
            <h1>Gallery |</h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <?php
                $select="SELECT * FROM gallery";
                $output=mysqli_query($con,$select);
                if(mysqli_num_rows($output)){
                    while($row=mysqli_fetch_assoc($output)){
                        echo'
                        <div class="col-md-5 gallery-img">
                            <img src="admin/images/upload/'.$row['images'].'" alt="ukschool" class="img-fluid">
                        </div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>