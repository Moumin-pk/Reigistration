<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'registration';


$con = mysqli_connect($hostname,$username,$password,$database);

if(!$con){
  die('connection failed'.mysqli_connect_error());
}

?>