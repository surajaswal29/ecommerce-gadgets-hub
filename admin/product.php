<?php include"header.php";?>
<div class="container-fluid" style="min-height: 100vh;">
    <div class="row px-5" style="margin-top:3rem;">
        <div class="col-md-10">
            <h1 style="font-size:30px; font-weight:600;">Items Details</h1>
        </div>
    </div>
    <div class="row px-5" style="margin-top:3rem;">
        <div class="col-md-12">
            <table class="table table-responsive" id="product_table">
               <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Weight</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                <?php
                $query="SELECT * FROM product";
                $output=mysqli_query($con,$query);
                if(mysqli_num_rows($output)>0){
                    while($temp=mysqli_fetch_assoc($output)){
                ?>
                <tr>
                    <td><?php echo$temp['p_id']?></td>
                    <td><?php echo$temp['Name']?></td>
                    <td class="text-truncate" style="max-width:500px"><?php echo$temp['Description']?></td>
                    <td><?php echo$temp['Price']?></td>
                    <td><?php echo$temp['p_id']?></td>
                    <td><a href="edit-product.php?e_id=<?php echo$temp['p_id']?>"><i class="zmdi zmdi-edit"></i></a></td>
                    <td><a href="delete-product.php?pr_id=<?php echo$temp['p_id']?>"><i class="zmdi zmdi-delete"></i></a></td>
                </tr>
                <?php
                    }
                  }
                ?>
            </table>
        </div>
    </div>
    <div class="row px-5">
        <div class="col-md-12">
            <div class="nav justify-content-center">
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
<?php include"a-footer.php";?>