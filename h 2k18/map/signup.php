<?php
include "conf.php";
include "functions.php";
if (login()) {
  header("location:dashboard.php");
  die();
}
if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['password']) && !empty($_POST['confpassword'])) {
  $fname = $_POST['first_name'];
  $lname = $_POST['last_name'];
  $email=$_POST['email'];
  $phone = $_POST['phone'];
  $pass=$_POST['password'];
  $cpass=$_POST['confpassword'];
  $code=mt_rand(100000, 999999);
  if ($pass == $cpass) {
    $q = "SELECT * from Client_Users Where email='$email'";
    $q = mysqli_query($dataBase['connection'], $q);
    if (mysqli_num_rows($q)<1) {
      $q = "INSERT into records(email) values('$email')";
      $q2 = "INSERT into Client_Users(firstName,lastName,email,phone,password,authorize) values('$fname','$lname','$email','$phone','$pass','$code')";
      if (mysqli_query($dataBase['connection'], $q) && mysqli_query($dataBase['connection'], $q2)) {
        echo '<script type="text/javascript">location.href = "index.php";</script>';
    die();
      }
      else{
        header("location:signup.php");
      }
    }
    else {
      echo "<script>alert('Email Exists!!!')</script>";
    }
  }
  else {
    echo "<script>alert('Password Does not match')</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>MindScript Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
  <script src="facebook-signup/fb.js"></script>
  <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    main {
      flex: 1 0 auto;
    }

    body {
      background: #fff;
    }

    .input-field input[type=date]:focus + label,
    .input-field input[type=text]:focus + label,
    .input-field input[type=email]:focus + label,
    .input-field input[type=password]:focus + label {
      color: #e91e63;
    }

    .input-field input[type=date]:focus,
    .input-field input[type=text]:focus,
    .input-field input[type=email]:focus,
    .input-field input[type=password]:focus {
      border-bottom: 2px solid #e91e63;
      box-shadow: none;
    }
  </style>
</head>

<body>
  
  <div class="container" style="background-image: url(https://i.imgur.com/zy85SqV.gif);width:  -webkit-fill-available;margin-right: 0px;margin-left: 0px;">
    <main>
    <center>
      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; 
    background-image: url(https://i.imgur.com/zy85SqV.gif);
    display: inline-block;
    border-radius: 25px;
    padding: 40px 48px 10px 48px;
    margin-bottom: 0px;">

    <div class="row" style="margin-bottom: 0px;">
                <form class="col s12" method="post" action="signup.php" style="color: #fff">
                  <div class="row">
                    <div class="input-field col s6">
                      <input id="first_name" type="text" name="first_name" class="validate" required>
                      <label for="first_name">First Name</label>
                    </div>
                    <div class="input-field col s6">
                      <input id="last_name" type="text" class="validate" name="last_name" required>
                      <label for="last_name">Last Name</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="email" type="email" class="validate" name="email" required>
                      <label for="email">Email</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="phone" type="tel" class="validate" name="phone" required>
                      <label for="phone">Mobile No.</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="password" type="password" class="validate" name="password" minlength="6" required>
                      <label for="password">Password</label>
                    </div>
                    <div class="input-field col s12">
                      <input id="confirmpassword" type="password" class="validate" name="confpassword" minlength="6" required>
                      <label for="confirmpassword">Confirm Password</label>
                    </div>
                  </div>
                    <div class="input-field col s6">
                      <button class="btn btn-large btn-register waves-effect waves-light" type="submit" name="action">Register
                        <i class="material-icons right">done</i>
                      </button>
                    </div>

                    <div class="col s6">
                      <label style="float: right;">
                            <a class="pink-text" href="./"><b>Back to Login</b></a>
                          </label>
                          
              <div class="row fb-login-button" data-scope="public_profile,email" onlogin="checkLoginState()"></div>
                    </div>
                </form>
    </div>
</div>
      <div class="section" style="padding-top: 15px"></div>

        </div>
    </center>
  </main>
  </div>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>


<div class="hiddendiv common"></div></body></html>