<?php
include "conf.php";
include "functions.php";
if (!login()) {
  header("location:./");
die();
}
if (isset($_FILES['proof'])) {
  if ($_FILES['proof']['error']==0) {
    $email=$_SESSION['email'];
    $temmpname= $_FILES["proof"]['tmp_name'];
    $up= $_SESSION['email']."one.jpg";
    $upload_dir="./proof";
    move_uploaded_file($temmpname, $upload_dir."/".$up);
    $q = "UPDATE Client_Users SET photo='$up' where email='$email'";
    $q = mysqli_query($dataBase['connection'], $q);
    $q = "UPDATE Client_Users SET lockflag='0', round='2'  where email='$email'";
    $q = mysqli_query($dataBase['connection'], $q);
    }
}
// http://mindscript.tk/genarateTasks.php?id=96&&email=d.denger@hotmail.com&&flag=12
$id=$_GET['id'];
$email=$_GET['email'];
$flag=$_GET['flag'];
if ($flag==4242424) {
	$email=$_SESSION['email'];
	$q = "UPDATE Client_Users SET lockflag='0'  where email='$email'";
	$q = mysqli_query($dataBase['connection'], $q);
}
if (empty($id)) {
	header("location:./");
	die();
}
else {
	if ($flag==12) {
		$q = "UPDATE Client_Users SET lockflag='1', task='$id'  where email='$email'";
		$q = mysqli_query($dataBase['connection'], $q);
	}
$q = "SELECT * from detailstasks where id='$id'";
$q = mysqli_query($dataBase['connection'], $q);
$task=mysqli_fetch_array($q);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Task</title>

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
  <script type="text/javascript">
    $(function(){
    
    // Don't submit form if either field is empty
    $('form').submit(function(){
    if($('#1').val() == ""){
        return false;
    }
    });
});
  </script>
</head>
<body>
<div id="contentiner">
<div class="progress" id="progressbar">
      <div class="indeterminate"></div>
  </div>
<div id="modal2" class="card" 
  style="
    top: 1px;
    width: 100%;
    max-height: 100%;">
    <?php 
    	echo '<div class="card-content">
     
    <div class="row">
      <h4 class="col s9">'.$task['taskname'].'</h4>
      <a href="?flag=4242424" class="center col s3 modal-action modal-close waves-effect waves-green btn-flat red"><i class="material-icons">exit_to_app</i>Exit Task</a>    </div>
      <div class="row">
        <div class="col s12">
            <span>'.$task['taskbody'].'</span>
        </div>
        <div class="col s12">
            <img class="materialboxed" width="100%" src="Rounds/'.$task['taskImage'].'">
        </div>
        <div class="col s12">
                    <span>'.$task['taskbody2'].'</span>
        </div>
        <div class="col s12">
            <span>'.$task['taskbody3'].'</span>
        </div>
        <div class="col s12">
            <span>'.$task['taskbody4'].'</span>
        </div>
        <div class="col s12">
            <span>'.$task['taskVideo'].'</span>
        </div>
        <div class="col s12">
          <form id="formNode" action="genarateTasks.php" method="POST"  enctype="multipart/form-data">
              <input type="file" isReq="true" name="proof" accept="image/*" id="1"/>
              <input type="submit" value="Submit" id="submit"/>
          </form>
        </div>	
  </div>
  </div>';
     ?> 
  </div>
</body>
</html>