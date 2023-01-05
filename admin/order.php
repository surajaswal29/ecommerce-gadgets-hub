<?php include 'header.php'; ?>
<?php
$limit=8;
if(isset($_GET['page_no'])){
    $page=$_GET['page_no'];
}else{
    $page=1;
}
$offset=($page-1) * $limit; 
?>
<div class="container-fluid">
    <div class="row" style="margin-top:0rem;">
        <div class="col-md-2 mt-5">
            <div class="btn btn-info">Total Orders: <?php echo mysqli_num_rows(mysqli_query($con,"SELECT * FROM order_details")) ?> <i class="zmdi zmdi-view-list"></i></div>
            <?php
            date_default_timezone_set('Asia/Kolkata');
            // $timezone = date_default_timezone_get();
            ?>
        </div>
        <div class="col-md-2 mt-5">
            <div class="btn btn-info"><i class="zmdi zmdi-calendar"></i> Date: <?php echo date('Y-m-d'); ?></div>
        </div>
        <div class="col-md-7 mt-5">
               <!-- <label for="search">Search Order </label> -->
               <form action="" class="inline-form" method="GET">
                    <input type="text" class="form-control border border-dark" placeholder="Search Order" name="search" required>
                    <button type="submit" class="btn btn-dark" name="submit"><i class="zmdi zmdi-search"></i></button>
               </form>
        </div>
        <div class="col-md-12 mt-5">
                        <?php
                        if(isset($_GET['submit'])){
                            $s=$_GET['search'];
                         ?>
                            <table class="table mt-5">
                                <tr>
                                    <th>S.NO</th>
                                    <!-- <th>Product Name</th> -->
                                    <th>Shipping Address</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Buyer's Name</th>
                                    <th>Products</th>
                                    <th>Payment mode</th>
                                    <th>Payment Status</th>
                                    <th>Delivery Status</th>
                                    <th>Date</th>
                                </tr>
                                <?php
                                $s_query="SELECT * FROM order_details WHERE fname LIKE '%$s%' OR lname LIKE '%$s%' OR Address LIKE '%$s%' OR Payment_option LIKE '%$s%' OR phone LIKE '%$s%'";
                                $s_result=mysqli_query($con,$s_query);
                                if(mysqli_num_rows($s_result)>0){
                                    while($s_row=mysqli_fetch_assoc($s_result)){
                                ?>
                                <tr>
                                    <td><?php echo $s_row['order_id']?> </td>
                                    <td><?php echo $s_row['Address'].", ".$s_row['state'].", ".$s_row['pin_code']?> </td>
                                    <td><?php echo $s_row['email']?> </td>
                                    <td><?php echo $s_row['phone']?> </td>
                                    <td><?php echo $s_row['fname']." ".$s_row['lname']?> </td>
                                    <td><a href="#" class="btn-sm btn-primary">View</a> </td>
                                    <td><?php echo $s_row['Payment_option']?> </td>
                                    <td>
                                        <?php 
                                        if($s_row['Payment_option']=="Online"){
                                                echo"<div class='badge badge-success p-1'>Paid</div>";
                                        }
                                        else
                                        {
                                                echo"<div class='badge badge-danger p-1'>Pending</div>";
                                        }
                                        ?> 
                                    </td>
                                    <td> <a href="#" class="badge badge-primary p-1">Not yet</a> <a href="#" class='p-1 badge badge-success'>Delivered</a></td>
                                    <td><?php echo $s_row['date']?> </td>
                                </tr>
                                <?php
                                     }
                                    }else{
                                    echo"No Match";
                                    }
                                ?>
                            </table>
        </div>
       </div>
        </div>
        <?php include "a-footer.php";
        die();
            }
            ?>
        </div>
        <div class="col-md-12">
            <?php
                $o_sql="SELECT * FROM order_details ORDER BY date desc LIMIT {$offset},{$limit}";
                $o_result=mysqli_query($con,$o_sql);
            ?>
            <table class="table mt-5 table-hover">
                <tr>
                    <th>OrderID</th>
                    <!-- <th>Product Name</th> -->
                    <th>Shipping Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Buyer's Name</th>
                    <th>Products</th>
                    <th>Payment mode</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Date</th>
                </tr>
                <?php
                if(mysqli_num_rows($o_result)>0){
                    while($o_row=mysqli_fetch_assoc($o_result)){
                ?>
                <tr>
                    <td><?php echo $o_row['order_id']?> </td>
                    <td><?php echo $o_row['Address'].", ".$o_row['state'].", ".$o_row['pin_code']?> </td>
                    <td><?php echo $o_row['email']?> </td>
                    <td><?php echo $o_row['phone']?> </td>
                    <td><?php echo $o_row['fname']." ".$o_row['lname']?> </td>
                    <td><a href="#" class="btn-sm btn-primary">View</a> </td>
                    <td><?php echo $o_row['Payment_option']?> </td>
                    <td>
                        <?php 
                           if($o_row['Payment_option']=="Online"){
                                echo"<div class='badge badge-success p-1'>Paid</div>";
                           }
                           else
                           {
                                echo"<div class='badge badge-danger p-1'>Pending</div>";
                           }
                        ?> 
                    </td>
                    <td> <a href="#" class="badge badge-primary p-1">Not yet</a> <a href="#" class='p-1 badge badge-success'>Delivered</a></td>
                    <td><?php echo $o_row['date']?> </td>
                </tr>
                <?php
                    }
                }
                ?>
            </table>
        </div>
        <div class="col-md-12">
            <div class="nav justify-content-center shadow bg-light">
            <?php
               $pagi=mysqli_query($con,"SELECT * FROM order_details");
               if(mysqli_num_rows($pagi)>0){
               $total_records=mysqli_num_rows($pagi);
               $total_page=ceil($total_records / $limit);
               if($page>1){
                echo "<a href='order.php?page_no=".($page-1)."' class='nav-link'><< Prev</a>";
                }
               for($i=1; $i<=$total_page; $i++){
            ?>
                <a href="order.php?page_no=<?php echo $i ?>" class="nav-link <?php echo $active; ?>"><?php echo $i ?></a>
            <?php
               }
               if($page<$total_page){
                   echo "<a href='order.php?page_no=".($page+1)."' class='nav-link'>Next >></a>";
                }
            }
            ?>
            </div>
        </div>
    </div>
</div>
</div>
<?php include "a-footer.php"; ?>