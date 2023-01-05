<?php 
include "header.php";
?>
<div class="container-fluid">
    <div class="row p-2 bg-secondary">
         <div class="col-md-2 p-2 log-1">
                <a href="index.php">
                    <img src="https://ik.imagekit.io/sweetgrapes2912/logo_4rN7x68fl.png" alt="" class="img-fluid img-logo">
                </a>
         </div>
         <div class="col-md-8 mt-4 font-weight-bold mobile-heading">
                <h1 class="mobile-heading text-light">Maa Bhubneshwari Enterprises</h1>
        </div>
         <div class="col-md-2 py-4">
                        <div class="row">
                            <div class="col-md-12 p-0 btn profile-icon" id="toggle-profile">
                                <a href="#" class="nav-link text-light py-3">
                                    <?php 
                                        if(isset($_SESSION['uname'])){
                                            echo'Hello, '.$_SESSION['uname'].'&nbsp; <i class="zmdi zmdi-chevron-down text-light"></i>';
                                        }else{  
                                            echo '<a href="login.php" class="nav-link text-dark py-3">'.'Hello, Sign in'.'&nbsp; <i class="zmdi zmdi-chevron-down"></i> </a>';
                                        }
                                    ?>
                                    <div class="profile-drop" id="profile-drop" style="display:none">
                                        <a href="profile.php" class="nav-link my-1">Your Profile</a>
                                        <a href="my_order.php" class="nav-link my-1">Your Orders</a>
                                        <a href="logout.php" class="nav-link bg-danger text-light my-1">Log Out</a>
                                    </div>
                                </a>
                                <a href="#" class="nav-link p-1" id="toggle-profile"><img src="https://ik.imagekit.io/sweetgrapes2912/role_Y7ngrDI5A.png" alt="" class="img-fluid p-0"></a>
                            </div>
                        </div>
         </div>
         <script>
         $(document).ready(function(){
                        $('#hide').click(function(){
                            $('#show').slideToggle('slow');
                        });
                        $('#toggle-profile').click(function(){
                            $('#profile-drop').slideToggle('slow');
                        });
         });
         </script>
    </div>
    <div class="row flex-center mt-5">
        <?php
            if(isset($_POST['submit'])){
                $_SESSION['firstname']=mysqli_real_escape_string($con, $_POST['fname']);
                $_SESSION['lastname']=mysqli_real_escape_string($con, $_POST['lname']);
                $fname=$_SESSION['firstname'];
                $lname=$_SESSION['lastname'];
                $email=mysqli_real_escape_string($con, $_POST['email_id']);
                $phone=$_POST['Phone_no'];
                $address=mysqli_real_escape_string($con, $_POST['bill_add']);
                $state=mysqli_real_escape_string($con, $_POST['state']);
                $pin_code=mysqli_real_escape_string($con, $_POST['pin_code']);
                $payment_mode=mysqli_real_escape_string($con, $_POST['payment_mode']);
                $remark=mysqli_real_escape_string($con, $_POST['remark']);
                $date=date('y-m-d');
                $_POST['payment_mode'];
                $query="INSERT INTO `order_details` (`fname`,`lname`, `email`, `phone`, `Address`, `state`, `pin_code`, `Payment_option`, `remarks`,date) 
                VALUES ('$fname' , '$lname', '$email', '$phone', '$address', '$state', '$pin_code', '$payment_mode', '$remark','$date')";
                $output=mysqli_query($con,$query);
                if($output){
                        // echo"<div class='text-success'>Order Placed Successfully</div>";
                        if($_POST['payment_mode']=='Online')
                        {
                            include "prepaid.php";
                        }
                    //    email sending script
                       include "sendmail.php";
                    //    email sending script end
                       redirect('thank.php');
                    }
            }
        ?>
         <!-- breadcrumbs -->
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="product.php">Product</a></li>
                    <li class="breadcrumb-item"><a href="cart.php">Cart</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Payment</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 border p-4 border-dark rounded flex-center mobile-payment">
            <form action=" " method="post" class="checkout px-4">
                <div class="row mt-3">
                    <div class="col-md-12 p-4 font-weight-bolder text-left border">
                        <h1>Order Details</h1>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6 text-left">
                        <label for="full_name" class="col-form-label ">First Name</label>
                        <input type="text" class="form-control" name="fname" id="" required>
                    </div>
                    <div class="col-6 text-left">
                        <label for="full_name" class="col-form-label">Last Name</label>
                        <input type="text" class="form-control" name="lname" id="" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6 text-left">
                        <label for="full_name" class="col-form-label">Email</label>
                        <input type="text" class="form-control" name="email_id" id="" value="<?php echo $_SESSION['email_id']; ?>" readonly>
                    </div>
                    <div class="col-6 text-left">
                        <label for="full_name" class="col-form-label">Phone</label>
                        <input type="text" class="form-control" name="Phone_no" id="" value="<?php echo $_SESSION['mob_no']; ?>" readonly>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 text-left">
                        <label for="full_name" class="col-form-label">Billing Address</label>
                        <input type="text" class="form-control" name="bill_add" id="" placeholder="Enter Billing Address" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6 text-left">
                        <label for="full_name" class="col-form-label">State</label>
                        <input type="text" class="form-control" name="state" id="" placeholder="Enter State" required>
                    </div>
                    <div class="col-6 text-left">
                        <label for="full_name" class="col-form-label">Pin Code</label>
                        <input type="number" class="form-control" name="pin_code" id="" placeholder="Enter Pin Code" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 text-left">
                        <label for="full_name" class="col-form-label">Payment Option</label>
                    </div>
                    <div class="col-12 text-left border p-3 bg-light rounded">
                        <!-- <input type="radio" name="payment_mode" id="online" value="Online"> -->
                        <!-- <label for="online">Online (Debit Card, UPI, Credit Card)</label></br> -->
                        <input type="radio" name="payment_mode" id="cod" value="COD">
                        <label for="COD">COD (Cash On Delievery)</label>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 text-left">
                        <label for="full_name" class="col-form-label">Remarks(Optional)</label>
                        <input type="text" class="form-control" name="remark" id="" value="Optional">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-6 text-left mobile-payment-button">
                        <button type="submit" class="btn btn-primary btn-block" name="submit"> Place Order</button>
                    </div>
                    <!-- <div class="col-sm-6 text-left">
                        <a href="bill.php?o_id=
                        <?php //$o=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM order_details ORDER BY order_id DESC")); echo$o['order_id'] ?>" target="_blank" class="btn btn-success btn-block">Invoice</a>
                    </div> -->
                </div>
                
            </form>
        </div>
     </div>
</div>
<div class="container-fluid bg-dark mt-5">
    <div class="row text-center">
        <div class="col-md-12 bg-secondary">
            <div class="nav flex-center font-weight-medium">
                <a href="aboutus.php" class="nav-link">About Us</a>
                <a href="index.php#contact" class="nav-link">Contact Us</a>
                <a href="" class="nav-link">Terms of Service</a>
                <a href="" class="nav-link">DMCA <a href="//www.dmca.com/Protection/Status.aspx?ID=a944ecd1-293b-493c-bdba-14062c582399" title="DMCA.com Protection Status" class="dmca-badge"> <img src ="https://images.dmca.com/Badges/dmca-badge-w100-5x1-11.png?ID=a944ecd1-293b-493c-bdba-14062c582399"  alt="DMCA.com Protection Status" /></a>  <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script></a>
            </div>
        </div>
        <div class="col-md-12 py-3">
            <span class="text-light text-center mobile-footer">&copy; Maa Bhubhneshwari Enterprises 2021</span>
        </div>
    </div>
</div>