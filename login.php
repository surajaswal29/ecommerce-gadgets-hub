 <?php include "header.php"; ?>
              <div class="container-fluid bg-light" style="height:100vh">
                    <div class="row bg-light">
                        <div class="col-md-12 p-2 font-weight-bold text-center">
                                <img src="images/logo.png" alt="Logo" class="img-fluid img-logo"/>
                        </div>
                    </div>
                    <div class="row flex-center mt-5 mb-5">
                        <div class="col-md-6 mobile-form bg-white shadow">
                             <form action="<?php $_SERVER['PHP_SELF']; ?>" autocomplete="on" class="p-4" method="POST">
                                 <div class="row p-3">
                                     <div class="col-md-12 text-center">
                                         <h1 class="text-dark">Login to your account</h1>
                                     </div>
                                 </div>
                                 <div class="row my-4 mt-4">
                                     <div class="col-md-3">
                                         <label for="email" class="col-form-label">Email</label>
                                     </div>
                                     <div class="col-md-9">
                                        <input type="email" class="form-control" name="email" required/>
                                     </div>
                                 </div>
                                 <div class="row my-4">
                                     <div class="col-md-3">
                                         <label for="password" class="col-form-label">Password</label>
                                     </div>
                                     <div class="col-md-9">
                                        <input type="password" class="form-control" name="pass" required/>
                                     </div>
                                 </div>
                                 <div class="row mt-3">
                                    
                                     <div class="col-md-9 offset-sm-3">
                                        <button class="submitId btn btn-block btn-primary font-weight-bold px-4" name="submit"> Sign In <i class="zmdi zmdi-square-right text-light"></i></button>
                                     </div>
                                 </div>
                             </form>
                             <?php
                            if(isset($_POST['submit'])){
                                $email=$_POST['email'];
                                $password=$_POST['pass'];
                                $query="SELECT * FROM user_info WHERE email='{$email}' AND password='{$password}'";  
                                $output=mysqli_query($con,$query);
                                if(mysqli_num_rows($output)>0){
                                    $temp=mysqli_fetch_assoc($output);
                                    $_SESSION['email_id']=$temp['email'];
                                    $_SESSION['mob_no']=$temp['phone'];
                                    $_SESSION['uname']=$temp['username'];
                                    $_SESSION['pass']=$temp['password'];
                                    redirect('index.php');
                                }else{
                                    echo"<div class='text-center'><span class='bg-danger p-2 text-light rounded'> Incorrect Username or password</span></div>";
                                }
                            }
                            ?>
                                <div class="row my-2">
                                    
                                    <div class="col-md-3">
                                        <a href="<?php $_SERVER['SERVER_NAME'];?>/index.php">Home</a>
                                    </div>
                                    
                                     <div class="col-md-9">
                                         <a href="#" class="pt-1">Forgot Password?</a>
                                     </div>
                                 </div>
                                 <div class="row mt-3">
                                     <div class="col-md-11">
                                        <p class="pt-2">Not Registered Yet? &nbsp; <a href="register.php" class="badge badge-danger p-2">Sign Up</a></p>
                                     </div>
                                 </div>
                        </div>
                    </div>
                </div>