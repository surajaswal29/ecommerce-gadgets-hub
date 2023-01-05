<?php include"header.php"; ?>
<div class="container-fluid" style="min-height: 100vh;">
   <div class="row">
        <div class="col-md-2 py-4">
                <ul class="list-unstyled mt-5">
                    <li class="bg-primary "><a href="add-user.php" class="nav-link text-light">Add User</a></li>
                </ul>
        </div>
       <div class="col-md-10">
            <div class="row px-5" style="margin-top:3rem;">
                <div class="col-md-10">
                    <h1 style="font-size:30px; font-weight:600;">User Details</h1>
                </div>
            </div>
            <div class="row px-5" style="margin-top:3rem;">
                <div class="col-md-10">
                    <table class="table table-responsive">
                    <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Password</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        <?php
                        $query="SELECT * FROM admin";
                        $output=mysqli_query($con,$query);
                        if(mysqli_num_rows($output)>0){
                            while($temp=mysqli_fetch_assoc($output)){
                        ?>
                        <tr>
                            <td><?php echo$temp['id']?></td>
                            <td><?php echo$temp['username']?></td>
                            <td ><?php echo$temp['email']?></td>
                            <td><?php echo$temp['role']?></td>
                            <td><?php echo$temp['password']?></td>
                            <td><i class="zmdi zmdi-edit"></i></td>
                            <td><i class="zmdi zmdi-delete"></i></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
            <div class="row px-5">
                <div class="col-md-8">
                    <div class="nav">
                        <a href="" class="badge badge-danger nav-link p-2 m-2">Prev</a>
                        <a href="" class="badge badge-danger nav-link p-2 m-2">1</a>
                        <a href="" class="badge badge-danger nav-link p-2 m-2">2</a>
                        <a href="" class="badge badge-danger nav-link p-2 m-2">3</a>
                        <a href="" class="badge badge-danger nav-link p-2 m-2">4</a>
                        <a href="" class="badge badge-danger nav-link p-2 m-2">5</a>
                        <a href="" class="badge badge-danger nav-link p-2 m-2">6</a>
                        <a href="" class="badge badge-danger nav-link p-2 m-2">next</a>
                    </div>
                </div>
            </div>
       </div>
   </div>
</div>
<?php include"a-footer.php";?>