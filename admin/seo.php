<?php
     include"header.php";
     if(isset($_POST['submit'])){
      $name=mysqli_real_escape_string($con,$_POST['pg_name']);
      $artist=mysqli_real_escape_string($con,$_POST['title']);
      $description=mysqli_real_escape_string($con,$_POST['p_description']); 
      $links=date('Y-m-d');
     $sql1="INSERT INTO `title` (`title`, `description`, `page_name`, `date`) VALUES 
     ('$artist','$description','$name','$links')";
       $result=mysqli_query($con,$sql1);
  }
?>
<div class="container">
    <div class="row py-4">
        <div class="col-md-8 offset-1 py-4">
            <h2 style="font-weight:600;">SEO Management &#124; Title &#124; Description</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 add-track ml-4">
            <form action="" class="form px-5 ml-5 mb-5" method="post" enctype="multipart/form-data" autocomplete="off">
            <!-- Name-->
                <div class="row my-4 ">
                    <div class="col-md-2 text-right">
                        <label for="track" class="mt-2">Page Name</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="pg_name" id="track" class="form-control" placeholder="Page name">
                    </div>
                </div>
            <!--Artist-->
                <div class="row my-4 ">
                    <div class="col-md-2 text-right">
                        <label for="track" class="mt-2">Title</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="title" id="track" class="form-control" placeholder="Any Title">
                    </div>
                </div>
            <!-- Details-->
                <div class="row my-4 ">
                    <div class="col-md-2 text-right">
                        <label for="track" class="mt-2">Description</label>
                    </div>
                    <div class="col-md-8">
                        <textarea name="p_description" id="track" class="form-control" style="height:150px; text-align:left;">
                        </textarea>
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