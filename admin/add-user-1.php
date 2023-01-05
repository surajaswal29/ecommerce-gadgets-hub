<div class="col-10 py-4 mb-5">
            <div class="row mt-5">
                <div class="col-md-12 p-4 font-weight-bold text-center">
                    <h1>Add Users</h1>
                </div>
            </div>
            <div class="row flex-center">
                <div class="col-md-8 border p-4 border-dark rounded">
                    <form action=" " method="post" class="a-register">
                        <div class="row mt-3">
                            <div class="col-4">
                                <label for="full_name" class="col-form-label">Username</label>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" name="name" id="" placeholder="User Name" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                                <label for="full_name" class="col-form-label">Email</label>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" name="email" id="" placeholder="Enter Email Address" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                                <label for="full_name" class="col-form-label">Role</label>
                            </div>
                            <div class="col-6">
                                <select name="role" id="" class="form-control">
                                    <option value="role of user" >Select role of user</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">Local User</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                                <label for="full_name" class="col-form-label">Password</label>
                            </div>
                            <div class="col-6 text-left">
                                <input type="text" class="form-control" name="password" id="" placeholder="Password" required>
                                <span style="font-size: 11px; font-weight:600; color:red;"><i class="zmdi zmdi-alert-circle text-danger"></i> Passwords must be at least 6 characters.</span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4 offset-4 text-left">
                                <button type="submit" class="btn  btn-primary" name="submit"> Sign Up</button>
                            </div>
                        </div>
                        <?php
                        if(isset($_POST['submit'])){
                        $username=mysqli_real_escape_string($con, $_POST['name']);
                        $email=mysqli_real_escape_string($con, $_POST['email']);
                        $role=$_POST['role'];
                        $password=mysqli_real_escape_string($con, $_POST['password']);
                        $date=date('y-m-d');   
                        $query="INSERT INTO admin (`username`, `email`,role,`password`, date) 
                        VALUES ('$username', '$email','$role','$password','$date')";
                        $output=mysqli_query($con,$query);
                            if($output){
                            echo"<div class='text-light bg-success text-center p-3 mt-3'>Account created Successfully!</div>";
                            redirect('login.php');
                            }
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>