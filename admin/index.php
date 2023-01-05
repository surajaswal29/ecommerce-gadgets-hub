<?php include"file.php";?>
    <div class="container contain-b">
        <div class="row inner-wrap align-items-center justify-content-center">
            <div class="col-md-6">
                <img src="../images/logo.png" alt="Logo" class="img-fluid mt-2">
            </div>
            <div class="col-md-6">
                <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>"  class="py-4" autocomplete="off">
                    <label for="email"><i class="zmdi zmdi-account"></i> Username</label>
                      <input type="text" name="uname" id="u_name" class="form-control" placeholder="enter username" required>
                    <label for="password" class="mt-2"><i class="zmdi zmdi-border-color"></i> Password</label>
                      <input type="password" name="pass" id="p_ass" class="form-control" placeholder="enter password">
                    <input type="submit" class="btn btn-block btn-warning mt-3" value="Sign in" name="submit" id="signin">
                </form>
                <div class="nav">
                <a href="#" class="m-2 text-primary">Forgot password?</a>
                </div>
             <?php
              if(isset($_POST['submit'])){
                        $uname=$_POST['uname'];
                        $pass=$_POST['pass'];
                        include"config.php";
                        $sql="SELECT * FROM admin WHERE uname='$uname' and password='$pass' ";
                        $result=mysqli_query($con,$sql);
                        if(mysqli_num_rows($result)>0){
                            $temp=mysqli_fetch_assoc($result);
                            $_SESSION['username']=$temp['uname'];
                            $_SESSION['uname'] = $uname;
                            redirect('product.php');
                        }else{
                            echo "Invalid request";
                        }
                         
                }
             ?>
        </div>
    </div>
    
</body>
</html>