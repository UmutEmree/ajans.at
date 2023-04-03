<?php  

function yapi($videoinfo=array(),$yapidata = array())
{




  require_once 'gapi/src/Google/autoload.php';
  require_once 'gapi/src/Google/Client.php';
  require_once 'gapi/src/Google/Service/YouTube.php';

  if (!isset($_SESSION)) {
     session_start();
  }
 
 
$OAUTH2_CLIENT_ID = $yapidata['id'];
$OAUTH2_CLIENT_SECRET = $yapidata['secret'];

$client = new Google_Client();
$client->setClientId($OAUTH2_CLIENT_ID);
$client->setClientSecret($OAUTH2_CLIENT_SECRET);
$client->setScopes('https://www.googleapis.com/auth/youtube');
$redirect = $yapidata['redirect'];
$client->setRedirectUri($redirect);
$client->setAccessType('offline');



$youtube = new Google_Service_YouTube($client);
if (isset($_GET['code'])) {
  if (strval($_SESSION['state']) !== strval($_GET['state'])) {
   $htmlBody['html'] = 'Süresi biten bir URL izniniz var sayfayı yenileyin';
   $htmlBody['id'] = 0;
   $htmlBody['hata'] = true;
     return $htmlBody;
    die();
  }
  $client->authenticate($_GET['code']);
  $_SESSION['token'] = $client->getAccessToken();
  header('Location: ' . $redirect);
}
if (isset($_SESSION['token']) && !empty($_SESSION['token'])) {
   
  $client->setAccessToken($_SESSION['token']);
 
}
// Check to ensure that the access token was successfully acquired.
if ($client->getAccessToken()) {


  
  try{
     
     $videoPath = $videoinfo['file'];
  $videoTitle = $videoinfo['title'];
  $videoDescription = $videoinfo['desc'];
  $videoCategory = "25";
  $videoTags = $videoinfo['tags'];
   
    $snippet = new Google_Service_YouTube_VideoSnippet();

    $snippet->setTitle($videoTitle);
    $snippet->setDescription($videoDescription);
    $snippet->setCategoryId($videoCategory);
    $snippet->setTags($videoTags);

    
    $status = new Google_Service_YouTube_VideoStatus();
    $status->privacyStatus = "public";
    
    $video = new Google_Service_YouTube_Video();
    $video->setSnippet($snippet);
    $video->setStatus($status);
  
    $chunkSizeBytes = 1 * 1024 * 1024;
    
    $client->setDefer(true);
    
    $insertRequest = $youtube->videos->insert("status,snippet", $video);
    
    $media = new Google_Http_MediaFileUpload(
      $client,
      $insertRequest,
      'video/*',
      null,
      true,
      $chunkSizeBytes
      );
    $media->setFileSize(filesize($videoPath));
     
    $status = false;
    $handle = fopen($videoPath, "rb");
    while (!$status && !feof($handle)) {
      $chunk = fread($handle, $chunkSizeBytes);
      $status = $media->nextChunk($chunk);
    }
    fclose($handle);
     
    $client->setDefer(true);

    $htmlBody['html'] = 'Video Başarıyla Youtube kanalınıza Eklendi.<br><iframe width="420" height="315" src="https://www.youtube.com/embed/'.$status['id'].'?rel=0" frameborder="0" allowfullscreen></iframe>';
    $htmlBody['id'] = $status['id'];
     $htmlBody['hata'] = false;

  } catch (Google_Service_Exception $e) {

   $htmlBody['id'] = 0;
   $htmlBody['hata'] = true;
    $htmlBody['html'] = sprintf('<p>Servis hatası oluştu (Geçmişi temizleyip yeniden deneyin): <code>%s</code></p>',
      htmlspecialchars($e->getMessage()));

  } catch (Google_Exception $e) {
    $htmlBody['id'] = 0;
   $htmlBody['hata'] = true;
    $htmlBody['html'] = sprintf('<p>Servis hatası oluştu (Geçmişi temizleyip yeniden deneyin): <code>%s</code></p>',
      htmlspecialchars($e->getMessage()));
  }
  $_SESSION['token'] = $client->getAccessToken();
} else {
 
  $state = mt_rand();
  $client->setState($state);
  $_SESSION['state'] = $state;
  $authUrl = $client->createAuthUrl();
  $htmlBody['html'] = '<h3>Devam edebilmek için bir google hesabı ile giriş yapmalısınız.</h3><p>Giriş yapmak için <a href="'.$authUrl.'">Tıklayınız</a> <p>';
  $htmlBody['id'] =0;
   $htmlBody['hata'] = true;
} 

return $htmlBody;
}