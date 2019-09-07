<?php 
include "conf.php";
include "functions.php";
if (!login()) {
  header("location:./");
die();
}
if ($_SESSION['lockflag']==1) {
  $q="location:./genarateTasks.php?id=".$_SESSION['task'];
  header($q);
}
$q = $_SESSION['round'];
$q = "SELECT * FROM rounds order by id limit $q";
$q=mysqli_query($dataBase['connection'], $q);
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
	<link rel="stylesheet" href="css/progresscircle.css">
<script src="js/progresscircle.js"></script>
	<script type="text/javascript">
		$(function(){
			$('.circlechart').circlechart();
			$('.modal').modal();
		})
	</script>	

</head>
<body>
<div class="progress" id="progressbar">
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
			        <img src="mindscript.jpg">
			    </div>
			    <a href="#!user"><img class="circle" src="mindscript.jpg"></a>
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
			<a href="#" class="brand-logo center" style="display: inline;"> Dashboard</a>
      <a href="logout.php" style="padding-right: 5px;" class="right">Log Out</a>
      <a href="add.php" style="padding-right: 5px;" class="right"><i class="material-icons">person_add</i></a>
    	</div>
	</nav>
</header>
<main>
	<div class="container" style="margin-top: 15px;" id="playGround">
      <div class="row">
      <div class="col s12">
      	<div class="card blue-grey darken-1 center">
            <div class="card-content white-text">
              <span class="card-title">Overall Progress : <?php echo (floor(($_SESSION['round']-1)/6*100))?>%</span>
              <div class="circlechart" <?php echo ('data-percentage="'.floor(($_SESSION['round']-1)/6*100)).'"'?>></div>
            </div>
          </div>
      </div>
      <?php 
      foreach ($q as $key => $value) {
            echo '<div class="col s12 m6 l4">
          <div class="card orange accent-3">
            <div class="card-content white-text">
              <span class="card-title center"><span style="font-weight:bold; ">'.$value["name"].'</span> </span>
              <p class="center"> <span  style  ="font-family:serif;  "> <font size="+2">'.$value["head"].'</font>  </span>  <br/> '.$value["comment"].' </p>

            </div>
            
            <div class="card-action deep-purple darken-3" style="color:#ffab40">
              <a href="'.$value["url"].'" class="modal-trigger ">TAKE TEST</a>
              <a href="'.$value["url"].'" class="modal-trigger ">PREVIOUS RESULT</a>
            </div>
            
          </div>
        </div>';
          }
      ?>
      </div>

  <!-- Modal Structure -->
  <div id="round1" class="modal">
    <div class="modal-content card">
    <div class="card-content">
    	
    <div class="row">
      <h4 class="col s11">Select Your Test Type</h4>
      <a href="#!" class="center col s1 modal-action modal-close waves-effect waves-green btn-flat red"><i class="material-icons">close</i></a>    </div>
      <div class="row">
      	<div class="col s6">
      		<div class="card">
      			<div class="card-content">
      			<a href="Rounds/one.php" class="row"><i class="large material-icons" class="col s12">border_color</i><h6 class="col s10"></h6></a>
      			</div>
      		</div>
      	</div>
      	<div class="col s6">
      		<div class="card">
      			<div class="card-content">
      			<a href="twitter" class="row"><img class="col s12" width="50%" src="twitter.png"><h6 class="col s10"></h6></a>
      			</div>
      		</div>
      	</div>
      </div>
    </div>
    </div>
  </div>  
      <script type="text/javascript">
var LHCChatOptions = {};
LHCChatOptions.opt = {widget_height:340,widget_width:300,popup_height:520,popup_width:500};
(function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
var referrer = (document.referrer) ? encodeURIComponent(document.referrer.substr(document.referrer.indexOf('://')+1)) : '';
var location  = (document.location) ? encodeURIComponent(window.location.href.substring(window.location.protocol.length)) : '';
po.src = '//mindscript.tk/lhc_web/index.php/chat/getstatus/(click)/internal/(position)/bottom_right/(ma)/br/(top)/350/(units)/pixels/(leaveamessage)/true?r='+referrer+'&l='+location;
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
</script>
      </div>
</main>
</body>
</html>