<?php

$user = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  include './connect.php';

  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "select * from `signup` where email = '$email' and password = '$password'";

  $result = mysqli_query($con, $sql);

  if ($result) {
    $num = mysqli_num_rows($result);
    if ($num > 0) {
      session_start();
      $_SESSION['email'] = $email;
      header('location:./home.php');
    } else {
      $user = 1;
    }
  }
}
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>




  <div class="container d-flex align-items-center  justify-content-center min-vh-100   ">


    <!-- login container -->
    <div class="row border rounded-5 p-3 bg-white  shadow box-area shadow-lg ">

   


      <!-- left box -->
      <div class="col-md-6 rounded-4 left-box  d-flex align-items-center  justify-content-center flex-column " style="background: #C21760;">
        <div class="featured-image d-flex align-items-center justify-content-center flex-column">
          <img src="./signup.png" class="img-fluid " style="width: 250px;">
          <p class="text-white fs-2 text-center" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Online Kitchen</p>
          <smal class="text-white text-wrap text-center " style="width: 25rem; font-family:'Courier New', Courier, monospace ;">Get delicious meals delivered straight to your home with just a few clicks.</smal>
        </div>
      </div>
      <!-- right box -->
      <div class="col-md-6 d-flex align-items-center  justify-content-center flex-column">

       <!-- display error -->
    <?php
    
    if($user){
      echo '<div class="alert alert-danger alert-dismissible fade show w-100 d-flex align-items-center justify-content-between" role="alert">
      Plaese enter valid login info.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>  ';
    }
    
    ?>

        <div class="row align-items-center">
          <div class="header-text text-center mb-4 ">
            <h2 style="color: #C21760;">Hello,Again</h2>
            <p>We are happy to abel you back</p>
          </div>
          <form action="login.php" method="POST">

            <div class="mb-3">
              <input type="email" class="form-control form-control-lg bg-light fs-6" name="email" placeholder="enter your email" autocomplete="off">


            </div>
            <div class="mb-3">
              <input type="password" class="form-control form-control-lg bg-light fs-6" name="password" placeholder="enter your password">
            </div>

            <div class="input-group mb-3">
              <button type="submit" class="btn btn-lg w-100 fs-6" style="background-color: #C21760;">Submit</button>
            </div>

            <div class="row text-center">
              <small>Not a member? <a style="color: #C21760;" href="./Sign.php">Signup Here</a></small>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>