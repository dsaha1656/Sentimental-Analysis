<?php 
// creating Event stream

header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
$name = strip_tags($_GET['name']);
$msg = strip_tags($_GET['msg']);

function sendMsg($msg)
{
    echo "data: $msg" . PHP_EOL;
    ob_flush();
    flush();
}

if (!empty($name) && !empty($msg))
{
    $fp = fopen("_chat.txt", 'a');
    fwrite($fp, '<div class="chatmsg"><b>' . $name . '</b>: ' . $msg . '<br/></div>' . PHP_EOL);
    fclose($fp);
}

if (file_exists("_chat.txt") && filesize("_chat.txt") > 0)
{
    $arrhtml = array_reverse(file("_chat.txt"));
    $html = $arrhtml[0];
}

if (filesize("_chat.txt") > 100)
{
    unlink("_chat.txt");
}

sendMsg($html); 
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
body {
 font-family: 'Merienda';font-size: 20px;

}
</style>
  <title>MindScript</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link type="text/css" rel="stylesheet" href="style.css" />
  <link rel="stylesheet" type="text/css" href="css/icon.css"/>
  <link rel="stylesheet" type="text/css" href="css/materialize.min.css"/>
  <link rel="stylesheet" type="text/css" href="css/ghpages-materialize.css"/>
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
  <nav class="deep-purple">
    <div class="nav-wrapper">
      <a href="#" data-activates="slide-out" class="button-collapse left"><i class="material-icons">menu</i></a>
      <a href="#" class="brand-logo center" style="display: inline;">About Us</a>
          <a href="logout.php" style="padding-right: 20px;" class="right">Log Out</a>
    </div>
  </nav>
</header>
<main>
    <div class="container"> 
      <div class="chat"> 
        <div id="chatZone" name="chatZone">
        </div> 
        <form onsubmit="chat.sendMsg(); return false;"> 
          <label for="msg" style="float:left">Message:
          </label> 
          <input type="text" id="msg" name="msg" autofocus="true" placeholder="Type Your Meassage Here" /> 
          <input type="submit" /> 
        </form> 
      </div> 
    </div> 
    <script type="text/javascript" src="chat.js">
    </script> 
          
</main>
</div>
</body>
</html>
