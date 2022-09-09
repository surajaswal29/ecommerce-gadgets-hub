<?php 
include "header-file.php";
include "security.php";
?>
<?php
    $edit_id=$_GET['id'];
    $sql_edit="SELECT * FROM staff_info WHERE id='$edit_id'";
    $res=mysqli_query($con,$sql_edit);
    $row=mysqli_fetch_assoc($res);
?>
<div class="container-fluid">
    <?php include "header.php"; ?>
    <div class="row p-4">
        <div class="col-md-10 center">
                <div class="add-form">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        <!-- username -->
                        <div class="row">
                            <div class="col-md-4 label">
                                <label for="name" class="col-form-label">Name:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['name'] ?>">
                            </div>
                        </div>
                        <!-- academy -->
                        <div class="row mt-3">
                            <div class="col-md-4 label">
                                <label for="academy" class="col-form-label">Designation:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="desg" id="desg" class="form-control" value="<?php echo $row['designation'] ?>">
                            </div>
                        </div>
                        <!-- mobile no. -->
                        <div class="row mt-3">
                            <div class="col-md-4 label">
                                <label for="username">Mobile Number :</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $row['phone'] ?>">
                            </div>
                        </div>
                        <!-- type -->
                        <div class="row mt-3">
                            <div class="col-md-4 label">
                                <label for="username">Staff Type :</label>
                            </div>
                            <div class="col-md-8">
                                <select name="type" id="type" class="form-control">
                                    <option value="<?php echo $row['type'] ?>"><?php echo $row['type'] ?></option>
                                    <option value="Regular">Regular</option>
                                    <option value="Part Time">Part Time</option>
                                </select>
                            </div>
                        </div>
                        <!-- email -->
                        <div class="row mt-3">
                            <div class="col-md-3 offset-4">
                                <input type="submit" name="sub" value="Add staff" class="btn btn-block btn-danger">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                            <?php
                                if(isset($_POST['sub'])){

                                    $date=date('y-m-d');
                                    $name=$_POST["name"];
                                    $desg=$_POST["desg"];
                                    $phone=mysqli_real_escape_string($con,$_POST["phone"]);
                                    $type=$_POST["type"];

                                            $query="UPDATE `staff_info` SET `name` = '$name', `designation` = '$desg', `phone` = '$phone', `type` = '$type' WHERE `staff_info`.`id` = '$edit_id'";
                                            $output=mysqli_query($con,$query) or die("Query Failed!");
                                            if($output){
                                               echo"<script>alert('Staff Updated Successfully')</script>";
                                            }
                                            mysqli_close($con);
                                }
                            ?>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>

<?php include "footer.php" ?>
