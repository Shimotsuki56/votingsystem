<?php
include '_dbconnect.php';
session_start();

if ($_SERVER['REQUEST_METHOD']=='POST') {
    echo "method is post";
    $username=$_POST['voter_username'];
    $password=$_POST['voter_password'];
    $sql= "SELECT * FROM `voters` WHERE `username`='$username'";
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    $num=mysqli_num_rows($result);
    if ($num==1) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['loggedin']=true;
            header('location:http://localhost/anurag/Voting%20system/vote.php?u='.$username.'');
        }
        else{
            $_SESSION['type']='danger';
            $_SESSION['message']='Wrong login credentials. Please try again.';
            header('location:http://localhost/anurag/Voting%20system/');
        }
    }
    else{
        $_SESSION['type']='danger';
        $_SESSION['message']='You dont have an account. Register as a voter and then login.';
    }
}


?>

