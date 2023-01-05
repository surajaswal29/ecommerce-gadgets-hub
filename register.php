<?php include"header.php";?>
<div class="container-fluid bg-light" style="height:100vh">
                <div class="row bg-light">
                        <div class="col-md-12 p-2 text-center">
                                <img src="images/logo.png" alt="Logo" class="img-fluid img-logo"/>
                        </div>
                </div>
</br>
    <div class="row flex-center mt-2">
        <div class="col-md-8 p-3 rounded mobile-form bg-white border">
            <form action=" " method="post" class="checkout">
                    <div class="row p-3">
                        <div class="col-md-12 text-center">
                             <h1 class="text-dark font-weight-bold">Create an account</h1>
                        </div>
                    </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <label for="full_name" class="col-form-label">Username</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="f_name" id="" placeholder="User Name" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <label for="full_name" class="col-form-label">Email</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="email_id" id="" placeholder="Enter Email Address" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <label for="full_name" class="col-form-label">Phone</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="Phone_no" id="" placeholder="Enter Phone Number" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <label for="full_name" class="col-form-label">Password</label>
                    </div>
                    <div class="col-md-4 text-left">
                        <input type="text" class="form-control" name="password" id="" placeholder="Password" required>
                        <span style="font-size: 11px; font-weight:600; color:red;"><i class="zmdi zmdi-alert-circle text-danger"></i> Passwords must be at least 8 characters long.</span>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4 offset-md-4 text-left">
                        <button type="submit" class="btn  btn-primary" name="submit"> Sign Up</button>
                    </div>
                </div>
                <?php
                if(isset($_POST['submit'])){
                  $username=mysqli_real_escape_string($con, $_POST['f_name']);
                  $email=mysqli_real_escape_string($con, $_POST['email_id']);
                  $phone=$_POST['Phone_no'];
                  $password=mysqli_real_escape_string($con, $_POST['password']);
                  $date=date('y-m-d');   
                  $query="INSERT INTO user_info (`username`, `email`,`password`, `phone`,date) 
                  VALUES ('$username', '$email','$password','$phone','$date')";
                  $output=mysqli_query($con,$query);
                    if($GLOBALS['output']){
                    echo"<div class='text-light text-center mt-2 rounded bg-success'>Account created Successfully!</div>";
                    redirect('login.php');
                    }
                }
                ?>
            </form>
        </div>
    </div>
</div>