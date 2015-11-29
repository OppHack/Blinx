<?php session_start();
require_once __DIR__ . '/vendor/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '427329234142944',
  'app_secret' => '71ecf083975587c1e511762d6f2001ea',
  'default_graph_version' => 'v2.4',
  'default_access_token' => '427329234142944|71ecf083975587c1e511762d6f2001ea'
  ]);

$helper = $fb->getRedirectLoginHelper();

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (! isset($accessToken)) {
  if ($helper->getError()) {
    header('HTTP/1.0 401 Unauthorized');
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
  } else {
    header('HTTP/1.0 400 Bad Request');
    echo 'Bad request';
  }
  exit;
}

// Logged in

// The OAuth 2.0 client handler helps us manage access tokens
$oAuth2Client = $fb->getOAuth2Client();

// Get the access token metadata from /debug_token
$tokenMetadata = $oAuth2Client->debugToken($accessToken);

$_SESSION['fb_access_token'] = (string) $accessToken;



try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,name,birthday,gender,location,verified,work,first_name,last_name,email', ($accessToken));
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$user = $response->getGraphUser();

$_SESSION['loggedIn'] = true;
$_SESSION['form-first-name'] = $user->getFirstName();
$_SESSION['form-last-name'] = $user->getLastName();
$_SESSION['form-email'] = $user->getEmail();
$_SESSION['form-password'] = 'FACEBOOK_API_'.$accessToken;
$_SESSION['form-id'] = $user->getId();
$_SESSION['form-birthday'] = $user->getBirthDay();
$_SESSION['form-gender'] = $user->getGender();
$_SESSION['form-location'] = $user->getLocation();
$_SESSION['form-verified'] = $user->getField('verified');
$_SESSION['form-work'] = $user->getField('work');

$url='location: detailreg-user.php';
header($url);

die();?>

