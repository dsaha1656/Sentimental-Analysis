<?php
	function login(){
		include "conf.php";
		$test = $_SESSION['uid'];
		if (empty($test)) {
			return false;
		}
		$q = "SELECT * FROM Client_Users WHERE email='$test'";
		$q=mysqli_query($dataBase['connection'], $q);
		$row = mysqli_num_rows($q);
		if ($row==1) {
			$q=mysqli_fetch_array($q);
			foreach ($q as $key => $value) {
				$_SESSION[$key]=$value;
			}
			//echo "<pre>";
			//var_dump($_SESSION);die();
			return true;
		}
		else{
			return false;
		}
	}
	function suggetion($email,$topic,$tasks){
		$title="Suggations To Improve ".$topic."";
		foreach ($tasks as $key => $value) {
			$text= $text."".$value."<br>";
		}
		$body = "Try to...<br>".$text."";
	    $q = "INSERT into notifications(email,title,body) values('$email','$title', '$body')";
	    include "conf.php";
	    mysqli_query($dataBase['connection'],$q);
	}
	function percentage($input,$max,$min){
		return ($input-$min)*(100/($max-$min));
	}
	function analyzeString($array){
		$result=array(0,0,0);
		foreach ($array as $key => $value) {
			switch ($value[1]) {
					case 'POSITIVE':
						$result[0]++;
						break;
					case 'NEGATIVE':
						$result[1]++;
						break;
					case 'NEUTRAL':
						$result[2]++;
						break;
					default:
						continue;
						break;
				}	
		}
	return $result;
	}
	function typeofperson($string){
		switch ($string) {
			case 'pos':
				$result = "POSITIVE";
				break;
			case 'neg':
				$result = "NEGATIVE";
				break;
			case 'neu':
				$result = "NEUTRAL";
				break;
			
			default:
				return false;
				break;
		}
		return $result;
	}
	function correct($value){
		switch ($value) {

			case 25:
				$value=$value-7;
				break;
			
			case 24:
				$value=$value-7;
				break;
			
			case 23:
				$value=$value-5;
				break;
			
			case 22:
				$value=$value-5;
				break;
			
			case 21:
				$value=$value-3;
				break;
			
			case 20:
				$value=$value-3;
				break;
			
			case ($value<=19):
				$value=$value-0;
				break;
			default:
				return false;
				break;
		}
		return $value;
	}
	function CTW($value){
		$tasks=array();
		switch ($value) {
			case ($value<34):
				$tasks[0]="Celebrte Your Personal Wins";
				$tasks[1]="Share Your Ideas And Problems";
				$tasks[2]="Emphasize Work Life Balace";
				break;
			case ($value>=34 && $value<67):
				$tasks[0]="Celebrte Your Personal Wins";
				$tasks[1]="Gain Energy From Work";
				$tasks[2]="Have A Hack Night Party";
				break;
			case ($value>=67 && $value<=100):
				$tasks[0]="Celebrte Your Personal Wins";
				$tasks[1]="Share Your Knowledge";
				$tasks[2]="Create Your Own Internal Magazine";
				break;
		}
		return $tasks;
	}
	function RISK($value){
		$tasks=array();
		switch ($value) {
			case ($value<34):
				$tasks[0]="Overcome Your Fear";
				$tasks[1]="Start Small To Go Big";
				$tasks[2]="Acknowledge Failure Couragesly and Quickly";
				break;
			case ($value>=34 && $value<67):
				$tasks[0]="Fully Understand What Your Risk Is";
				$tasks[1]="Postpone All Or Nothing Moments.Don't Go All In The First Play";
			
				break;
			case ($value>=67 && $value<=100):
				$tasks[0]="Use Long-Term Purpose To Full Passion & Provide Your Guidence .Set One Eye On Future While Focusing";
				$tasks[1]="Remember To Be Authentic";
			
				break;
		}
		return $tasks;

	}
	function GSC($value){
		$tasks=array();
		switch ($value) {
			case ($value<34):
				$tasks[0]="Develop Goal Setting Plans For Each Area Of Your Life";

				
				break;
			case ($value>=34 && $value<67):
				$tasks[0]="Prioritize your Goal";
			
			
				break;
			
		}
		return $tasks;
		
	}
	function SC($value){
		$tasks=array();
		switch ($value) {
			case ($value<34):
				$tasks[0]="Kill Your Negative Thought";
				$tasks[1]="Act Positive";
				$tasks[2]="Focus On Solution";
				break;
			case ($value>=34 && $value<67):
				$tasks[0]="Groom Yourself";
				$tasks[1]="Smile";
				$tasks[2]="Exercise";
				break;
			case ($value>=67 && $value<=100):
				$tasks[0]="Get To Know Yourself";
				$tasks[1]="Be Kind And Generous";
				break;
		}
		return $tasks;
		
	}
	function PE($value){
		$tasks=array();
		switch ($value) {
			case ($value<34):
				$tasks[0]="Celebrte Your Personal Wins";
				$tasks[1]="Share Your Ideas And Problems";
				$tasks[2]="Emphasize Work Life Balace";
				break;
			case ($value>=34 && $value<67):
				$tasks[0]="Celebrte Your Personal Wins";
				$tasks[1]="Gain Energy From Work";
				$tasks[2]="Have A Hack Night Party";
				break;
			case ($value>=67 && $value<=100):
				$tasks[0]="Celebrte Your Personal Wings";
				$tasks[1]="Share Your Knowledge";
				$tasks[2]="Create Your Own Internal Magazine";
				break;
		}
		return $tasks;		
	}
	function FI($value){
		$tasks=array();
		switch ($value) {
			case ($value<34):
				$tasks[0]="Celebrte Your Personal Wins";
				$tasks[1]="Share Your Ideas And Problems";
				$tasks[2]="Emphasize Work Life Balace";
				break;
			case ($value>=34 && $value<67):
				$tasks[0]="Celebrte Your Personal Wins";
				$tasks[1]="Gain Energy From Work";
				$tasks[2]="Have A Hack Night Party";
				break;
			case ($value>=67 && $value<=100):
				$tasks[0]="Celebrte Your Personal Wings";
				$tasks[1]="Share Your Knowledge";
				$tasks[2]="Create Your Own Internal Magazine";
				break;
		}
		return $tasks;
		
	}
	function OP($value){
		$tasks=array();
		switch ($value) {
			case ($value<34):
				$tasks[0]="Get Rid Of Negative Word";
				$tasks[1]="Find a Cause You Believe";
				$tasks[2]="Keep Busy With Things You Enjoy and Don't Overthink";
				break;
			case ($value>=34 && $value<67):
				$tasks[0]="Fact Check Your Thougts";
				$tasks[1]="Read Inspiring Stories";
				
				break;
			case ($value>=67 && $value<=100):
				$tasks[0]="Be A Part Of A Team";
				$tasks[1]="Connect to Your Thougts";
				break;
		}
		return $tasks;
	}
	function typeof($value){
		switch ($value) {
			case ($value<40):
				$tasks="LOW";
				break;
			case ($value>=40 && $value<67):
				$tasks="MEDIUM";
				break;
			case ($value>=67 && $value<=100):
				$tasks="HIGH";
				break;
		}
		return $tasks;
	}
	function personality($positive,$negative,$nutral){
		if ($positive<$negative) {
			if ($negative>$nutral) {
				$result="NEGATIVE";
			}
			else{
				$result="NEUTRAL";
			}
		}
		else if($positive>$negative){
			if ($positive>$nutral) {
				$result="POSITIVE";
			}
			else{
				$result="NEUTRAL";
			}
		}
		else {
			$result="NEUTRAL";
		}
		return $result;
	}
	function genarateTasks($string,$round){
		if ($string=="POSITIVE") {
			include "../conf.php";
			$q = "SELECT * from tasks where class='positive' AND round='$round'";
			$q = mysqli_query($dataBase['connection'], $q);
			$products=array();
			for ($i=0; $row=mysqli_fetch_array($q) ; $i++) {
			  $products[]=$row;
			}
			return $products;
		}
		else if ($string=="NEGATIVE") {
			include "../conf.php";
			$q = "SELECT * from tasks where class='negative' AND round='$round'";
			$q = mysqli_query($dataBase['connection'], $q);
			$products=array();
			for ($i=0; $row=mysqli_fetch_array($q) ; $i++) {
			  $products[]=$row;
			}
			return $products;
		}
		else if ($string=="NEUTRAL") {
			include "../conf.php";
			$q = "SELECT * from tasks where class='neutral' AND round='$round'";
			$q = mysqli_query($dataBase['connection'], $q);
			$products=array();
			for ($i=0; $row=mysqli_fetch_array($q) ; $i++) {
			  $products[]=$row;
			}
			return $products;
		}
	}
?>