<?php
session_start();
include "_dbconnect.php";

//************ADDING THE VOTE TO THE CANDIDATE************

$candidate_id=$_GET['c'];
$voter_username=$_GET['u'];
// echo $candidate_id;
// echo "<br>";
// echo $voter_username;
// echo "<br>";
$sql="SELECT * FROM `candidates` where `sno`='$candidate_id'";
$result=mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);
$votes=$row['votes'];
$votes_new=$votes+1;
$voter_list=$row['voted_by'];
if($voter_list!=null){
    $voter_list.=', ';
    $voter_list.=$voter_username;
}
else{
    $voter_list=$voter_username;
}
// echo "<br>";
// echo $votes_new;
$sql="UPDATE `candidates` SET `votes` = '$votes_new',`voted_by`='$voter_list' WHERE `candidates`.`sno` ='$candidate_id' ;";
$result_votes=mysqli_query($conn,$sql);

if ($result_votes) {

    //************ADDING "VOTED" TO THE VOTER************
    $sql="UPDATE `voters` SET `voted` = 'yes',`voted_for`='$candidate_id' WHERE `voters`.`username` = '$voter_username';";
    $result_voted=mysqli_query($conn, $sql);
    if($result_voted){
        $_SESSION['type_voted']='success';
        $_SESSION['message_voted']='Your vote has been registered. Thank you for voting!';
        header('location:http://localhost/anurag/Voting%20system/vote.php?u='.$voter_username.'');
    }
    else{
        $_SESSION['type_voted']='danger';
        $_SESSION['message_voted']='There was some error. Please try again.';
    }


}

else{
    $_SESSION['type_voted']='danger';
    $_SESSION['message_voted']='There was some error. Please try again.';
}

    

?>