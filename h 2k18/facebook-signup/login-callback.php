<?php
session_start();
require_once __DIR__ . '/src/Facebook/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '2049508421961216',
  'app_secret' => '89667ad4069e5ae3bc326d3815c9dc37',
  'default_graph_version' => 'v2.5'
]);

$helper = $fb->getJavaScriptHelper();

try {
  $accessToken = $helper->getAccessToken();
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
}

if (isset($accessToken)) {
   $fb->setDefaultAccessToken($accessToken);

  try {
  
    $requestProfile = $fb->get("/me?fields=name,email");
    //$requestProfile = $fb->get('/me/feed');
    $profile = $requestProfile->getGraphNode()->asArray();
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
  }

  echo "<pre>";
  print_r($accessToken);
  $user_details = "https://graph.facebook.com/me?fields=birthday&access_token=" .$accessToken;
  $response = file_get_contents($user_details);
  $response = json_decode($response);
  print_r($response);
  //$_SESSION['name'] = $profile['name'];
  //header('location: ../');
  exit;
} else {
    echo "Unauthorized access!!!";
    exit;
}
