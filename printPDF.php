<?php 
    include"admin/config.php";
    use Dompdf\Dompdf;
?>
<head>
  <style>
    *{
      font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    .wrap{
      /* height: 100vh; */
      position: relative;
      width:100%;
      padding: 10px;
      border: 1px solid;
    }
    .content-wrap{
      max-width: 100%;
      padding: 15px 15px;
      height: auto;
      /* display: flex; */
      flex-wrap: wrap;
      /* align-items: center; */
    }
    .center-flex{
      justify-content: center;
    }
    .img-wrap{
      display: flex;
      justify-content: center;
      height: 100px;
      width: 100%;
      /* background-color: #000; */
    }
      .img-fluid{
        margin-left: 38%;
        height: 100px;
        width: 100px;
      }
      .heading-wrap{
        position: relative;
        padding: 0px;
        width: 100%;
      }
      h1{
        text-align: center;
        width: 100%;
        font-size:38px;
        font-weight: 900;
      }
      .details{
        width: 100%;
        height:200px;
        border: 1px solid;
        padding: 10px 50px;
      }
      h3{
        padding: 0px;
        margin: 8px 5px;
      }
      .table {
          width: 100%;
          margin-bottom: 1rem;
          color: #212529;
        }

        .table th,
        .table td {
          padding: 0.75rem;
          vertical-align: top;
          border-top: 1px solid #dee2e6;
        }
      .table th{
        color:#fff;
        border: 1px solid #000;
        padding:8px;
        text-align: center;
        border-bottom:#dee2e6;
        background-color: #000;
      }
      .table td{
        text-align: center;
        border: 1px solid #000;
        padding: 8px;
        background-color: #f1f1;
      }
  </style>
</head>
<body style="padding:5px">
  <div class="wrap">
      <div class="content-wrap center-flex">
        <div class="img-wrap">
          <img src="images/logo.png" alt="" class="img-fluid">
        </div>
        <div class="heading-wrap">
          <h1>Maa Bhubhneshwari Enterprises</h1>
        </div>
      </div>
      <div class="content-wrap center-flex">
          <h1>Bill Reciept</h1>
          <div class="details">
            <h2>Invoice to:</h2>
           <?php
                $order_id=$_GET['id'];
                $query1="SELECT * FROM order_details WHERE order_id='$order_id'";
                $output1=mysqli_query($con,$query1);
                if(mysqli_num_rows($output1)>0){
                $temp=mysqli_fetch_assoc($output1);
            ?>
             <h3>Invoice ID:</h3>
             <h3>Email:</h3>
             <h3>Customer Name:</h3>
             <h3>Billing Address:</h3>
                <?php
              } ?>
          </div>
      </div>
      <div class="content-wrap">
          <h1>Product Details</h1>
          <table class="table">
              <tr>
               <th>Product Name</th>
               <th>Unit</th>
               <th>Unit Price</th>
               <th>Total Price</th>
             </tr>
             <tr>
               <td>Product Name</td>
               <td>3</td>
               <td>270.00</td>
               <td>270.00</td>
             </tr>
             <tr>
               <td style="border:none;"></td>
               <td style="border:none;"></td>
               <td style="text-align:right; padding:10px">Sub Total(in Rs.)</td>
               <td>270.00</td>
             </tr>
          </table>
      </div>
  </div>
</body>
