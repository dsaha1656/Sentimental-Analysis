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
    <li><a href="notification.php" id="close" class="waves-effect waves-light"><i class="material-icons">notifications</i>Notification</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
     <li><a href="aboutus.php" class="waves-effect waves-light"><i class="material-icons">flare</i>Motivation Corner</a></li>
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
			<style>
body {
 font-family: 'Merienda';font-size: 20px;

}
</style>
			<a href="motivation.php" class="brand-logo center" style="display: inline;">Motivation Corner</a>
      <a href="logout.php" style="padding-right: 0.1px;" class="right">Log Out</a>
    	</div>
	</nav>
</header>
<main>
	<div class="row">
        <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image">
              <img src="1.jpg">
              </div>
            <div class="card-content">
            	<div class="card light-blue darken-2 center">
            <div class="card-content white-text">
              <p><font size="+2" center > Health is Wealth</p>
            </div>

            <div class="card-action">
              <a href="./Motivations/health.php">More</a>

            </div>
          </div>
        </div>
     </div>
 </div>
 <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image">
              <img src="2.jpg">
            
              </div>
            <div class="card-content">
            	<div class="card light-blue darken-2 center">
            <div class="card-content white-text">
              <p><font size="+2" center >Yoga Heals The Souls</p>
            </div>

            <div class="card-action">
              <a href="./Motivations/yoga.php">More</a>

            </div>
          </div>
        </div>
     </div>
 </div>
 <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image">
              <img src="3.jpg">
            
              </div>
            <div class="card-content">
            	<div class="card light-blue darken-2 center">
            <div class="card-content white-text">
              <p><font size="+2" center >Be Happy</p>
            </div>

            <div class="card-action">
              <a href="./Motivations/happy.php">More</a>

            </div>
          </div>
        </div>
     </div>
 </div>
 <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image">
              <img src="4.jpg">
            
              </div>
            <div class="card-content">
            	<div class="card light-blue darken-2 center">
            <div class="card-content white-text">
              <p><font size="+2" center >Never, never, never give up</p>
            </div>

            <div class="card-action">
              <a href="./Motivations/positive.php">More</a>

            </div>
          </div>
        </div>
     </div>
 </div>
 <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image">
              <img src="5.jpg">
            
              </div>
            <div class="card-content">
            	<div class="card light-blue darken-2 center">
            <div class="card-content white-text">
              <p><font size="+2" center >Believe in yourself!</p>
            </div>

            <div class="card-action">
              <a href="./Motivations/confidence.php">More</a>

            </div>
          </div>
        </div>
     </div>
 </div>
 <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image">
              <img src="6.jpg">
            
              </div>
            <div class="card-content">
            	<div class="card light-blue darken-2 center">
            <div class="card-content white-text">
              <p><font size="+2" center >Cultivating a success mindset</p>
            </div>

            <div class="card-action">
              <a href="./Motivations/student success.php">More</a>

            </div>
          </div>
        </div>
     </div>
 </div>
 <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image">
              <img src="7.jpg">
            
              </div>
            <div class="card-content">
            	<div class="card light-blue darken-2 center">
            <div class="card-content white-text">
              <p><font size="+2" center >Creativity takes courage</p>
            </div>

            <div class="card-action">
              <a href="./Motivations/courage.php">More</a>

            </div>
          </div>
        </div>
     </div>
 </div>
 <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image">
              <img src="8.jpg">
            
              </div>
            <div class="card-content">
            	<div class="card light-blue darken-2 center">
            <div class="card-content white-text">
              <p><font size="+2" center >Peace is the beauty of life</p>
            </div>

            <div class="card-action">
              <a href="./Motivations/lifelesson.php">More</a>

            </div>
          </div>
        </div>
     </div>
 </div>
 <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image">
              <img src="9.jpg">
            
              </div>
            <div class="card-content">
            	<div class="card light-blue darken-2 center">
            <div class="card-content white-text">
              <p><font size="+2" center >Family is everything</p>
            </div>

            <div class="card-action">
              <a href="./Motivations/family.php">More</a>

            </div>
          </div>
        </div>
     </div>
 </div>
 <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image">
              <img src="10.jpg">
            
              </div>
            <div class="card-content">
            	<div class="card light-blue darken-2 center">
            <div class="card-content white-text">
              <p><font size="+2" center >Nothing comes easy</p>
            </div>

            <div class="card-action">
              <a href="./Motivations/relationship.php">More</a>

            </div>
          </div>
        </div>
     </div>
 </div>
 <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image">
              <img src="11.jpg">
            
              </div>
            <div class="card-content">
            	<div class="card light-blue darken-2 center">
            <div class="card-content white-text">
              <p><font size="+2" center >Pain changes people</p>
            </div>

            <div class="card-action">
              <a href="./Motivations/depression.php">More</a>

            </div>
          </div>
        </div>
     </div>
 </div>
 <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image">
              <img src="12.jpeg">
            
              </div>
            <div class="card-content">
            	<div class="card light-blue darken-2 center">
            <div class="card-content white-text">
              <p><font size="+2" center >Face Your Fears</p>
            </div>

            <div class="card-action">
              <a href="./Motivations/fear.php">More</a>

            </div>
          </div>
        </div>
     </div>
 </div>
 <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image">
              <img src="13.jpg">
            
              </div>
            <div class="card-content">
            	<div class="card light-blue darken-2 center">
            <div class="card-content white-text">
              <p><font size="+2" center >Courage, above all things, is the first quality of a warrior</p>
            </div>

            <div class="card-action">
              <a href="./Motivations/warrior.php">More</a>

            </div>
          </div>
        </div>
     </div>
 </div>
 <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image">
              <img src="14.jpg">
            
              </div>
            <div class="card-content">
            	<div class="card light-blue darken-2 center">
            <div class="card-content white-text">
              <p><font size="+2" center >If you can DREAM it, you can DO it</p>
            </div>

            <div class="card-action">
              <a href="./Motivations/career.php">More</a>

            </div>
          </div>
        </div>
     </div>
 </div>
 <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image">
              <img src="15.jpg">
            
              </div>
            <div class="card-content">
            	<div class="card light-blue darken-2 center">
            <div class="card-content white-text">
              <p><font size="+2" center >All money is a matter of belief</p>
            </div>

            <div class="card-action">
              <a href="./Motivations/money.php">More</a>

            </div>
          </div>
        </div>
     </div>
 </div>
          </div>   
</main>
</body>
</html>