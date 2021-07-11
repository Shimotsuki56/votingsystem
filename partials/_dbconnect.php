<?php
//Script to connect to PHP
$server='localhost';
$username='root';
$password='';
$database='voting';

$conn=mysqli_connect($server,$username,$password,$database);
if(!$conn){
    echo "You are not connected because of " . mysqli_connect_error();
}
?>