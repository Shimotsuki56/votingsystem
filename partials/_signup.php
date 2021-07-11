<?php require'_dbconnect.php';

session_start();
    // echo "<br>reached signup";
if ($_SERVER['REQUEST_METHOD']=='POST') {
    // echo "<br>method is post";
    $showAlert=false;
    $showError_pass=false;
    $showError_name= false;
    $showError_email=false;
    $exists=false;
    
    
    $name=$_POST['employee_name'];
    $contact=$_POST['employee_contact'];
    $username=$_POST['employee_username'];
    $email=$_POST['employee_email'];
    $password=$_POST['employee_password'];
    $cpassword=$_POST['employee_cpassword'];

    $sql='SELECT * FROM `voters`';
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    // echo "<br>num= ".$num."";
    while($rows=mysqli_fetch_assoc($result)){
        if ($num>0) {
            $email_db=$rows['email'];
        }
        else{
            $email_db='';
        }
    }



    if($email_db!=$email){
        // echo "<br>email hasnt been found in the database.";

        if (strpos($email,'@dundermifflinsc.com')!==false){
            // echo "<br>email format is correct";
            $sql= "SELECT * FROM `voters` WHERE `username`='$username'";
            $result=mysqli_query($conn, $sql);
            $num=mysqli_num_rows($result);
            if ($num==0) {
                if(strlen($contact)==10){
                    if ($password==$cpassword) {
                    // echo "<br>password is correct";
                    $hash=password_hash($password, PASSWORD_DEFAULT);
                    $sql="INSERT INTO `voters` (`voterid`, `name`, `username`, `email`, `password`, `contact number`, `dt`, `voted`) VALUES (NULL, '$name', '$username', '$email', '$hash', '$contact', current_timestamp(), 'no');";
                    $result=mysqli_query($conn, $sql);
                    // echo "<br>registered";
                    $_SESSION['type']='success';
                    $_SESSION['message']='Your account has been created. Login to vote!';
                    } 
                    else {
                    $_SESSION['type']='danger';
                    $_SESSION['message']='Passwords dont match.';
                    }
                }
                else{
                    $_SESSION['type']='danger';
                    $_SESSION['message']='Submit a valid, 10 digit contact number.';
                }
            }
            else{
                $_SESSION['type']='danger';
                $_SESSION['message']='This username already exists. Try a new one.';
            }
        }
        
        else{
            $_SESSION['type']='danger';
        $_SESSION['message']='Wrong email. Use your work email to register.';
        }
    }

    else{
        $_SESSION['type']='danger';
        $_SESSION['message']='You already have an account. Log in to vote.';
    }

    header('location:http://localhost/anurag/Voting%20system/');
}

?>