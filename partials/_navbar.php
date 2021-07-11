<?php include('partials/_modal.php');?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Dunder Mifflin, Scranton</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>
        
      </ul>
      <?php if(isset($_SESSION['loggedin'])){
              if($_SESSION['loggedin']==false){
                
                echo '<form class="d-flex">
                  
                  <a class="btn btn-outline-success mx-1" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Log In</a>
                  <button class="btn btn-outline-success mx-1" type="submit">Register</button>
                </form>';
              }

              else{
                echo '<a href="partials\_logout.php" class="btn btn-outline-success mx-1" type="button">Log Out</a>';
            }
            }?>
            
              
    </div>
  </div>
</nav>