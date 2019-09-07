<?php 
include "../conf.php";
include "../functions.php";
if (!login()) {
  header("location:../");
  die();
}
$type=321;
if (isset($_SESSION['tweets']) && $_SESSION['testType']=="twitter") {
  $type=332;
  unset($_SESSION['testType']);
  $strings=$_SESSION['tweets'];
}
else if(!empty($_POST['1']) && !empty($_POST['2']) && !empty($_POST['3']) && !empty($_POST['4']) && !empty($_POST['5']) && !empty($_POST['6']) && !empty($_POST['7']) && !empty($_POST['8']) && !empty($_POST['9']) && !empty($_POST['10'])) {
  $type=332;
  $strings=$_POST;
	$one = $_POST['1'];
	$two =$_POST['2'];
	$three =$_POST['3'];
	$four =$_POST['4'];
	$five =$_POST['5'];
	$six =$_POST['6'];
	$seven =$_POST['7'];
	$eight =$_POST['8'];
	$nine =$_POST['9'];
	$ten =$_POST['10'];
  $email = $_SESSION['email'];
	$notification = $_SESSION['notification'];
	$q = "SELECT * from answers_one where email='$email'";
	$q = mysqli_query($dataBase['connection'],$q);
	if (mysqli_num_rows($q)<1) {
    $q = "INSERT into notifications(email,title,body) values('$email','Round One Completed', 'You Have sucreessfully completed round One and now Round Two is open for you')";
    mysqli_query($dataBase['connection'],$q);
		$q = "INSERT into answers_one(email,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10) values('$email','$one','$two','$three','$four','$five','$six','$seven','$eight','$nine','$ten')";
		mysqli_query($dataBase['connection'],$q);
    $notification=$notification+1;
		$q = "UPDATE Client_Users SET round='2', notification='$notification'  where email='$email'";
		mysqli_query($dataBase['connection'],$q);
   // header("location:../");
	}
	else {
		$q = "UPDATE answers_one SET email='$email',q1='$one',q2='$two',q3='$three',q4='$four',q5='$five',q6='$six',q7='$seven',q8='$eight',q9='$nine',q10='$ten' where email='$email'";
		mysqli_query($dataBase['connection'],$q);
   // header("location:../");
	}
}

