<?php
$server="localhost";
$username = "root";
$password = "";
$db = "hungryhive";

$conn = mysqli_connect($server,$username,$password,$db);

if(!$conn){
    echo mysqli_connect_error();
}


?>