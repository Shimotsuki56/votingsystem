<?php
$_SESSION['loggedin']=false;
session_unset();
session_destroy();

header('location:http://localhost/anurag/Voting%20system/');
?>