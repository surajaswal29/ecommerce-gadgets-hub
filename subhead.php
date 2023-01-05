<div class="bg-image-1 overlay">
    <div class="container-fluid">
             <div class="row">
                        <div class="col-md-2 p-3 log-1">
                            <img src="images/logo.png" alt="" class="img-fluid img-logo">
                        </div>
                        <div class="col-md-7 py-4 site-nav-2">
                            <div class="navbar-nav navbar-expand justify-content-end hide-nav">
                                <div class="tg-bt">
                                    <a href="index.php" class="nav-link text-dark"><i class="zmdi zmdi-home"></i> Home</a>
                                    <button class="btn" id="hide"><i class="zmdi zmdi-menu"></i></button>
                                </div>
                                <div class="wrap" id="show" >
                                    <a href="index.php#product" class="nav-link text-dark"><i class="zmdi zmdi-store"></i> Product</a>
                                    <!-- <a href="blog.php" class="nav-link text-dark"><i class="zmdi zmdi-library"></i> Blog</a> -->
                                    <!-- <a href="gallery.php" class="nav-link text-dark hd"><i class="zmdi zmdi-view-compact"></i> Gallery</a> -->
                                    <a href="aboutus.php" class="nav-link text-dark hd"><i class="zmdi zmdi-account"></i> About us</a>
                                    <a href="index.php#contact" class="nav-link text-dark hd"><i class="zmdi zmdi-phone-msg"></i> Contact us</a>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 py-4">
                            <div class="row">
                                <div class="col-md-12 p-1 btn profile-icon">
                                <a href="cart.php" class="btn btn-light shadow ml-3" title="My Cart">
                                        <i class="zmdi zmdi-shopping-cart p-2" style="font-size:20px;">
                                            <?php
                                                $cart_sql="SELECT * FROM cart WHERE email='{$_SESSION['email_id']}'";
                                                $cart_select=mysqli_query($con,$cart_sql) ;
                                                $Count_cart=mysqli_num_rows($cart_select);
                                            ?>
                                            <sup class="text-danger font-weight-bold"><?php echo$Count_cart; ?></sup> 
                                        </i>
                                </a>
                                    <?php 
                                        if(isset($_SESSION['uname'])){
                                            echo' <a href="#" class="nav-link text-dark pt-3 font-weight-bold" title="My Profile" id="toggle-profile">Hello, '.$_SESSION['uname'].'&nbsp; <i class="zmdi zmdi-chevron-down"></i></a>';
                                        }else{  
                                            echo '<a href="login.php" class="nav-link text-dark pt-3 font-weight-bold" title="My Profile">'.'Hello, Sign in'.'&nbsp; <i class="zmdi zmdi-chevron-down"></i> </a>';
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
</div>