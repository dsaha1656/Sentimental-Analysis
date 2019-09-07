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
			<a href="#" class="brand-logo center" style="display: inline;">About Us</a>
      		<a href="logout.php" style="padding-right: 20px;" class="right">Log Out</a>
		</div>
	</nav>
</header>
<main>
	
	<div class="container">
	<ul class="collapsible popout" data-collapsible="accordion">
    <li>
      
      	<div class="collapsible-header"><h5 class="center-align"><font color="blue"><span  style  ="font-family:serif;  "><span style="font-weight:bold; ">MEET THE TEAM</span></span></font></h5>

      	</div>
      <div class="collapsible-body"><span>We are a Team of Computer Science & Engineering students from Dream Institute of technology,Kolkata.</span></div>
    </li>
    <li>
      <div class="collapsible-header"><h5 class="center-align"><font color="blue"><span  style  ="font-family:serif;  "><span style="font-weight:bold; ">WE ARE MIND PAINTERS</span></span></font></h5>

      </div>
      <div class="collapsible-body"><span>MindScripts is a prompt approach towards a universal solution for the problem – how to incorporate a Good Mind Education in our Education system , Education should make a person more knowledgeable and a better person with positive views .</span></div>
    </li>
  <li>
      <div class="collapsible-header"><h5 class="center-align"><font color="blue"><span  style  ="font-family:serif;  "><span style="font-weight:bold; ">FAQ</span></span></font></h5>

      </div>
      <div class="collapsible-body"><span>1. WHO WE ARE?<br>We are” MINDPAINTERS” & we are here to help you out with the conflicts of your mind. We will try to give you solution related to your problem with some motivational quotes and some videos related to it.<hr><br>2.WHAT DEVICES SUPPORT OUR APP?<br>	It supports all the android platform & its min. requirement is – 4.4 (KITKAT).<hr><br>3. IN WHAT WAY WILL IT HELP ME?<br>	It will help you to enjoy your life and you can live it in a better way.<hr><br>4. WHAT IS THE PROCEDURE TO GET STARTED WITH THIS APP?<br>	A. User have to register him/her-self
	B. Then login
	C.Then follow the following steps.<hr><br>5. HOW ARE REASOING MIND’S PROGRAM DIFFERENT THAN OTHER ONLINE MATHS PROGRAM?<br>
</span></span></div>
    </li>
  </ul>
</div>
        <script type="text/javascript">
        	$(function(){
        		$('.collapsible').collapsible();
        	})
        </script>         	
</main>
</div>
</body>
</html>
