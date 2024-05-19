<?php
 session_start();
 if(!isset($_SESSION['email'])){
  header('location:./login.php');
 }


?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>




  <div class="container d-flex align-items-center  justify-content-center min-vh-100  flex-column ">
    <h1>HOME PAGE</h1>
    <h2> Welcome to</h2>
    <?php
    echo $_SESSION['email'];
    echo'<br>';
    ?>
    <div class="input-group mt-3">
              <a href="./logout.php" class="btn btn-lg w-100 fs-6" style="background-color: #C21760;">Logout</a>
            </div>
  </div>
</body>

</html>