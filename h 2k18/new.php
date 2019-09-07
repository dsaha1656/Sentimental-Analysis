<?php 
include "conf.php";
include "functions.php";
if (!login()) {
  header("location:./");
  die();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>MindScript</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="css/icon.css"/>
    <link rel="stylesheet" type="text/css" href="css/materialize.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/ghpages-materialize.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.8.1/css/perfect-scrollbar.min.css"/>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.8.1/js/perfect-scrollbar.jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.cookie.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.8.1/js/perfect-scrollbar.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>    
</head>
<body>
<div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
<div id="contentiner">
<header>

    <div id="sidebar" class="hide-on-small-only">
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
    <li><a href="feedback.php" id="close" class="waves-effect waves-light"><i class="material-icons">feedback</i>Feedback</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
    <li><a href="aboutus.php" class="waves-effect waves-light"><i class="material-icons">sentiment_very_satisfied</i>About Us</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
            </ul>
        </div>
    </div>
    <ul id="slide-out" class="side-nav">
        <li>
            <div class="user-view">
                <div class="background">
                    <img src="unnamed.jpg">
                </div>
                <a href="#!user"><img class="circle" src="unnamed.jpg"></a>
                <a href="#!name"><span class="white-text name">Username</span>
          <span class="white-text email">usermail@mindscript.tk</span></a>
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
        <li><a href="feedback.php" id="close" class="waves-effect waves-light"><i class="material-icons">feedback</i>Feedback</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
   
     <li><a href="aboutus.php" class="waves-effect waves-light"><i class="material-icons">sentiment_very_satisfied</i>About Us</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
    </ul>
    <nav class="slider-adjustment brown">
        <div class="nav-wrapper">
            <a href="#" data-activates="slide-out" class="button-collapse left"><i class="material-icons">menu</i></a>
            <a href="#" class="brand-logo center" style="display: inline;"><span style="font-weight:bold; ">About Us</span></a>
            <a href="logout.php" style="padding-right: 20px;" class="right">Log Out</a>
        </div>
    </nav>
</header>
<main>
        <ul id="nav">
        <li><a href="#">Link1</a></li>
        <li><a href="#">Link2</a></li>
        <li><a href="#">Link3</a></li>
        <li id="notification_li">
        <a href="#" id="notificationLink">Notifications</a>
            <span id="notification_count">3</span>

            <div id="notificationContainer">
            <div id="notificationTitle">Notifications</div>
            <div id="notificationsBody" class="notifications"></div>
            <div id="notificationFooter"><a href="#">See All</a></div>
            </div>

        </li>
        <li><a href="#">Link4</a></li>
        </ul>        
</main>
</div>
</body>
</html>
