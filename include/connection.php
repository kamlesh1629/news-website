<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "news";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn){
    // echo "connected";
}else{
    die("not connected because ".mysqli_connect_error());
}

?>