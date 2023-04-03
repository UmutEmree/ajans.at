<?php function getService($mail,$pass)
{

    require_once 'gapi/src/Google/autoload.php';

  
  $service_account_email = $mail;
  $key_file_location = 'app/helper/'.$pass;

  $client = new Google_Client();
  $client->setApplicationName("test");
  $analytics = new Google_Service_Analytics($client);

  $key = file_get_contents($key_file_location);
  $cred = new Google_Auth_AssertionCredentials(
      $service_account_email,
      array(Google_Service_Analytics::ANALYTICS_READONLY),
      $key
  );
  $client->setAssertionCredentials($cred);
  if($client->getAuth()->isAccessTokenExpired()) {
    $client->getAuth()->refreshTokenWithAssertion($cred);
  }

  return $analytics;
}


function getResults(&$analytics, $profileId) {

   $optParams = array(
      'dimensions' => 'ga:day',
    'metrics' => 'ga:pageviews,ga:sessions',
      );



   return $analytics->data_ga->get(
       'ga:' . $profileId,
       '30daysAgo',
       'today',
       'ga:sessions',$optParams);
}


 function getResultsmetric(&$analytics, $profileId,$metric) {

   $optParams = array(
      'dimensions' => $metric,
    'metrics' => 'ga:sessions',
      ); 

       return $analytics->data_ga->get(
       'ga:' . $profileId,
       '30daysAgo',
       'today',
       'ga:sessions',$optParams);
}


 
