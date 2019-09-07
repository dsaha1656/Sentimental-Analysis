<?php 
include "conf.php";
include "functions.php";
if (!login()) {
  header("location:./");
  die();
}
if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['phone']) && !empty($_POST['password']) ) {
  $fname=$_POST['firstName'];
  $lname = $_POST['lastName'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $email = $_SESSION['email'];
  $q ="UPDATE Client_Users SET firstName='$fname', lastName='$lname', phone='$phone', password='$password' where email = '$email'";
  mysqli_query($dataBase['connection'], $q);
}
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
    <li><a href="notification.php" id="close" class="waves-effect waves-light"><i class="material-icons">notifications</i>
<?php 
      if ($_SESSION['notification']!=0) {
        echo '<span class="new badge">'.$_SESSION['notification'].'</span>';
      }
    ?>
    Notification</a></li>
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
    <li><a href="notification.php" id="close" class="waves-effect waves-light"><i class="material-icons">notifications</i>
<?php 
      if ($_SESSION['notification']!=0) {
        echo '<span class="new badge">'.$_SESSION['notification'].'</span>';
      }
    ?>
    Notification</a></li>
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
      <a href="#" class="brand-logo center" style="display: inline;">Profile</a>
      <a href="logout.php" style="padding-right: 0.1px;" class="right">Log Out</a>
    </div>
  </nav>
</header>
<main>

<div >
  <div class="card">
  <div class="card-image">
              <img src="unnamed.jpg" width="100%">
              <span class="card-title" style="color:white;"><b><?php echo($_SESSION['firstName'].' '.$_SESSION['lastName']);?></b></span>
            </div>
    <div class="card-content">
      <p>Failure will never overtake me if my determination to succeed is strong enough.</p>
    </div>
    <div class="card-tabs">
      <ul class="tabs tabs-fixed-width">
        <li class="tab"><a href="#test4">View</a></li>
        <li class="tab"><a href="#test6">Edit</a></li>
      </ul>
    </div>
    <div class="card-content grey lighten-4">
      <div id="test4">
        <div class="col s12">
          <div class="row">
            <div class="col s12 row">
              <i class="material-icons prefix col s2">account_circle</i>
              <p class="col s10"><?php echo($_SESSION['firstName'].' '.$_SESSION['lastName']);?></p>
            </div>
            <div class="col s12 row">
              <i class="material-icons prefix col s2">phone</i>
              <p class="col s10"><?php echo($_SESSION['phone']);?></p>
            </div>
            <div class="col s12 row">
              <i class="material-icons prefix col s2">email</i>
              <p class="col s10"><?php echo($_SESSION['email']);?></p>
            </div>
            <?php for ($i=1;$i<=6;$i++) {
              $p = ($i>$_SESSION['round']-1)?'close':'check';
              $q = ($i>$_SESSION['round']-1)?'Incomplete':'Completed';
              $r = ($i>$_SESSION['round']-1)?'red':'green';
              echo '<div class="col s12 row">
                      <i class="material-icons prefix col s2">'.$p.'</i>
                      <p class="col s10">Round '.$i.'<span class="new badge '.$r.'" data-badge-caption="'.$q.'"></span></p>
                    </div>';
            }
            ?>
          </div>
        </div>
      </div>
      <div id="test6">
        <form class="col s12" action="profile.php" method="POST">
      <div class="row">
        <div class="input-field col s6">
          <input <?php echo('value="'.$_SESSION['firstName'].'"');?> id="first_name" type="text" class="validate" name="firstName">
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input <?php echo('value="'.$_SESSION['lastName'].'"');?> id="last_name" type="text" class="validate" name="lastName">
          <label for="last_name">Last Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input <?php echo('value="'.$_SESSION['phone'].'"');?>  id="phonen" type="text" class="validate" name="phone">
          <label for="phonen">Phone</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input  disabled="disabled" id="disabled" <?php echo('placeholder="'.$_SESSION['email'].'"');?> type="email" class="validate">
          <label for="disabled">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input <?php echo('value="'.$_SESSION['password'].'"');?> id="password" type="password" name="password" class="validate">
          <label for="password">Change Password</label>
        </div>
      </div>
      <div class="row">
        <div class="col s12">
          <div class="input-field inline">
            <button class="btn waves-effect waves-light" type="submit" >Submit
              <i class="material-icons right">send</i>
            </button>
                
          </div>
        </div>
      </div>
    </form>
      </div>
    </div>
  </div>
</div>
</main>
</div>
</body>
</html>