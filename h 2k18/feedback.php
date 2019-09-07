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
<style>
.rating {
  unicode-bidi: bidi-override;
  direction: rtl;
  text-align: center;
}
.rating > span {
  display: inline-block;
  position: relative;
  width: 1.1em;
}
.rating > span:hover,
.rating > span:hover ~ span {
  color: transparent;
}
.rating > span:hover:before,
.rating > span:hover ~ span:before {
   content: "\2605";
   position: absolute;
   left: 0; 
   color: gold;
}


</style>

	<style>
body {
 font-family: 'Merienda';font-size: 20px;

}
</style>


	<title>MindScript</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
			<a href="#" class="brand-logo center" style="display: inline;">Feedback</a>
      		<a href="logout.php" style="padding-right: 20px;" class="right">Log Out</a>
		</div>
	</nav>
</header>
<main>
	<div class="container">
		<div>
			<br>
		    <h5 class="center-align"><font size="6" color="red"><b>TEAM MIND PAINTERS</font></h5>
 <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12">
        	<h4><center>Please Give Your Valuable Feedback!</h4>
          <textarea id="textarea1" class="materialize-textarea"></textarea>
          <label for="textarea1">    </label>
          <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <button class="btn waves-effect waves-light" type="submit" name="action">Submit
    <i class="material-icons right">send</i>


        </div>

  <h1><center>Rate Us Now!</h1>

  <div class="rating">
<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>

</main>

<!--fieldset class="rating">
    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
</fieldset>
      </div>
    </form>
  
  
  
  
</main>
</body>
  
</html>