<?php include"header.php"; ?>
<?php include"subhead.php"; ?>
<div class="container-fluid">
                    <div class="row">
                            <!-- breadcrumbs -->
                        <div class="col-md-12 mt-2">
                            <!-- breadcrumbs -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb bg-white">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item"><a href="login.php">Login</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                    </ol>
                                </nav>
                        </div>
                        <div class="col-md-12 p-4 font-weight-bold text-center">
                            <h1>Account & Login Details</h1>
                        </div>
                    </div>
                    <div class="row flex-center">
        <div class="col-md-10 border p-4 border-dark rounded">
            <form action=" " method="post" class="checkout">
                <div class="row mt-3">
                    <div class="col-2">
                        <label for="full_name" class="col-form-label">Username</label>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control" name="f_name" value="<?php echo $_SESSION['uname']; ?>" readonly>
                    </div>
                    <div class="col-2">
                        <a href="" class="nav-link btn btn-primary">Edit</a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-2">
                        <label for="full_name" class="col-form-label">Email</label>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control" name="email_id" value="<?php echo $_SESSION['email_id']; ?>" readonly>
                    </div>
                    <div class="col-2">
                    <a href="" class="nav-link btn btn-primary">Edit</a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-2">
                        <label for="full_name" class="col-form-label">Phone</label>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control" name="Phone_no" value="<?php echo $_SESSION['mob_no']; ?>" readonly>
                    </div>
                    <div class="col-2">
                    <a href="" class="nav-link btn btn-primary">Edit</a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-2">
                        <label for="full_name" class="col-form-label">Password</label>
                    </div>
                    <div class="col-8 text-left">
                        <input type="text" class="form-control" name="password" value="<?php echo $_SESSION['pass']; ?>" readonly>
                        <!-- <span style="font-size: 11px; font-weight:600; color:red;"><i class="zmdi zmdi-alert-circle text-danger"></i> Passwords must be at least 6 characters.</span> -->
                    </div>
                    <div class="col-2">
                    <a href="" class="nav-link btn btn-primary">Edit</a>
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
                    echo"<div class='text-success bg-success'>Account created Successfully!</div>";
                    }
                }
                ?>
            </form>
        </div>
    </div>
</div>
