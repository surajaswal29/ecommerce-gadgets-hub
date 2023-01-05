<?php include"header.php"; ?>
<?php
   if(isset($_POST['submit'])){
       $name=mysqli_real_escape_string($con,$_POST['t_name']);
       $artist=mysqli_real_escape_string($con,$_POST['t_artist']);
       $description=mysqli_real_escape_string($con,$_POST['t_description']); 
       $links=$_POST['t_link'];
       $filename = $_POST['image']; 
    //    $tempname = $_FILES["tr-image"]["tmp_name"];   
    //      $folder = "upload/".$filename; 
      $sql1="INSERT INTO product(Name,Description,Price,weight,image) 
      VALUES('$name','$description','$artist','$links','$filename')";
        $result=mysqli_query($con,$sql1);
        // $move=move_uploaded_file($tempname,$folder);
        // if($move){
        //     echo"<div class='text-center text-success py-4'>Data Uploaded Successfuly!</div>";
        // }
        $sql="SELECT * FROM product  WHERE image='$filename' LIMIT 1";
        $result1=mysqli_query($con,$sql);
        if(!$result1){
            echo"Upload image";
        }
   }
?>
<div class="container">
    <div class="row py-4">
        <div class="col-md-8 offset-1 py-4">
            <h2 style="font-weight:600;">Edit Product</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 add-track ml-4">
            <form action="" class="form px-5 ml-5 mb-5" method="post" enctype="multipart/form-data" autocomplete="off">
            <!-- Name-->
                <div class="row my-4 ">
                    <div class="col-md-2 text-right">
                        <label for="track" class="mt-2">Product Name</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="t_name" id="track" class="form-control" placeholder="Product name">
                    </div>
                </div>
            <!--Artist-->
                <div class="row my-4 ">
                    <div class="col-md-2 text-right">
                        <label for="track" class="mt-2">Price</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="t_artist" id="track" class="form-control" value="₹">
                    </div>
                </div>
            <!-- Details-->
                <div class="row my-4 ">
                    <div class="col-md-2 text-right">
                        <label for="track" class="mt-2">Description</label>
                    </div>
                    <div class="col-md-8">
                        <textarea name="t_description" id="track" class="form-control" style="height:150px; text-align:left;">
                        </textarea>
                    </div>
                </div>
            <!--links-->
                <div class="row my-4">
                    <div class="col-md-2 text-right">
                        <label for="type" class="mt-2">Weight</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="t_link" id="track" class="form-control" placeholder="Weight">
                    </div>
                </div>
            <!--images-->
                <div class="row my-4 ">
                    <div class="col-md-2 text-right label-image">
                        <label for="track" class="mt-2">Image</label>
                    </div>
                    <div class="col-md-5 form-inline input-file ">
                        <input type="text" id="file-track" name="image" class="form-control">
                    </div>
                </div>
                <div class="row my-4 ">
                    <div class="col-md-2 text-right label-image">
                        <label for="track" class="mt-2">Preview</label>
                    </div>
                    <div class="col-md-4">
         <?php
            if(mysqli_num_rows($result1)>0){
                  while($data=mysqli_fetch_assoc($result1)){
        ?>
                <img src="<?php echo $data['image']?>" alt="upload image" id="img" class="img-fluid p-2 border">      
          <?php
            }
        }else{
            echo"Upload Image";
        }
        ?>
                    </div>
                </div>
                <div class="row mt-3 mb-5">
                    <div class="offset-2 col-md-3">
                        <input type="submit" name="submit" id="submit" value="Upload" class="btn btn-block btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include"footer.php";?>