<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "game_gadgets";

$conn=mysqli_connect($hostname,$username,$password,$database) or die("Error");

if(!$conn){
    echo "Not Connected";
}

?>