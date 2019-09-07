<?php 
include "conf.php";
include "functions.php";
if (!login()) {
  header("location:./");
  die();
}
$email=$_SESSION['email'];
$q ="UPDATE Client_Users SET notification='0' where email = '$email'";
mysqli_query($dataBase['connection'], $q);
$q ="SELECT * from notifications where email='$email' order by id DESC";
$note = mysqli_query($dataBase['connection'], $q);
?>

<!DOCTYPE html>
<html>
<head>
    <title>MindScript</title>   
      
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/icon.css"/>
    <link rel="stylesheet" type="text/css" href="css/materialize.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/ghpages-materialize.css"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.cookie.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</head>
<body>
<div class="progress" id="progressbar">
      <div class="indeterminate"></div>
  </div>

<div id="contentiner">
<header>

    <div class=" ">
      <ul class="side-nav fixed">
        <li>
      <div class="user-view">
          <div class="background">
              <img src="unnamed.jpg">
          </div>
          <a href="#!user"><img class="circle" src="unnamed.jpg"></a>
          <a href="#!name"><span class="white-text name"><?php echo $_SESSION["firstName"]." ".$_SESSION["lastName"]; ?></span>
          <span class="white-text email"><?php echo $_SESSION["email"]; ?></span></a>
      </div>
    </li>
    <li><a href="dashboard.php" class="waves-effect waves-light homeButton"><i class="material-icons">home</i>Dashboard</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
    <li><a href="progress.php" class="waves-effect waves-light"><i class="material-icons">show_chart</i>Progress</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
    <li><a href="profile.php" class="waves-effect waves-light"><i class="material-icons">person_pin</i>Profile</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
    <li><a href="notification.php" id="close" class="waves-effect waves-light"><i class="material-icons">notifications</i>Notification</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
    <li><a href="motivation.php" class="waves-effect waves-light"><i class="material-icons">flare</i>Motivation Corner</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
    <li><a href="feedback.php" id="close" class="waves-effect waves-light"><i class="material-icons">feedback</i>Feedback</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
    <li><a href="aboutus.php" class="waves-effect waves-light"><i class="material-icons">sentiment_very_satisfied</i>About Us</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
      </ul>
    </div>
  <ul id="slide-out" class="side-nav">
    <li>
      <div class="user-view">
          <div class="background">
              <img src="unnamed.jpg">
          </div>
          <a href="#!user"><img class="circle" src="unnamed.jpg"></a>
          <a href="#!name"><span class="white-text name"><?php echo $_SESSION["firstName"]." ".$_SESSION["lastName"]; ?></span>
          <span class="white-text email"><?php echo $_SESSION["email"]; ?></span></a>
      </div>
    </li>
    <li><a href="dashboard.php" class="waves-effect waves-light homeButton"><i class="material-icons">home</i>Dashboard</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
    <li><a href="progress.php" class="waves-effect waves-light"><i class="material-icons">show_chart</i>Progress</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
    <li><a href="profile.php" class="waves-effect waves-light"><i class="material-icons">person_pin</i>Profile</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
    <li><a href="notification.php" id="close" class="waves-effect waves-light"><i class="material-icons">notifications</i>Notification</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
    <li><a href="motivation.php" class="waves-effect waves-light"><i class="material-icons">flare</i>Motivation Corner</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
    <li><a href="feedback.php" id="close" class="waves-effect waves-light"><i class="material-icons">feedback</i>Feedback</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
    <li><a href="aboutus.php" class="waves-effect waves-light"><i class="material-icons">sentiment_very_satisfied</i>About Us</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
  </ul>
  <nav class="deep-purple">
    <div class="nav-wrapper">
      <a href="#" data-activates="slide-out" class="button-collapse left"><i class="material-icons">menu</i></a>
      <a href="#" class="brand-logo center" style="display: inline;">Notification</a>
      <a href="logout.php" style="padding-right: 0.1px;" class="right">Log Out</a>
    </div>
  </nav>
</header>
<main>
<div>
  <ul class="collapsible" data-collapsible="accordion">
  <?php
  foreach ($note as $key => $value) {
      echo '<li>
              <div class="collapsible-header"><i class="material-icons">whatshot</i>'.$value["title"].'</div>
              <div class="collapsible-body"><span>'.$value["body"].'</span></div>
            </li>';
  }
  ?>
  </ul>
</div>
</main>
</div>
</body>
</html>