<?php
session_start();
require 'autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;
define('CONSUMER_KEY', 'l0KmRnFb4SG2MsLgHp6YAe7Kk'); // add your app consumer key between single quotes
define('CONSUMER_SECRET', 'id75TC2vxObwHetNeEUaUOW6RnsCo59X9AHCGGowExJorkvcB7'); // add your app consumer secret key between single quotes
define('OAUTH_CALLBACK', 'http://mindscript.tk/twitter/callback.php'); // your app callback URL
if (!isset($_SESSION['access_token'])) {
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
	$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
	$_SESSION['oauth_token'] = $request_token['oauth_token'];
	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
	$url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
	header("location:".$url);
} else {
	$access_token = $_SESSION['access_token'];
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	$user = $connection->get("account/verify_credentials", ['include_entities' => true, 'skip_status' => true, 'include_email' => true]);
	$users = $connection->get("account/settings");
	$status = $connection->get("statuses/user_timeline",["exclude_replies" => true]);
	$m=array();
	foreach ($status as $key => $value) {
		$m[]=$value->text;
	}
	$_SESSION['tweets']=$m;
	$_SESSION['testType']="twitter";
	header("location:../Rounds/one.php");
	//die();
	/*
	//PHPInsight
	include 'sentiment.php';
	$sentiment = new \PHPInsight\Sentiment();
	foreach ($status as $key => $value) {
		//$scores = $sentiment->score($value->text);
		$class = $sentiment->categorise($value->text);
		echo "String: $value->text\n";
		echo "Dominant: $class, scores: ";
		print_r($scores);
		echo "\n";
	}
*/
	//Sentimental_analysis
	/*
	require_once('vendor/autoload.php'); 
	$analyzer = SentimentAnalysis\Analyzer::withDefaultConfig();
	//$result = $analyzer->analyze("I am so good");
	//var_dump($result);
	//die();
	foreach ($status as $key => $value) {
	// Analyze the text.
	$result = $analyzer->analyze($value->text);

	// Get and print the category.
	echo "Text: ".$value->text."=================>";
	echo $result->category()."<br>";
	var_dump($result);
	
	}
	*/
}
