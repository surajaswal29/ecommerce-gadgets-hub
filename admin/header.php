<?php include"file.php";?>
<?php 
include "config.php";
// include"function.inc.php";
?>
<?php
 if(!isset($_SESSION['uname'])){
     redirect('index.php');
 }
//  echo $_SERVER['PHP_SELF'];
?>
<body>
    <div class="container-fluid">
        <div class="row py-4 bg-heading">
            <div class="col-md-12 pl-4 text-center">
                <h1 style="font-size:40px; font-weight:600;"> <img src="../images/logo.png" alt="Logo" style="width:80px; height:80px"> Gadgets Hub</h1>
                <!-- <span><a href="{$link}/index.php" target="_blank">Go to Website</a></span> -->
            </div>
        </div>
        <div class="row bg-dark">
            <div class="col-md-8 head-nav">
                <div class="nav">
                    <a href="product.php" class="nav-link bg-primary"><i class="zmdi zmdi-home"></i> Home</a>
                    <a href="order.php" class="nav-link "><i class="zmdi zmdi-albm"></i> Orders</a>
                    <a href="add-product.php" class="nav-link "><i class="zmdi zmdi-imag"></i> Add Product</a>
                    <a href="add-user.php" class="nav-link"><i class="zmdi zmdi-accoun"></i> Add Users</a>
                    <a href="customer-query.php" class="nav-link"><i class="zmdi zmdi-colection-music"></i> Costumers Queries
                    <sup class="text-danger font-weight-bold">(<?php $test=mysqli_query($con,"SELECT *FROM contact"); $num=mysqli_num_rows($test); echo $num; ?>)</sup>
                    </a>
                    <!-- <a href="image.php" class="nav-link "><i class="zmdi zmdi-albm"></i> Image</a> -->
                    <!-- <a href="users.php" class="nav-link"><i class="zmdi zmdi-box"></i> Production</a> -->
                    <a href="seo.php" class="nav-link"><i class="zmdi zmdi-box"></i> SEO Management </a>
                </div>
            </div>
            <div class="logout-btn col-md-4">
                    <a href="#" class="btn btn-primary mr-4"><i class="zmdi zmdi-account"></i> Hello, <?php echo $_SESSION['username'];?></a>
                    <a href="logout.php" class="btn btn-danger"><i class="zmdi zmdi-alert"></i> Log out</a>
            </div>
        </div>
    </div>