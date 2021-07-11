<?php session_start();
if($_SESSION['loggedin']!=true){
  header('location:http://localhost/anurag/Voting%20system/');
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Spirax&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/vote.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Polls: Dunder Mifflin, Sc</title>
</head>

<body>
    
    <?php include('partials/_dbconnect.php');?>
    <?php include('partials/_navbar.php');?>

    <!-- Alerts -->
    <?php
    if(isset($_SESSION['type_voted'])){
      echo'
    <div class="alert alert-'.$_SESSION['type_voted'].' alert-dismissible fade show" role="alert">
    '.$_SESSION['message_voted'].'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }
    ?>
    
    <div class="whole">
        <div class="candidates">
            <?php 
            $sql="SELECT * FROM `candidates`";
            $result=mysqli_query($conn,$sql);
            while ($rows=mysqli_fetch_assoc($result)) {
                $name=$rows['name'];
                $quote=$rows['quote'];
                $userid=$rows['sno'];
                $votes=$rows['votes'];
                echo '<div class="card" style="width: 18rem;">
                <div class="flexcent">
            <img src="images/'.$name.'.jpg" alt="..."></div>
            <img id="pin" src="images/pin.png" alt="">

            <div class="card-body">
            <div class="main">
                <h5 class="card-title">'.$userid.'. '.$name.'</h5>
                <p class="card-text quote">'.$quote.'</p>
              </div>';

              $voter_username=$_GET['u'];
              $sql1="SELECT * FROM `voters` where `username`='$voter_username'";
              $result1=mysqli_query($conn,$sql1);
              $row=mysqli_fetch_assoc($result1);
              $voted=$row['voted'];
              
              

                if ($voted=="no") {
                    echo '<div class="bottom">
                    <a type="button" href="partials/_voted.php?u='.$voter_username.'&c='.$userid.'" class="btn btn-success" id="'.$userid.'">Vote</a>
                </div>
            </div>
        </div>';
                }

                else if($voted=="yes"){
                  echo '<div class="bottom">
                  <p class="lead">You have already voted</p>
              </div>
          </div>
      </div>';
                }
            }
            
            ?>

        </div>

        <div class="userProfile">
        <div class="flexcent">
            <img src="images/user.png" alt="...">
        </div>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>
      <th scope="col">Information</th>
      
    </tr>
  </thead>
  <tbody>
  <?php
    $username=$_GET['u'];
    $sql="SELECT * FROM `voters` WHERE `username`='$username'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    
    $id=$row['voterid'];
    $name=$row['name'];
    $username=$row['username'];
    $email=$row['email'];
    $contact=$row['contact number'];
    $voted_yet=$row['voted'];
    $voted_for=$row['voted_for'];
    
    echo '<tr>
      <th scope="row"><b>.</b></th>
      <td>Voter Id</td>
      <td>'.$id.'</td>
    </tr>
    <tr>
      <th scope="row"><b>.</b></th>
      <td>Name</td>
      <td>'.$name.'</td>
    </tr>
    <tr>
      <th scope="row"><b>.</b></th>
      <td>Username</td>
      <td>'.$username.'</td>
    </tr>
    <tr>
      <th scope="row"><b>.</b></th>
      <td>Email</td>
      <td>'.$email.'</td>
    </tr>
    <tr>
      <th scope="row"><b>.</b></th>
      <td>Contact Number</td>
      <td>'.$contact.'</td>
    </tr>
    <tr>
      <th scope="row"><b>.</b></th>
      <td>Voted</td>
      <td>'.$voted_yet.'</td>
    </tr>';
    if($voted_for!=null){
      $sql="SELECT * FROM `candidates` where `sno`='$voted_for'";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_assoc($result);
      $candidate_name=$row['name'];
      echo '<tr>
      <th scope="row"><b>.</b></th>
      <td>Voted For</td>
      <td>'.$candidate_name.'</td>
    </tr>
      ';
    }
    
    ?>
    
  </tbody>
</table>
        </div>

        

    </div>
    <?php include "partials/_footer.php"?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>






