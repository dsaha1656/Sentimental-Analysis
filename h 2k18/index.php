<?php
include "conf.php";
include "functions.php";
if (login()) {
  header("location:dashboard.php");
  die();
}
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    if ($_POST['parent']==310) {
      echo "Parent Login Request";
      die();
    }
    else {

    $user=$_POST['email'];
    $pass=$_POST['password'];
    $query = mysqli_query($dataBase['connection'], "SELECT * from Client_Users where email='$user'");
if (mysqli_num_rows($query)==1) {
  $query=mysqli_fetch_array($query);
  if ($pass==$query[5]) {
    $_SESSION['uid']=$user;
    header("location:./dashboard.php");
    exit(); 
  }
  else {
    echo "Pass does not match";
  }
}
else {
  echo "Email not found";
  }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>MindScript Login</title>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="google-signin-client_id" content="119722155361-rn9guvp9fopv65qk7rk95ldnb0dunpd6.apps.googleusercontent.com">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script src="facebook/fb.js"></script>

<script type="text/javascript">
  function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
}
</script>

<script>
$(function(){

var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;
}
  getLocation();
})
</script>
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
<body onload="">
  

  <div class="container" style="height: -webkit-fill-available;/*background-image: url(https://i.imgur.com/zy85SqV.gif);*/width:  -webkit-fill-available;margin-right: 0px;margin-left: 0px;">
    <main>
    <center>
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; 
    /*background-image: url(https://i.imgur.com/zy85SqV.gif);*/
    display: inline-block;
    border-radius: 25px;
    padding: 40px 48px 20px 48px;">

          <form class="col s12" method="post" action="index.php">
            <div class="row">
              <div class="col s12">
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <input class="validate invalid" type="email" name="email" id="email">
                <label for="email" class="active">Enter your email</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <input class="validate valid" type="password" name="password" id="password">
                <label for="password" class="active">Enter your password</label>
              </div>
              <label style="float: right;">
                <a class="pink-text" href="forgotpassword.php"><b>Forgot Password?</b></a>
              </label>
            </div>
            <br>
            <div class="row">
              <div class="input-field col s12">
                 <input name="parent" class="with-gap" value="310" type="checkbox" id="parent" />
              <label for="parent">Parent Login</label>
              </div>
            </div>
            <center>
              <div class="row">

<p id="demo"></p>
                <button type="submit" class="col s12 btn btn-large waves-effect indigo">Login</button>
              </div>

            </center>
          </form>
         
        </div>
      </div>
      <a href="signup.php">Create account</a>

    </center>

    
    
  </main>
  </div>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>


<div class="hiddendiv common"></div></body></html>