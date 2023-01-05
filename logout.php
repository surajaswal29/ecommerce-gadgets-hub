<?php
include"admin/config.php";
include"admin/function.inc.php";
 session_start();
 unset($_SESSION['username']);
 session_destroy();
 redirect('index.php');
?>