<?php 
include"header.php";
// use Dompdf\Dompdf;
?>

<div class="container vh-100 watermark">
    <div class="row px-5">
        <div class="col-md-12 border text-center p-3">
            <h1 style="font-weight:600px;">Maa Bhubhneshwari Enterprises</h1>
        </div>
        <div class="col-md-12 border">
            <h2 class="text-center pt-3">Bill Receipt</h2>
            <div class="row p-4">
                <?php
                $order_id=$_GET['o_id'];
                $query1="SELECT * FROM order_details WHERE order_id='$order_id'";
                $output1=mysqli_query($con,$query1);
                if(mysqli_num_rows($output1)>0){
                $temp=mysqli_fetch_assoc($output1);
            ?>
                <div class="col-md-12 p-4">
                <h3 class="mb-4">Invoice to:</h3>
                   <div class="row">
                        <div class="col-md-3">
                            <label for="id">Invoice Id:</label>
                        </div>
                        <div class="col-md-3">
                            <h6 class="py-1"><?php echo$temp['order_id'] ?></h6>
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-md-3">
                            <label for="id">Name:</label>
                        </div>
                        <div class="col-md-3">
                            <h6 class="py-1 text-capitalize"><?php echo$temp['fname'].' '.$temp['lname'] ?></h6>
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-md-3">
                            <label for="id">Address:</label>
                        </div>
                        <div class="col-md-5">
                            <h6 class="py-1 text-capitalize"><?php echo$temp['Address'] ?></h6>
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-md-3">
                            <label for="id">Phone:</label>
                        </div>
                        <div class="col-md-3">
                            <h6 class="py-1"><?php echo$temp['phone'] ?></h6>
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-md-3">
                            <label for="id">Email:</label>
                        </div>
                        <div class="col-md-3">
                            <h6 class="py-1 text-capitalize"><?php echo$temp['email'] ?></h6>
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-md-3">
                            <label for="id">Payment Method:</label>
                        </div>
                        <div class="col-md-3">
                            <h6 class="py-1"><?php echo$temp['Payment_option'] ?></h6>
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-md-3">
                            <label for="id">Date:</label>
                        </div>
                        <div class="col-md-3">
                            <h6 class="py-1"><?php echo$temp['date'] ?></h6>
                        </div>
                   </div>
                </div>
            <?php
                }else{
                    echo"<div class='border p-5'>Nothing to show</div>";
                }
            ?>
            </div>
        </div>
        <div class="col-md-12 border">
            <h2 class="text-center pt-3">Products Details</h2>
            <div class="row p-4">
                <div class="col-md-12 p-4">
                      <table class="table table-bordered p_d">
                          <tr>
                              <th>Product Name</th>
                              <th>Weight</th>
                              <th>Qty</th>
                              <th>Unit Price(in Rs.)</th>
                              <th>Total Price(in Rs.)</th>
                          </tr>
                           <?php
                            $query2="SELECT * FROM cart INNER JOIN product ON cart.p_name=product.Name  WHERE email='{$_SESSION['email_id']}'";
                            $output2=mysqli_query($con,$query2);
                            $sub_total=0;
                            if(mysqli_num_rows($output2)>0){
                            while($temp2=mysqli_fetch_assoc($output2)){
                                $qty=$temp2['quantity'];
                                $amount=$temp2['Price'];
                                $tot_price=$qty*$amount;
                                $sub_total+=$tot_price;
                                $_SESSION['tot_price']=$sub_total;
                            ?>
                          <tr>
                              <td><?php echo$temp2['p_name'] ?></td>
                              <td><?php echo$temp2['variant'] ?></td>
                              <td><?php echo$temp2['quantity'] ?></td>
                              <td><?php echo$temp2['Price'] ?></td>
                              <td><?php echo$tot_price; ?></td>
                          </tr>
                          <?php
                            }}
                          ?>
                          <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td class="font-weight-bold">Sub Total:</td>
                              <td class="font-weight-bold"><?php echo$sub_total; ?>.00</td>
                          </tr>
                      </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
             <div class="row">
                <div class="col-md-6">
                    
                </div>
             </div>
        </div>
    </div>
</div>