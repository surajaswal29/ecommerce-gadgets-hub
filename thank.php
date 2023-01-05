<?php include "header.php"; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-video">
                <!-- <video playsinline autoplay muted>
                    <source src="order.webm" type="video/webm"> -->
                    <!-- <source src="clip/order.mp4" type="video/mp4"> -->
                    <!-- <p>not supported</p>
                </video> -->
                Your Order Has been Confirmed.
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <a href="index.php" class="btn btn-primary">Homepage</a> </br></br>
                <span class="text-success">Check your Email Inbox for more details.</span>
            </div>
        </div>
        <?php
        //   echo $cart_empty="DELETE FROM `cart` WHERE `cart`.`email` = '{$_SESSION["email_id"]}'";
        //   $cart_result=mysqli_query($con,$cart_empty);
        ?>
    </div>
</body>
</html>