$q = "SELECT roundOne from questions LIMIT 10";
$q = mysqli_query($dataBase['connection'], $q);
$products=array();
for ($i=0; $row=mysqli_fetch_array($q) ; $i++) {
  $products[]=$row;
}
if (!empty($strings)) {
  include 'sentiment.php';
  $sentiment = new \PHPInsight\Sentiment();
  $report=array();
  foreach ($strings as $key => $value) {
    $report[]=array($value,typeofperson($sentiment->categorise($value)));
  }
  $reportData=analyzeString($report);
  $mindC=personality($reportData[0],$reportData[1],$reportData[2]);
  $tasks = genarateTasks($mindC,"roundOne");
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
	<link rel="stylesheet" type="text/css" href="css/1.css"/>
	<link rel="stylesheet" type="text/css" href="css/materialize-stepper.min.css"/>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/1.js"></script>
	<script type="text/javascript" src="js/jquery.cookie.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>	
	<script type="text/javascript" src="js/materialize-stepper.min.js"></script>	
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['POSITIVE',     <?php echo $reportData[0]; ?>],
          ['NEGATIVE',  <?php echo $reportData[1]; ?>],
          ['NUTRAL',      <?php echo $reportData[2]; ?>],
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
    $(function(){
      <?php 
        if (!empty($strings)) {
          echo "$('.modal').modal();
            $('#modal2').modal('open');";
        }
      ?>
       $('input').click(function(){
          $(this).next().next().removeClass('hide');
        });
    })
    </script>
    
  <style type="text/css">
    .ScrollStyle
    {
        max-height: 250px;
        overflow-y: scroll;
    }
  </style>

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
    <li><a href="../dashboard.php" class="waves-effect waves-light homeButton"><i class="material-icons">home</i>Dashboard</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
    <li><a href="../progress.php" class="waves-effect waves-light"><i class="material-icons">show_chart</i>Progress</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
    <li><a href="../profile.php" class="waves-effect waves-light"><i class="material-icons">person_pin</i>Profile</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
    <li><a href="../notification.php" id="close" class="waves-effect waves-light"><i class="material-icons">notifications</i>
<?php 
      if ($_SESSION['notification']!=0) {
        echo '<span class="new badge">'.$_SESSION['notification'].'</span>';
      }
    ?>
    Notification</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
    <li><a href="motivation.php" class="waves-effect waves-light"><i class="material-icons">flare</i>Motivation Corner</a></li>
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
			        <img src="unnamed.jpg">
			    </div>
			    <a href="#!user"><img class="circle" src="unnamed.jpg"></a>
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
		<li><a href="../notification.php" id="close" class="waves-effect waves-light"><i class="material-icons">notifications</i>
<?php 
      if ($_SESSION['notification']!=0) {
        echo '<span class="new badge">'.$_SESSION['notification'].'</span>';
      }
    ?>
    Notification</a></li>

		<li><div class="divider" style="margin: 8px;"></div></li>
    <li><a href="motivation.php" class="waves-effect waves-light"><i class="material-icons">flare</i>Motivation Corner</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
		<li><a href="../feedback.php" id="close" class="waves-effect waves-light"><i class="material-icons">feedback</i>Feedback</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
     <li><a href="../aboutus.php" class="waves-effect waves-light"><i class="material-icons">sentiment_very_satisfied</i>About Us</a></li>
    <li><div class="divider" style="margin: 8px;"></div></li>
	</ul>
	<nav class="slider-adjustment brown">
		<div class="nav-wrapper">
			<a href="#" data-activates="slide-out" class="button-collapse left"><i class="material-icons">menu</i></a>
			<a href="#" class="brand-logo center" style="display: inline;">Round-1</a>
      		<a href="../logout.php" style="padding-right: 20px;" class="right">Log Out</a>
		</div>
	</nav>
</header>
<main>
  <div class="container">
  <div class="section"></div>
<div class="stepwizard col-md-offset-3">
    <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
      
      </div>
      <?php
        for ($i=2; $i <= 10; $i++) { 
           echo '<div class="stepwizard-step">
        <a href="#step-'.$i.'" type="button" class="btn btn-default btn-circle" disabled="disabled">'.$i.'</a>
        </div>';
         } 
      ?>

      <div class="stepwizard-step">
        <a href="#step-11" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="material-icons">check</i></a>
      </div>
    </div>
  </div>
  
  <div class="section"></div>
  <form role="form" action="one.php" method="post">
    <?php
    for($i=0; $i<10; $i++) {
      $value=$i+1;
        echo '<div class="row setup-content" id="step-'.$value.'">
                <div class="col-xs-6 col-md-offset-3">
                  <div class="col-md-12">
                    <h5>'.$products[$i][0].'</h5>
                    <div class="form-group">
                      <input type="text" required="required" name="'.$value.'" class="form-control" placeholder="Answer">
                    </div>

  <div class="section"></div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                  </div>
                </div>
              </div>';
    } 
    ?>
    <div class="row setup-content" id="step-11">
      <div class="col-xs-6 col-md-offset-3">

  <div class="section"></div>
        <div class="col-md-12">
          <h5>Thanks For Giving Test. Please Submit it for reaching to the Next Level</h5>
          
  <div class="section"></div>
          <button class="btn btn-success btn-lg pull-right" type="submit">Submit</button>
        </div>
      </div>
    </div>
  </form>

    <div id="modal2" class="modal" 
  style="
    top: 1px;
    width: 100%;
    max-height: 100%;">
    <div class="modal-content card">
    <div class="">
      
    <div class="row">
      <h4 class="col s11">Personality Test Result</h4>
      <a href="#!" class="center col s1 modal-action modal-close waves-effect waves-green btn-flat red"><i class="material-icons">close</i></a>    </div>
      <div class="row">
        <div class="col s12 card" style="background-color: #fff;">
          <div class="card-content">
            <div id="piechart"></div>
          </div>
        </div>
        <div class="col s12">
          <div class="card green accent-2">
            <div class="card-content">
            <?php if($mindC=="POSITIVE"){echo "YOU ARE ".$mindC." MINDED PERSON";} ?>
            </div>
          </div>
        </div>
        <div class="col s12">
          <div class="card">
            <div class="card-content ScrollStyle">
              <h5><b>Detailed Analysis</b></h5>
               <table class="striped">
                  <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Sentence</th>
                        <th>Emotion</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if ($type==332) {
                    $i=1;
                      foreach ($report as $key => $value) {
                        echo '<tr>
                              <td>'.$i++.'</td>
                              <td>'.$value[0].'</td>
                              <td>'.$value[1].'</td>
                            </tr>';
                      }
                    }
                    ?>
                  </tbody>
                </table>
            </div>
          </div>
        </div>
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <h5><b>Suggested Tasks</b></h5>
              <p>Choose tasks from list</p>
               <?php
               if ($type==332) {
                foreach ($tasks as $key => $value) {
                 echo '
                     <p>
                    <input type="checkbox" name="taskgroup" id="task'.$value['id'].'" />
                    <label for="task'.$value['id'].'"">'.$value['taskname'].'</label>
                    <a class="hide waves-effect waves-light btn modal-trigger right" href="#taskmodal'.$value['id'].'"><i class="material-icons">send</i></a>
                  </p>
                  <br>
                  <hr>';
                  } 
                }
               ?>
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
<?php 
if ($type==332) {
  
       foreach ($tasks as $key => $value) {
                 echo '<div id="taskmodal'.$value['id'].'" class="modal" 
            style="
              top: 1px;
              z-index:1005;
              width: 100%;
              max-height: 100%;">
              <div class="modal-content card">
              <div class="card-content">
                
              <div class="row">
                <h4 class="col s11">'.$value['taskname'].'</h4>
                <a href="#!" class="center col s1 modal-action modal-close waves-effect waves-green btn-flat red"><i class="material-icons">close</i></a>    </div>
                <div class="row">
                  <div class="col s12">
                    <span>'.$value['taskbody'].'</span>
                  </div>
                  <div class="col s12">
                     <img class="materialboxed" width="100%" src="'.$value['taskimage'].'">
                  </div>
                <div class="col s12" style="padding-top: 12px;">
              <a class="waves-effect waves-light btn right" href="../genarateTasks.php?id='.$value['id'].'&email='.$_SESSION['email'].'&flag=12"><i class="material-icons right">send</i>START</a></div>
              </div>
                </div>
              <div class="modal-footer">
              </div>
              </div>
            </div>';
               }
}
  ?>
</div>
</body>
</html>