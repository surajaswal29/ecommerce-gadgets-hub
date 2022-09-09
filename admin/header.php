<div class="row py-2 mb-3 border">
        <div class="col-md-12 gully-heading center">
            <h2>Attal Utkrisht Late Mahimanand Nautiyal G.I.C | Admin Panel</h2>
        </div>
 </div>
<div class="row py-1">
        <div class="col-md-8">
            <div class="nav gully-nav">
                <a href="main.php" class="nav-link"><i class="zmdi zmdi-home"></i> Home</a>
                <?php
                  if($_SESSION['uname']=="root_admin"){
                    echo'<a href="add-staff.php" class="nav-link">Add staff</a>';
                    echo'<a href="add-gallery-img.php" class="nav-link">Add Images</a>';
                    echo'<a href="query.php" class="nav-link">Queries</a>';
                  }
                ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="nav gully-nav-1">
                <a href="#" class="nav-link"><i class="zmdi zmdi-account"></i> Welcome, <?php echo $_SESSION['uname']; ?></a>
                <a href="logout.php" class="nav-link">Log out</a>
            </div>
        </div>
</div>