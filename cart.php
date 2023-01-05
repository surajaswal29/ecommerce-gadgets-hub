<?php include"header.php";?>
<?php include"subhead.php";?>
</div>
<div class="container-fluid margin-3">
    <div class="row m-4 px-4 cart-pad-mar mobile-cart">
        <div class="col-sm-8 border" id="shp-cart">
            <div class="row border-bottom">
                <div class="col-md-12 p-4">
                    <h2 style="font-weight:500;"><i class="zmdi zmdi-shopping-cart text-danger"></i> Shopping Cart</h2>
                </div>
            </div>
            <?php
              $sql2="SELECT * FROM cart LEFT JOIN product ON cart.p_name = product.Name WHERE email='{$_SESSION['email_id']}'";
              $result2=mysqli_query($con,$sql2);
              $items=mysqli_num_rows($result2);
              $sum=0;
              if($items>0){
                  while($data2=mysqli_fetch_assoc($result2)){
                      $price=$data2['Price'];
                      $sum+=($price)*$data2['quantity'];
                      $_SESSION['tot_price']=$sum;
            ?>
             <div class="row p-4 border-bottom">
                <div class="col-md-3 border rounded">
                    <img src="https://m.media-amazon.com/images/W/WEBP_402378-T1/images/I/71guAvSMbSL._SY450_.jpg" alt="Bag" class="img-fluid" style="height:150px; width:150px">
                </div>
                <div class="col-md-6 offset-md-1 mobile-cart-product">
                    <h3><?php echo$data2['p_name'];?></h3>
                    <h6>Net Weight: <?php echo$data2['variant'];?></h6>
                    <h6>Price: ₹
                    <?php
                    if($data2['quantity']==1){
                        echo $price.'.00';
                    }else{
                        echo $price1=($data2['quantity'])*$price.'.00';
                    }
                    ?>     
                    </h6>
                        <h5>Quantity: <?php echo$data2['quantity'];?></h5>
                        <a href="delete-item.php?d_id=<?php echo$data2['id'];?>" class="badge badge-danger p-2"><i class="zmdi zmdi-delete text-light"></i> Remove</a>
                </div>
            </div>
            <?php
                  }
              }else{
                  echo"<div class='text-danger empty-cart'>Empty Cart</div>";
              }
            ?>
            <div class="row">
                <div class="col-md-12 p-3 text-right sub-mobile-total">
                    <h4>Subtotal(<?php echo $items; ?> items): ₹ <?php echo$sum ?>.00</h4>
                </div>
            </div>
        </div>
        <div class="col-sm-3 border ml-5 mobile-cart-pad">
            <div class="row p-4">
                <div class="col-md-11 border p-3">
                    <h5 class="border-bottom py-3">Subtotal (<?php echo $items; ?> items):</h5>
                    <span class="py-3 d-inline-block" style="font-size:24px; font-weight:500;">₹ <?php echo$sum ?>.00</span>
                    <a
                    <?php 
                    if(isset($_SESSION['email_id'])){
                        echo'href="payment.php"' ;
                    }else{
                        echo'href="login.php"' ;
                    }
                    ?>
                    class="btn-block btn-danger p-2 rounded text-decoration-none font-weight-bold">Proceed to Buy</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include"footer.php"; ?>