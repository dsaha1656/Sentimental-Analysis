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
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="js/progresscircle.js"></script>
	<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['POSITIVE',     11],
          ['NEGATIVE',  7],
          ['NUTRAL',      9],
        ]);

        var options = {
          title: 'Round Two Score',
          is3D: true,
          //legend:'none',
          width: '100%',
	      height: '100%',
	      chartArea: {
	          left: "0",
	          top: "0",
	          height: "100%",
	          width: "100%"
        	}
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
	<script type="text/javascript">
		$(function(){
			$('.circlechart').circlechart();
			$('.modal').modal();
			$('#modal2').modal('open');
  			 $('.materialboxed').materialbox();
  			$('input').click(function(){
  				$(this).next().next().removeClass('hide');
  			});
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
      <a href="logout.php" style="padding-right: 0.1px;" class="right">Log Out</a>
    	</div>
	</nav>
</header>
<main>
	<div class="container" style="margin-top: 15px;" id="playGround">
     <!-- Modal Trigger -->
  <a class="waves-effect waves-light btn modal-trigger" id="clickme" href="#modal1">Modal</a>

  <!-- Modal Structure -->
  <div id="modal1" class="modal" 
  style="
    top: 1px;
    width: 100%;
    max-height: 100%;">
    <div class="modal-content card">
    <div class="card-content">
    	
    <div class="row">
      <h4 class="col s11">Modal Header</h4>
      <a href="#!" class="center col s1 modal-action modal-close waves-effect waves-green btn-flat red"><i class="material-icons">close</i></a>    </div>
      <div class="row">
      	<div class="col s12">
      		<span>This is the description part This is the description part This is the description part This is the description part This is the description part This is the description part This is the description part This is the description part This is the description part This is the description part This is the description part This is the description part This is the description part This is the description part This is the description part This is the description part This is the description part This is the description part This is the description part This is the description part This is the description part This is the description part This is the description part This is the description part This is the description part This is the description part This is the description part This is the description part This is the description part </span>
      	</div>
      	<div class="col s12">
      		 <img class="materialboxed" width="100%" src="Rounds/tasks/220501-Gordon-B-Hinckley-Quote-Cultivate-an-attitude-of-happiness.jpg">
      	</div>
      </div>
    </div>
    <div class="modal-footer">
    </div>
    </div>
  </div>  
   <!-- Modal Structure -->
  <div id="modal2" class="modal" 
  style="
    top: 1px;
    width: 100%;
    max-height: 100%;">
    <div class="modal-content card">
    <div class="card-content">
    	
    <div class="row">
      <h4 class="col s11">Modal Header</h4>
      <a href="#!" class="center col s1 modal-action modal-close waves-effect waves-green btn-flat red"><i class="material-icons">close</i></a>    </div>
      <div class="row">
      	<div class="col s12 m12 l12 card" style="background-color: #fff;">
      		<div class="card-content">
            <div id="piechart"></div>
          </div>
        </div>
      	</div>
      	<div class="col s12">
      		<div class="card green accent-2">
      			<div class="card-content">
      			<span>You Are this kind of person</span>
      			</div>
      		</div>
      	</div>
      	<div class="col s6">
      		<div class="card">
      			<div class="card-content">
      			<h5><b>Answer analysis by your submission</b></h5>
      			<hr>
      			<p>Commutative to work <b>HIGH</b></p>
      			<hr>
      			<p>Risk Taking Campability <b>HIGH</b></p>
      			<hr>
      			<p>Goal setting Campability <b>HIGH</b></p>
      			<hr>
      			<p>Self Confidence <b>HIGH</b></p>
      			<hr>
      			</div>
      		</div>
      	</div>
      	<div class="col s6">
      		<div class="card">
      			<div class="card-content">
      				<h5><b>Suggested Tasks</b></h5>
      				<p>Choose tasks from list</p>
      				 <hr>
      				 <p>
				      <input type="checkbox" name="taskgroup" id="taskone" />
				      <label for="taskone">Task number one</label>
				      <a class="hide waves-effect waves-light btn right"><i class="material-icons">send</i></a>
				    </p>
				    <br>
				    <hr>
      				 <p>
				      <input type="checkbox" name="taskgroup" id="tasktwo" />
				      <label for="tasktwo">Task number two</label>
				      <a class="hide waves-effect waves-light btn right"><i class="material-icons">send</i></a>
				    </p>
				    <br>
				    <hr>
      				 <p>
				      <input type="checkbox" name="taskgroup" id="taskthree" />
				      <label for="taskthree">Task number three</label>
				      <a class="hide waves-effect waves-light btn right"><i class="material-icons">send</i></a>
				    </p>
				    <br>
				    <hr>
      			</div>
      		</div>
      	</div>
      </div>
    </div>
    <div class="modal-footer">
    </div>
    </div>
  </div> 
    </div>
</main>
</body>
</html>