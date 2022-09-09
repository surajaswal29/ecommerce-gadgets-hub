<?php include "header.php"; ?>
<?php include "nav-bar.php"; ?>

    <div class="container-fluid">
        <div class="row">
                <div class="container-fluid main-wrapper">
                    <div class="row">
                        <div class="heading col-md-8">
                            <h1>Welcome To,</h1>
                            <h1>Atal Utkrisht</h1>
                            <h2>Late Mahimanand Nautiyal G.I.C</h2>
                            <p>Jibya, Kotdhar, Uttarkashi, Uttarakhand</p>
                        </div>
                    </div>
                </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-10 offset-md-1 py-4 heading-9">
                <h1>Staff Information | Regular Staff</h1>
            </div>
            <div class="col-md-10 offset-md-1" id="staff">
                <table class="table table-bordered table-responsive-sm">
                    <tr class="bg-dark text-light text-center">
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Mobile Number</th>
                    </tr>
                    <?php
                     $staff_regular="SELECT * FROM staff_info WHERE type='regular' ORDER BY `staff_info`.`id` ASC";
                     $output=mysqli_query($con,$staff_regular);
                        $count=mysqli_num_rows($output);
                     if($count>0){
                         while($data=mysqli_fetch_assoc($output)){
                    ?>
                            <tr class="text-center">
                                <td><?php echo $data["id"]?></td>
                                <td><?php echo $data["name"] ?></td>
                                <td><?php echo $data["designation"] ?></td>
                                <td><?php echo $data["phone"]?></td>
                            </tr>
                    <?php
                         }
                     }
                    ?>
                   
                </table>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-10 offset-md-1 py-4 heading-9">
                <h1>Staff Information | Part Time Staff</h1>
            </div>
            <div class="col-md-10 offset-md-1">
                <table class="table table-bordered table-responsive-sm">
                    <tr class="bg-dark text-light text-center">
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Mobile Number</th>
                    </tr>
                    <?php
                     $staff_pt="SELECT * FROM staff_info WHERE type='Part Time' ORDER BY `staff_info`.`id` ASC";
                     $output1=mysqli_query($con,$staff_pt);
                     if(mysqli_num_rows($output1)>0){
                         while($data1=mysqli_fetch_assoc($output1)){
                            echo'
                            <tr class="text-center">
                                <td>'.$data1["id"].'</td>
                                <td>'.$data1["name"].'</td>
                                <td>'.$data1["designation"].'</td>
                                <td>'.$data1["phone"].'</td>
                            </tr>
                            ';
                         }
                     }
                    ?>
                   
                </table>
            </div>
        </div>
    </div>
<?php include "footer.php"; ?>