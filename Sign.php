<?php

$succes = 0;
$user = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  include './connect.php';

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];


  $sql = "select * from `signup` where email  = '$email'";
  $result = mysqli_query($con, $sql);


  if ($result) {
    $num = mysqli_num_rows($result);
    if ($num > 0) {
      $succes = 1;
    } else {

      $sql = "insert into `signup` (fname,lname,email,password) values ('$fname','$lname','$email','$password')";
      $result = mysqli_query($con, $sql);
      if ($result) {
        // $user = 1;
        echo 'inserted succesfully';
      } else {
        die(mysqli_error($con));
      }
    }
  }
}
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Signup</title>
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


        <div class="row align-items-center">
          <div class="header-text text-center mb-4 ">
            <h2 style="color: #C21760;">Create a new account</h2>
            <p>It's quick and easy</p>
          </div>
          <form action="sign.php" method="POST">
            <div class="row mb-3">
              <div class="col">
                <input type="text" class="form-control  form-control-lg bg-light" placeholder="First name" name="fname" autocomplete="off">
              </div>
              <div class="col">
                <input type="text" class="form-control form-control-lg bg-light" placeholder="Last name" name="lname" autocomplete="off">
              </div>
            </div>


            <div class="mb-3">
              <input type="email" class="form-control form-control-lg bg-light fs-6" name="email" placeholder="enter your email" autocomplete="off">

              <?php
              if ($succes) {

                echo '<div id="emailHelp" class="form-text text-danger ">Email is already exist use another email</div> ';
              } else {
              }
              ?>

            </div>
            <div class="mb-3">
              <input type="password" class="form-control form-control-lg bg-light fs-6" name="password" placeholder="enter your password">
            </div>

            <div class="input-group mb-3">
              <button type="submit" class="btn btn-lg w-100 fs-6" style="background-color: #C21760;">Submit</button>
            </div>

            <div class="row text-center">
              <small>Already a member? <a style="color: #C21760;" href="./login.php">Login Here</a></small>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>