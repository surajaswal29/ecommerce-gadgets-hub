<?php 
include "header-file.php";
include "security.php";
?>

<div class="container-fluid">
    <?php include "header.php"; ?>
    <div class="row border-top">
        <div class="col-md-12">
            <div class="gallery-wrap">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                        <input type="file" name="image" id="image" class="form-img"></br></br>
                        <input type="submit" value="Upload" name="image-sub" class="btn btn-outline-danger">

                        <?php
                            if(isset($_POST['image-sub'])){

                                $date=date('y-m-d');
                                $image_name=$_FILES['image']['name'];
                                $image_temp=$_FILES['image']['tmp_name'];

                                $path="images/upload/".$image_name;

                                if(move_uploaded_file($image_temp,$path)){
                                    $query="INSERT INTO gallery(images,date) VALUES('$image_name','$date')";
                                    $output=mysqli_query($con,$query);
                                    if($output){
                                        $fetch="SELECT * FROM gallery WHERE images='{$image_name}'";
                                        $result=mysqli_query($con,$fetch);
                                        if(mysqli_num_rows($result)){
                                            while($row=mysqli_fetch_assoc($result)){
                                                echo"
                                                <h1>Preview</h1>
                                                <div style='height:auto; width:200px;border:1px solid #000;' class='mb-5'>
                                                    <img src='images/upload/".$row['images']."' class='img-fluid'>
                                                </div>
                                                ";
                                            }
                                        }
                                    }
                                }else{
                                    echo"Failed";
                                }
                            }
                            ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?>