<?php

session_start();
date_default_timezone_set('Asia/kolkata');

//DATABASE
$dataBase = array(
	'ext' => 'mysqli',
	'host' => 'mindscript.tk:3306',
	'user' => 'nayamasa_mscript',
	'password' => 'passwordisthebesting@007',
	'database' => 'nayamasa_mindscript'
);

//connection
$dataBase['connection'] = mysqli_connect($dataBase['host'],$dataBase['user'],$dataBase['password'],$dataBase['database']) or die("Error " . mysqli_error($dataBase['error_list']));

//fetch primary data
//$column = array('id','Contact','Banner Image One','Banner Image Two','Banner Image Three', 'Line One', 'Line Two', 'Line Three', 'Line Four', 'Line Five', 'Color One', 'Color Two', 'Color Three', 'Center Image','Center Image Text','Image One', 'Image One Text', 'Image Two', 'Image Two Text', 'Image Three', 'Image Three Text', 'Image Four', 'Image Four Text', 'Image Five', 'Image Five Text', 'Image Six', 'Image Six Text', 'Location', 'Email');
//$dcolumn = array('id','contact','bannerIMG', 'bannerIMG2','bannerIMG3', 'lineOne', 'lineTwo', 'lineThree', 'lineFour', 'lineFive', 'colorOne', 'colorTwo', 'colorThree', 'centerImage','centerImageText','image1', 'image1text', 'image2', 'image2text', 'image3', 'image3text', 'image4', 'image4text', 'image5', 'image5text', 'image6', 'image6text', 'location', 'email');
//$query = mysqli_query($dataBase['connection'], "SELECT * from products where selected='1' LIMIT 10 ");

$date=date('Y-m-d');
$time=date('Y-m-d H:i:s');

/*
//$post[1]=mysqli_fetch_array(mysqli_query($_DB['con'], "SELECT * from posts where post_id=1"));

$n=num_rows(mysqli_query($_DB['con'], "SELECT post_id from posts"));

$lastpost=mysqli_fetch_array(mysqli_query($_DB['con'], "SELECT * from posts where post_id='$n'"));
$secondlastpost=mysqli_fetch_array(mysqli_query($_DB['con'], "SELECT * from posts where post_id='$n'-1"));
$thirdlastpost=mysqli_fetch_array(mysqli_query($_DB['con'], "SELECT * from posts where post_id='$n'-2"));
$forthlastpost=mysqli_fetch_array(mysqli_query($_DB['con'], "SELECT * from posts where post_id='$n'-3"));
$fifthlastpost=mysqli_fetch_array(mysqli_query($_DB['con'], "SELECT * from posts where post_id='$n'-4"));
$sixthlastpost=mysqli_fetch_array(mysqli_query($_DB['con'], "SELECT * from posts where post_id='$n'-5"));

$o=mysqli_fetch_array(mysqli_query($_DB['con'], "SELECT * from posts where user_id='$data[id]'"));

//print_r(mysqli_query($_DB['con'], "SELECT post_id from posts where user_id='$data[id]' ORDER BY post_id"));
$sql=mysqli_query($_DB['con'], "SELECT * from posts where post_id='$n'");
*/
?>