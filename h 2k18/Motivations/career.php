<?php 
include "../conf.php";
include "../functions.php";
if (!login()) {
  header("location:../");
die();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>MindScript</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" type="text/css" href="../css/icon.css"/>
  <link rel="stylesheet" type="text/css" href="../css/materialize.min.css"/>
  <link rel="stylesheet" type="text/css" href="../css/ghpages-materialize.css"/>
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/jquery.cookie.js"></script>
  <script type="text/javascript" src="../js/script.js"></script>
  <script type="text/javascript" src="../js/materialize.min.js"></script>

</head>
<body>
      <div class="indeterminate"></div>
  </div>
<header>

  <div id="sidebar" class="hide-on-small-only">
    <div class=" ">
      <ul class="side-nav fixed">
        <li>
      <div class="user-view">
          <div class="background">
              <img src="mindscript.jpg">
          </div>
          <a href="#!user"><img class="circle" src="mindscript.jpg"></a>
          <a href="#!name"><span class="white-text name"><?php echo $_SESSION["firstName"]." ".$_SESSION["lastName"]; ?></span>
          <span class="white-text email"><?php echo $_SESSION["email"]; ?></span></a>
      </div>
    </li>
    <li><a href="../dashboard.php" class="waves-effect waves-light homeButton"><i class="material-icons">home</i>Dashboard</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
    <li><a href="../progress.php" class="waves-effect waves-light"><i class="material-icons">show_chart</i>Progress</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
    <li><a href="../profile.php" class="waves-effect waves-light"><i class="material-icons">person_pin</i>Profile</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
    <li><a href="../notification.php" id="close" class="waves-effect waves-light"><i class="material-icons">notifications</i>Notification</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
     <li><a href="../motivation.php" class="waves-effect waves-light"><i class="material-icons">flare</i>Motivation Corner</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
    <li><a href="../feedback.php" id="close" class="waves-effect waves-light"><i class="material-icons">feedback</i>Feedback</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
    <li><a href="../aboutus.php" class="waves-effect waves-light"><i class="material-icons">sentiment_very_satisfied</i>About Us</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
    

      </ul>
    </div>
  </div>
  <ul id="slide-out" class="side-nav">
    <li>
      <div class="user-view">
          <div class="background">
              <img src="mindscript.jpg">
          </div>
          <a href="#!user"><img class="circle" src="mindscript.jpg"></a>
          <a href="#!name"><span class="white-text name"><?php echo $_SESSION["firstName"]." ".$_SESSION["lastName"]; ?></span>
          <span class="white-text email"><?php echo $_SESSION["email"]; ?></span></a>
      </div>
    </li>
    <li><a href="../dashboard.php" class="waves-effect waves-light homeButton"><i class="material-icons">home</i>Dashboard</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
    <li><a href="../progress.php" class="waves-effect waves-light"><i class="material-icons">show_chart</i>Progress</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
    <li><a href="../profile.php" class="waves-effect waves-light"><i class="material-icons">person_pin</i>Profile</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
    <li><a href="../notification.php" id="close" class="waves-effect waves-light"><i class="material-icons">notifications</i>Notification</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
     <li><a href="../motivation.php" class="waves-effect waves-light"><i class="material-icons">flare</i>Motivation Corner</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
    <li><a href="../feedback.php" id="close" class="waves-effect waves-light"><i class="material-icons">feedback</i>Feedback</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
    <li><a href="../aboutus.php" class="waves-effect waves-light"><i class="material-icons">sentiment_very_satisfied</i>About Us</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
   
  </ul>
  <nav class="deep-purple">
    <div class="nav-wrapper">
      <a href="#" data-activates="slide-out" class="button-collapse left"><i class="material-icons">menu</i></a>
      <style>
body {
 font-family: 'Merienda';font-size: 20px;

}
</style>
      <a href="#" class="brand-logo center" style="display: inline;">Career</a>
      <a href="logout.php" style="padding-right: 0.1px;" class="right">Log Out</a>
      </div>
  </nav>
</header>
<main>
<div class="row">
        <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image">
              <img src="../Motivations/images/14.Career/1.jpg">
            <br>
              <img src="../Motivations/images/14.Career/2.jpg">
              <br>
               <img src="../Motivations/images/14.Career/3.jpg">
              <br>
               <img src="../Motivations/images/14.Career/4.jpg">
              <br>
               <img src="../Motivations/images/14.Career/5.jpg">
              <br>
               <img src="../Motivations/images/14.Career/6.jpg">
              <br>
               <img src="../Motivations/images/14.Career/7.jpg">
              <br>
               <img src="../Motivations/images/14.Career/8.jpg">
              <br>
               <img src="../Motivations/images/14.Career/9.jpg">
              <br>
               <img src="../Motivations/images/14.Career/10.jpeg">
              <br>
               <img src="../Motivations/images/14.Career/11.jpg">
              <br>
               <img src="../Motivations/images/14.Career/12.jpg">
                <br>
               <img src="../Motivations/images/14.Career/13.jpg">
                <br>
               <img src="../Motivations/images/14.Career/14.jpg">
                 <br>
               <img src="../Motivations/images/14.Career/15.jpg">
                <br>
               <img src="../Motivations/images/14.Career/16.jpg">
              
          </div>
        </div>
      </div>
</main>
</body>
</html>