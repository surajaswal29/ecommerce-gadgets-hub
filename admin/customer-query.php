<?php include"header.php"; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-2 bg-dark py-3">
            <ul class="list-unstyled mt-5">
                <li><a href="mailto:">sooraj</a></li>
                <li><a href="mailto:">sooraj</a></li>
                <li><a href="mailto:">sooraj</a></li>
                <li><a href="mailto:">sooraj</a></li>
            </ul>
        </div>
        <div class="col-8">
            <div class="row justify-content-center my-5">
                <?php
                $c_query="SELECT * FROM contact";
                $c_output=mysqli_query($con,$c_query);
                if(mysqli_num_rows($c_output)>0){
                    while($c_temp=mysqli_fetch_assoc($c_output)){
                ?>
                <div class="col-md-10 border border-info bg-light shadow p-2 my-4">
                        <a href="customer-query.php?id=<?php echo$c_temp['c_id']; ?>" class="text-decoration-none text-dark">
                            <div class="row">
                                <div class="col-md-12 my-1 py-2 px-5 text-primary">
                                    <span>From: <?php echo$c_temp['c_email']; ?></span>
                                </div>
                                <div class="col-md-2">
                                    <h5 class="text-right">Name:</h5>
                                </div>
                                <div class="col-md-6">
                                    <h5><?php echo$c_temp['c_name']; ?></h5>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-2">
                                    <h6 class="text-right">Subject:</h6>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-left"><?php echo$c_temp['c_subject']; ?></h6>
                                    <button class="btn btn-sm btn-primary">Reply</button>
                                    <button class="btn btn-sm btn-primary">Delete</button>
                                </div>
                            </div>
                        </a>
                </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>