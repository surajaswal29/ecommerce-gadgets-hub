<?php 
$post_id=$_GET['id']; //getting product id
include"header.php"; //include header file
include"subhead.php"; //include subhead file
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center product-details mb-2">
                <h1>Product Details</h1>
            </div>
        </div>
        <div class="row py-4">
            <div class="col-md-5 border p-4">
                <?php
                    $sql1="SELECT * FROM product WHERE p_id='$post_id'";
                    $result1=mysqli_query($con,$sql1);
                    $data1=mysqli_fetch_assoc($result1);
                ?>
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <img src="<?php echo$data1['image'];?>" alt="product">
                    </div>
                    <div class="item">
                        <img src="<?php echo$data1['image'];?>" alt="product">
                    </div>
                    <div class="item">
                        <img src="<?php echo$data1['image'];?>" alt="product">
                    </div>
                </div>
            </div>
            <div class="col-md-6 offset-sm-1 p-4 pd-details">
                <h2 style="font-weight:600"><?php echo$data1['Name'];?></h2>
                <h5>Price: ₹ <?php echo$data1['Price'];?> 
                </h5>
                <!-- <h5>Availability: In Stock</h5> -->
                <form action="" class="form" method="post">
                    <div class="row py-4">
                        <div class="col-sm-4 pt-3">
                            <h5>Color variant:</h5>
                        </div>
                        <div class="col-sm-5">
                           <select name="variant" id="" class="form-control" required>
                               <option value="select">Select variant</option>
                               <option value="select">moonlight black</option>
                               <option value="select">venus green</option>
                               <option value="select">White</option>
                               
                           </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pt-3">
                            <h5>Quantity: </h5>
                        </div>
                        <div class="col-md-4">
                            <input type="number" value="1" class="form-control" name="quantity" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-3 pt-3">
                            <h5 hidden>Name: </h5>
                        </div>
                        <div class="col-md-4">
                            <input type="text" value="<?php echo $data1['Name'];?>" class="form-control" name="p_name" hidden>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 py-3">
                             <button type="submit" class="btn btn-block btn-danger nav-link" name="submit">Add to Cart</button>
                        </div>
                        <div class="col-md-4 py-3">
                            <?php
                            if(isset($_SESSION['email_id'])){     
                            ?>
                            <a href="payment.php" class="btn btn-danger nav-link text-light text-decoration-none">Checkout</a>
                            <?php
                            }else{
                            echo '<a href="login.php" class="btn btn-danger nav-link text-light text-decoration-none">Login</a>';
                            }
                            ?>
                        </div>
                        <div class="col-md-4 py-3">
                            <a href="cart.php" class="btn btn-danger nav-link text-light text-decoration-none">Cart <i class="zmdi zmdi-shopping-cart text-light"></i></a>
                        </div>
                    </div>
                    <?php
                    if(isset($_POST['submit'])){
                        $variants=mysqli_real_escape_string($con,$_POST['variant']);
                        $quantity=mysqli_real_escape_string($con,$_POST['quantity']);
                        $p_name=mysqli_real_escape_string($con,$_POST['p_name']);
                        $date=date('Y-m-d');
                        if(isset($_SESSION['email_id'])){ 
                        $sql="INSERT INTO cart(email,p_name,variant,quantity,date) VALUES('{$_SESSION["email_id"]}','$p_name','$variants','$quantity','$date')";
                        }else{
                            echo"<div><b>Note:</b><i>To Add a Product to your Cart, Create Account to this site or just simply login to your existing Account</i></div>";
                        }
                        $result=mysqli_query($con,$sql);
                        if($result){
                           echo"<div class='text-success'>Item Added to Cart</div>";
                            } 
                    }
                    ?>
                </form>
            </div>
        </div>
        <div class="row py-4 mt-3">
            <div class="col-md-12 res-txtcnt">
                <h4>Product Description</h4>
            </div>
            <div class="col-md-12 res-txtcnt">
                <p><?php echo $data1['Description'];?></p>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row py-4 margin-3">
            <div class="col-md-12 text-center">
                <h1 style="font-weight:600">  More Products</h1>
            </div>
        </div>
        <div class="row mt-4 px-4 more-product">
            <?php
            $sql="SELECT * FROM product";
            $result=mysqli_query($con,$sql);
            if(mysqli_num_rows($result)>0){
                while($data=mysqli_fetch_assoc($result))
                {
            ?>
                <div class="card album-card">
                    <a href="product.php?id=<?php echo $data['p_id'];?>" title="<?php echo $data['Name'];?>">
                        <img src="<?php echo $data['image'];?>" alt="Cover" class="img-fluid">
                    </a>
                    <div class="card-body p-1 pt-3">
                        <h6 class="text-center"><?php echo $data['Name'];?></h6>
                    </div>
                    <div class="card-title p-1">
                        <h6 class="text-center">Price: <?php echo $data['Price'];?></h6>
                    </div>
                    <div class="card-footer">
                        <a href="product.php?id=<?php echo $data['p_id'];?>" class="btn-block btn-danger">Buy Now</a>
                        <a href="product.php?id=<?php echo $data['p_id'];?>" class="btn-block btn-danger">View</a>
                    </div>
                </div> 
            <?php
                }
            }
            ?>
        </div>
    </div>
</section>
<?php include"footer.php";?>
<script>
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
                items:1,
                margin:20,
                loop:true,
                autoplay:false,
                stagePadding:50
            });
    });
</script>