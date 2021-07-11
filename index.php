<?php session_start();
$_SESSION['loggedin']=false;?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Spirax&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/card.css">

    <title>Vote: Employee of the month</title>
</head>

<body>
    

    <?php include('partials/_dbconnect.php');?>
    <?php include('partials/_navbar.php');?>
    
    
    
    
    
    <?php
    
    if (isset($_SESSION['type'])) {
        echo'
    <div class="alert alert-'.$_SESSION['type'].' alert-dismissible fade show" role="alert">
    '.$_SESSION['message'].'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
  session_unset();
  session_destroy();
  
    
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
            </div>
                <div class="bottom">

                <p class="lead">Votes: <b>'.$votes.'</b></p>
                </div>
            </div>
        </div>';
            }
            
            ?>
            
        </div>

        <div class="registration">


            <div class="p-3">
                <h1 class="mb-3">Register as a voter</h1>
                <form action="partials/_signup.php" method='POST' autocomplete="off">
                    <div class="mb-3">
                        <label for="employee_name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="employee_name" name="employee_name"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Format: Surname Name Middlename</div>
                    </div>

                    <div class="mb-3">
                        <label for="employee_contact" class="form-label">Contact Number</label>
                        <input type="number" class="form-control" id="employee_contact" name="employee_contact">
                    </div>

                    <div class="mb-3">
                        <label for="employee_username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="employee_username" name="employee_username"
                            aria-describedby="emailHelp">

                    </div>

                    <div class="mb-3">
                        <label for="employee_email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="employee_email" name="employee_email"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Use your company domain email (@dundermifflinsc.com).
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="employee_password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="employee_password" name="employee_password">
                    </div>

                    <div class="mb-3">
                        <label for="employee_cpassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="employee_cpassword" name="employee_cpassword">
                    </div>

                    <!-- <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Show Password</label>
                    </div> -->

                    <button class="btn btn-primary my-3">Register</button>
                    <br>
                    <label>Registered already? </label>
                    <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Click here to login
        </a>
                </form>
            </div>
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