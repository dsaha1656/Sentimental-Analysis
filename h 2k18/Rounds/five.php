<?php 
include "../conf.php";
include "../functions.php";
if (!login()) {
  header("location:http://mindscript.tk/");
  die();
}
if (isset($_POST['group1']) && isset($_POST['group2']) && isset($_POST['group3']) && isset($_POST['group4']) && isset($_POST['group5']) && isset($_POST['group6']) && isset($_POST['group7']) && isset($_POST['group8']) && isset($_POST['group9']) && isset($_POST['group10'])) {
  $one = $_POST['group1'];
  $two =$_POST['group2'];
  $three =$_POST['group3'];
  $four =$_POST['group4'];
  $five =$_POST['group5'];
  $six =$_POST['group6'];
  $seven =$_POST['group7'];
  $eight =$_POST['group8'];
  $nine =8-$_POST['group9'];
  $ten =$_POST['group10'];
  $email = $_SESSION['email'];
  $notification = $_SESSION['notification'];
  $pre=percentage(($one+$four+$five+$six+$nine)/5,7,1);
  $sea=percentage(($two+$three+$seven+$eight+$ten)/5,7,1);
  $correc=percentage(correct(18+$twentyFive+$twentyOne-$twentyTwo-$twentyThree-$twentyFour),19,5);
   $negative=($pre+$sea)/2;
    $q = "INSERT into notifications(email,title,body) values('$email','Your Score for Round Five', 'presenceOfMeaning = $pre<br>searchForMeanning = $sea')";
    mysqli_query($dataBase['connection'],$q);
    $q = "UPDATE records SET pre='$spre', sea='$sea' where email='$email'";
mysqli_query($dataBase['connection'],$q);
  //suggetion($email,"pre",PR($pre));
  //suggetion($email,"sea",SE($sea));

  $q = "SELECT * from answers_five where email='$email'";
  $q = mysqli_query($dataBase['connection'],$q);
  if (mysqli_num_rows($q)<1) {
    $q = "INSERT into answers_five(email,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10) values('$email','$one','$two','$three','$four','$five','$six','$seven','$eight','$nine','$ten')";
    mysqli_query($dataBase['connection'],$q);
    $q = "INSERT into notifications(email,title,body) values('$email','Round Five Completed', 'You Have sucreessfully completed Round Five and now Round Six is open for you')";
    mysqli_query($dataBase['connection'],$q);
    $q = "INSERT into notifications(email,title,body) values('$email','Your Score for Round Five', 'Presence Of Meanning = $pre<br>Search For Meanning = $sea')";
    mysqli_query($dataBase['connection'],$q);
    $notification=$notification+2;
    $q = "UPDATE Client_Users SET round='6', notification='$notification' where email='$email'";
    mysqli_query($dataBase['connection'],$q);
    $q = "UPDATE records SET presenceOfMeaning='$pre', searchForMeanning='$sea' where email='$email'";
    mysqli_query($dataBase['connection'],$q);
   // header("location:../");
  }
  else {
    $q = "UPDATE records SET presenceOfMeaning='$pre', searchForMeanning='$sea' where email='$email'";
    mysqli_query($dataBase['connection'],$q);
    $q = "UPDATE answers_five SET email='$email',q1='$one',q2='$two',q3='$three',q4='$four',q5='$five',q6='$six',q7='$seven',q8='$eight',q9='$nine',q10='$ten' where email='$email'";
    mysqli_query($dataBase['connection'],$q);
    $q = "INSERT into notifications(email,title,body) values('$email','Your Score for Round Five', 'Presence Of Meanning = $pre<br>Search For Meanning = $sea')";
    mysqli_query($dataBase['connection'],$q);
    $notification=$notification+1;
    $q = "UPDATE Client_Users SET notification='$notification' where email='$email'";
    mysqli_query($dataBase['connection'],$q);
   // header("location:../");
  }
   $type=332;//this is new
  $tasks = genarateTasks(personality($Presence,$negative,100-$correc),'roundFive');
}
$q = "SELECT roundFive from questions LIMIT 10";
$q = mysqli_query($dataBase['connection'], $q);
$products=array();
for ($i=0; $row=mysqli_fetch_array($q) ; $i++) {
  $products[]=$row;
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
  <script type="text/javascript" src="js/5.js"></script>
  <script type="text/javascript" src="js/jquery.cookie.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>  
  <script type="text/javascript" src="js/materialize-stepper.min.js"></script>  
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> <!--this is new-->
  <!--this is new-->
<script type="text/javascript"> 
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['POSITIVE',     <?php echo($pre); ?>],
          ['NEGATIVE',  <?php echo($sea); ?>],
          ['NUTRAL',      <?php echo(100-$correc); ?>],
        ]);

        var options = {
          title: 'Round Five Score',
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
<!--this is new--> 
 <script type="text/javascript">
    $(function(){
      $('.modal').modal();
      $('#modal1').modal('open');
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
      <a href="#" class="brand-logo center" style="display: inline;">Round-5</a>
          <a href="../logout.php" style="padding-right: 20px;" class="right">Log Out</a>
    </div>
  </nav>
</header>
<main>
  <div class="container">
  <div class="stepwizard col-md-offset-3" style="margin-left: -10px;">
    <div class="stepwizard-row setup-panel row">
      <div class="stepwizard-step col s1">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
      
      </div>
      <?php
        for ($i=2; $i <= 10; $i++) { 
           echo '<div class="stepwizard-step col s1">
        <a href="#step-'.$i.'" type="button" class="btn btn-default btn-circle" disabled="disabled">'.$i.'</a>
        </div>';
         } 
      ?>
<div class="stepwizard-step col s1">
        <a href="#step-11" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="material-icons">check</i></a>
        
      </div>
    </div>
  </div>

  
  <form role="form" action="five.php" method="post">
    <?php 
      for ($i=1; $i <=10 ; $i++) {
        echo '<div class="row setup-content" id="step-'.$i.'">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
          <h5>'.$products[$i-1][0].'</h5>
       
          <div required="required" class="form-group">
            <p>
          <input name="group'.$i.'" class="with-gap" value="1" type="radio" id="testA'.$i.'" />
          <label for="testA'.+$i.'">Absolutely Untrue</label>
        </p>
        <p>
          <input class="with-gap" name="group'.$i.'" value="2" type="radio" id="testB'.$i.'" />
          <label for="testB'.$i.'">Mostly Untrue</label>
        </p>
        <p>
          <input class="with-gap" name="group'.$i.'" value="3" type="radio" id="testC'.$i.'"  />
          <label for="testC'.$i.'">Somewhat Untrue</label>
        </p>
        <p>
          <input name="group'.$i.'" type="radio" value="4" class="with-gap" id="testD'.$i.'" />
          <label for="testD'.$i.'">Can\'t Say True or False</label>
        </p>
         <p>
          <input name="group'.$i.'" type="radio" value="5" class="with-gap" id="testE'.$i.'" />
          <label for="testE'.$i.'">Somewhat True</label>
        </p>
         <p>
          <input name="group'.$i.'" type="radio" value="6" class="with-gap" id="testF'.$i.'" />
          <label for="testF'.$i.'">Mostly True</label>
        </p>
         <p>
          <input name="group'.$i.'" type="radio" value="7" class="with-gap" id="testG'.$i.'" />
          <label for="testG'.$i.'">Absolutely True</label>
        </p>
          </div>
         
          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
        </div>
      </div>
    </div>';
    }
    ?>
    <div class="row setup-content" id="step-11">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
          <h5>Thanks For Giving Test. Please Submit it for reaching to the Next Level! </h5>
          <button class="btn btn-success btn-lg pull-right" type="submit">Submit</button>
        </div>
      </div>
    </div>
  </form>
  <?php //this if else statement is new
    if ($type==332) {
      echo '
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
        <div class="col s12 m12 l12 card" style="background-color: #fff;">
          <div class="card-content">
            <div id="piechart"></div>
          </div>
        </div>
        <div class="col s12">
          <div class="card green accent-2">
            <div class="card-content">
            <span>You Are this kind of person</span>
            </div>
          </div>
        </div>
        <div class="col s12">
          <div class="card">
            <div class="card-content">
            <h5><b>Answer analysis by your submission</b></h5>
            <hr>
            <p>presence Of Meaning ===> <b>'.typeof($pre).'</b></p>
            <hr>
            <p>Search For Meanning  ===> <b>'.typeof($sea).'</b></p>
           
            
            
            </div>
          </div>
        </div>
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <h5><b>Suggested Activities</b></h5>
              <p>Choose tasks from list</p>
               <hr>';
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
            echo '
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
        </div>
        </div>
      </div>  ';
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
              </div>
              <div class="modal-footer">
              </div>
              </div>
            </div>';
               }
    }
  ?>
</div>
</main>
</div>
</body>
</html>