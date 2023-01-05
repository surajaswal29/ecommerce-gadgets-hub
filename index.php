<?php include "header.php";?>
<div class="bg-image overlay">
       <div class="container-fluid ">
            <div class="row px-2">
                    <div class="col-sm-2 p-3 log-1">
                        <a href="index.php">
                            <img src="images/logo.png" alt="" class="img-fluid img-logo">
                        </a>
                    </div>
                    <div class="col-sm-7 py-4 site-nav-2 absolute-center">
                        <div class="navbar-nav navbar-expand justify-content-end hide-nav">
                                <div class="tg-bt">
                                    <a href="index.php" class="nav-link text-dark"><i class="zmdi zmdi-home"></i> Home</a>
                                    <button class="btn" id="hide"><i class="zmdi zmdi-menu"></i></button>
                                </div>
                                <div class="wrap" id="show" >
                                    <a href="#product" class="nav-link text-dark"><i class="zmdi zmdi-store"></i> Products</a>
                                    <!-- <a href="blog.php" class="nav-link text-dark"><i class="zmdi zmdi-library"></i> Blog</a> -->
                                    <a href="aboutus.php" class="nav-link text-dark hd"><i class="zmdi zmdi-account"></i> About us</a>
                                    <!-- <a href="gallery.php" class="nav-link text-dark hd"><i class="zmdi zmdi-view-compact"></i> Gallery</a> -->
                                    <a href="#contact" class="nav-link text-dark hd"><i class="zmdi zmdi-phone-msg"></i> Contact us</a>

                                </div>
                        </div>
                    </div>
                    <div class="col-sm-3 py-4 absolute-center">
                        <div class="row">
                            <div class="col-12 p-1 btn profile-icon">
                                <a href="cart.php" class="btn btn-light shadow ml-3" title="My Cart">
                                        <i class="zmdi zmdi-shopping-cart p-2" style="font-size:20px;">
                                        <?php
                                        //    if(!isset($_SESSION['email_id'])){
                                        //         $_SESSION['email_id']=0;
                                        //    }
                                            $cart_sql="SELECT * FROM cart WHERE email='{$_SESSION['email_id']}'";
                                            $cart_select=mysqli_query($con,$cart_sql) ;
                                            $Count_cart=mysqli_num_rows($cart_select);
                                        ?>
                                            <sup class="text-danger font-weight-bold"><?php echo$Count_cart; ?></sup> 
                                        </i>
                                </a>
                                    <?php 
                                        if(isset($_SESSION['uname'])){
                                            echo'<a href="#" class="nav-link text-dark pt-3" title="My Profile" id="toggle-profile">Hello, '.$_SESSION['uname'].'&nbsp; <i class="zmdi zmdi-chevron-down"></i></a>';
                                        }else{  
                                            echo '<a href="login.php" class="nav-link text-dark pt-3" title="My Profile">'.'Hello, Sign in'.'&nbsp; <i class="zmdi zmdi-chevron-down"></i> </a>';
                                        }
                                    ?>
                                    <div class="profile-drop" id="profile-drop" style="display:none">
                                        <a href="profile.php" class="nav-link my-1">My Profile</a>
                                        <a href="my_order.php" class="nav-link my-1">My Orders</a>
                                        <a href="logout.php" class="nav-link bg-danger text-light my-1">Log Out</a>
                                    </div>
                                <a href="#" class="nav-link p-1" id="toggle-profile" title="My Profile">
                                        <img src="https://ik.imagekit.io/sweetgrapes2912/role_Y7ngrDI5A.png" alt="" class="img-fluid p-0">
                                </a>
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
        </div>
        <div class="container-fluid">
            <div class="row px-5 mobile-padding">
                <div class="col-md-6 quote py-3 margin-3">
                    <h2 class="head-font1">Gadget Hub</h2>
                    <h2>A Whole New World of Gadgets</h2> 
                    <!-- <a href="send-email.php">send</a> -->
                    <h5>100% Original and Genuine Gadgets</h6>
                    <button class="btn btn-danger rounded-pill mt-3 w-auto font-weight-bold"><a href="product.php?id=1" class="text-light nav-link p-1">Order Now</a></button>
                </div>           
            </div>      
        </div>
