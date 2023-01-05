<?php
  error_reporting(E_ERROR | E_PARSE);
  $host='localhost';
  $user='root';
  $password='';
  $db='mbe';
  $con=mysqli_connect($host,$user,$password,$db);
  if(!$con){
    die('Connection not established!');
  }
?>