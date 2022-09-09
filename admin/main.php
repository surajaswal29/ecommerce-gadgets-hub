<?php 
include "header-file.php";
include "security.php";
?>

<div class="container-fluid">

    <?php include "header.php"; ?>

    <div class="row mt-2 border-top p-4">

    <?php if($_SESSION['uname']=="root_admin"){ ?>

        <div class="col-md-12 mt-3 center">
            <h2>Staff Details</h2>   
        </div>

        <div class="col-md-12 mt-4 px-5">
            <table class="table table-hover table-bordered table-striped table-sm-responsive">
                <tr class="bg-dark font-weight-bold text-white">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Phone</th>
                    <th>Type</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Date</th>
                </tr>
                <?php
                    $sql1="SELECT * FROM staff_info ORDER BY `staff_info`.`id` ASC";
                    $output1=mysqli_query($con,$sql1);
                    if(mysqli_num_rows($output1)){
                        while($temp=mysqli_fetch_assoc($output1)){
                            echo'
                            <tr>
                                <td> '.$temp["id"].'</td>
                                <td> '.$temp["name"].'</td>
                                <td> '.$temp["designation"].' </td>
                                <td>'.$temp["phone"].'</td>
                                <td>'.$temp["type"].'</td>
                                <td><a href="edit-staff.php?id='.$temp["id"].'"><i class="zmdi zmdi-edit"></i></a></td>
                                <td><a href="delete-staff.php?id='.$temp["id"].'"><i class="zmdi zmdi-delete"></i></a></td>
                                <td> '.$temp["date"].'</td>
                            </tr>';
                        }
                    }
                ?>
            </table>
        </div>

        <?php }else
        { ?>
            <div class="col-md-12 mt-3 py-4 bg-dark text-white rounded">
                <h2>My Academy</h2>
            </div>
            <?php
                $query="SELECT * FROM academy JOIN admin_credential ON academy.academy=admin_credential.academy WHERE username='{$_SESSION['uname']}'";
                $result=mysqli_query($con,$query);
                $fetch=mysqli_fetch_assoc($result);
            ?>
            <div class="col-md-8 mt-4 border py-3">
                <div class="row">
                    <div class="col-md-3 py-3">
                        <img src="images/upload/<?php echo $fetch['image']?>" alt="" class="img-fluid profile-img-admin">
                    </div>
                    <div class="col-md-3 py-3 center-1">
                        <a href="" class="btn btn-success">Academy Name:</a>
                    </div>
                    <div class="col-md-4 py-3 center-1">
                        <a href="" class="btn btn-light"><?php echo $fetch['academy'] ?></a>
                    </div>
                </div>
                <div class="row rounded mt-3">
                    <div class="col-md-3 offset-3">
                        <a href="#" class="btn btn-success">Academy Type:</a>
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="btn btn-light"><?php echo $fetch['sport'] ?></a>
                    </div>
                </div>
                <div class="row rounded mt-3">
                    <div class="col-md-3 offset-3">
                        <a href="#" class="btn btn-success">Academy Address:</a>
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="btn btn-light"><?php echo $fetch['address'] ?></a>
                    </div>
                </div>
                <div class="row rounded mt-3">
                    <div class="col-md-3 offset-3">
                        <a href="#" class="btn btn-success">Date joined:</a>
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="btn btn-light"><?php echo $fetch['date'] ?></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 py-3 mt-4">
                <h4>My Tournament</h4>
                <?php
                    $tour="SELECT * FROM tournament_details JOIN admin_credential ON admin_credential.academy=tournament_details.academy WHERE username='{$_SESSION["uname"]}'";
                    $t_result=mysqli_query($con,$tour);
                    while($t_fetch=mysqli_fetch_assoc($t_result)){
                ?>
                <div class="upcoming-nav">
                    <a href="" class="nav-link">Venue: <span><?php echo $t_fetch['venue'] ?></span></a>
                    <a href="" class="nav-link">Sport: <span><?php echo $t_fetch['sport'] ?></span></a>
                    <a href="" class="nav-link">Date: <span><?php echo $t_fetch['start_date'] ?> to <?php echo $t_fetch['end_date'] ?></span></a>
                    <a href="" class="nav-link">Organizer: <span><?php echo $t_fetch['academy'] ?></span></a>
                </div>
                <?php } ?>
            </div>
            <div class="col-md-12 mt-5 mb-0 center">
                <h6 class="mt-2">Have any Suggestion/Complaint ?</h6>&nbsp; &nbsp;
                <a href="complaint.php" class="badge badge-danger">Click here</a>
            </div>
        <?php }?>
    </div>
</div>
<?php include "footer.php"; ?>   