</div>
</header>
<section>
    <div class="container-fluid intro">
        <div class="row py-5 margin-3">
            <div class="col-md-4 ml-5 intro1 mt-3">
                <img class="img-fluid shadow" src="images/gadget-vector.jpg" alt="london">
            </div>
            <div class="col-md-6 px-3 para1">
                <h3 class="px-2">Things to Consider When Buying an Ideal Tech Gadgets</h3>
                <ul style="list-style: circle; list-style-type: disc;">
                    <li>Splurge On Tech Gadgets You’ll Use the Most</li>
                    <li>Think About Compatibility</li>
                    <li>Think About Security</li>
                    <li>Consider the Overall Experience You’ll Get</li>
                    <li>Talking About How It Feels</li>
                    <li>Don’t Be the Early Adopter</li>
                    <li>Don’t Settle for Cheap Gadgets</li>
                    <li>Compare, Compare, Compare</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid" id="product">
         <!-- Our Products -->
        <div class="row margin-3 border-bottom">
            <div class="col-12 py-3"> 
                <h1 class="text-center font-weight-bolder">Trendy Gadgets</h1>
            </div>
        </div>
        <div class="row p-4">
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
                    <div class="card-body p-3">
                        <h6><?php echo $data['Name'];?></h6>
                    </div>
                    <div class="card-title">
                        <h6 class="text-center">Price: ₹ <?php echo $data['Price'];?></h6>
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
        <!-- Contact form -->
        <div class="container-fluid bg-light" id="contact">
            <div class="row margin-1">
                <div class="col-md-12 mt-3 mb-4 hyper">
                        <div class="nav nav-fill mt-5">
                            <a href="$" class="nav-item text-decoration-none text-danger font-weight-bold"><i class="zmdi zmdi-pin-drop zmdi-hc-2x"></i> Dehradun, India</a>
                            <a href="$" class="nav-item text-decoration-none text-danger font-weight-bold"><i class="zmdi zmdi-whatsapp zmdi-hc-2x"></i>+91 7535868150</a>
                            <a href="$" class="nav-item text-decoration-none text-danger font-weight-bold"><i class="zmdi zmdi-email zmdi-hc-2x"></i>surajaswal.dev@gmail.com</a>
                        </div>
                </div>
                <div class="col-md-12 mt-4">
                        <h1 class="text-center mt-5 font-weight-bold">Want to Contact Us?</h1>
                </div>
                <div class="col-md-12 mb-5">
                    <div class="container px-5 mobile-contact">
                        <?php
                        if(isset($_POST['c_submit'])){
                            $name=mysqli_real_escape_string($con, $_POST['c_name']);
                            $email=mysqli_real_escape_string($con, $_POST['c_email']);
                            $subject=mysqli_real_escape_string($con, $_POST['c_subject']);
                            $message=mysqli_real_escape_string($con, $_POST['c_message']);
                            $date=date('y-m-d');
                            $query="INSERT INTO contact(c_name,c_email,c_subject,c_message,date) VALUES('$name','$email','$subject','$message','$date')";
                            $output=mysqli_query($con,$query);
                            if($output){
                                header("Localhost:{$link}/index.php/#contact");
                                echo'<div class="text-success text-center p-3">Your Message Has Been Sent To Maa Bhubhneshwari Enterprises</div>';
                            }
                        }

                        ?>
                        <form action="" method="POST" class="form mx-5 mt-5">
                           <div class="row">
                            <div class="col-md-12">
                                    <label for="firstname">Name *</label>
                                    <input type="text" name="c_name" id="fname" class="form-control rounded" placeholder="Enter Firstname" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="email">Email *</label>
                                    <input type="text" name="c_email" id="email" class="form-control rounded" placeholder="Enter Email" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="email">Subject</label>
                                    <input type="text" name="c_subject" id="Subject" class="form-control rounded" placeholder="Enter Subject" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="textarea">Message</label>
                                    <textarea name="c_message" class="form-control textarea" required>Write a Message ...</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mt-2">
                                    <button type="submit" name="c_submit" class="btn btn-block rounded btn-primary" style="font-weight:600;">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>     <!-- contact form end -->
        </div>
</section>
<?php include "footer.php"; ?>