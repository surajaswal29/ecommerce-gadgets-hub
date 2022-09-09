<?php include "header.php"; ?>
<?php include "nav-bar.php"; ?>

<div class="container-fluid second_wrap">
   <div class="row ">
       <div class="col-md-12 heading">
            <h4>Atal Utkrisht </br>Late Mahimanand Nautiyal G.I.C</h4>
            <p>Jibya, Kotdhar, Uttarkashi, Uttarakhand</p>
       </div>
   </div>
</div>
<section>
    <div class="container">
        <div class="row mt-5 contact-us ">
            <div class="col-md-4 text-center border m-2 p-3 ml-1">
                <h5><i class="zmdi zmdi-home"></i> Address</h5>
                <hr>
                <p>Attal Utkrisht Late Mahimanand Nautiyal G.I.C Jibya Kotdhar, Uttarkashi, Uttarakhand</p>
            </div>
            <div class="col-md-3 text-center border mx-5 my-2 p-3">
                <h5><i class="zmdi zmdi-phone"></i> Phone</h5>
                <hr>
                <p>+91-8979495244</p>
            </div>
            <div class="col-md-3 text-center border m-2 p-3">
                 <h5><i class="zmdi zmdi-email"></i> Email</h5>
                 <hr>
                <p>info@augicjibyakotdhar.com</p>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12 sub-section shadow-sm mb-5">
                    <div class="sub-wrap shadow" id="subscribe">
                        <h5>Contact Us</h5>
                        <!-- <h6>if you face any problem then contact us.</h6> -->
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="text" name="name" id="" class="input-box" placeholder="Your Name"/> </br>
                            <input type="text" name="email" id="" class="input-box" placeholder="Your email"/> </br>
                            <input type="text" name="purpose" id="" class="input-box" placeholder="Purpose"/> </br>
                            <textarea name="c_msg" id="textarea" class="input-box">Write your message...</textarea></br>
                            <button type="submit" class="sub-button" name="contact_sub">Submit</button>
                        </form>
                        <?php 
                            if(isset($_POST['contact_sub'])){
                                $c_name=$_POST['name'];
                                $c_email=$_POST['email'];
                                $c_purpose=$_POST['purpose'];
                                $c_msg=$_POST['c_msg'];
                                $c_date=date('y-m-d');

                                $messg="INSERT INTO `contact` (`name`, `email`, `purpose`, `message`, `date`) VALUES ( '$c_name', '$c_email','$c_purpose', '$c_msg', '$c_date')";
                                $c_query=mysqli_query($con,$messg);
                                if($c_query){
                                    echo"<script>alert('Message Send')</script>";
                                    include "sendmail.php";
                                }
                            }
                        ?>
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>Note: After Submitting the Contact us form please check your email Inbox.</p>
            </div>
        </div>
    </div>
<?php include "footer.php" ?>