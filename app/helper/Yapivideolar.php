<?php

function yapivideo($yapidata = array())
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
$redirect = $yapidata['redirect']; //"http://www.ahiretten.com/Admin/Video/Authrun";
$client->setRedirectUri($redirect);

// Define an object that will be used to make all API requests.
$youtube = new Google_Service_YouTube($client);

if (isset($_GET['code'])) {
  if (strval($_SESSION['state']) !== strval($_GET['state'])) {
    die('Tüm çerezleri silin yeniden deneyin eşleşmeyen bir çerez durumu söz konusu.');
  }



  $client->authenticate($_GET['code']);
  $_SESSION['token'] = $client->getAccessToken();
  header('Location: ' . $redirect);
}

if (isset($_SESSION['token'])) {
  $client->setAccessToken($_SESSION['token']);
}

// Check to ensure that the access token was successfully acquired.
if ($client->getAccessToken()) {
  try {
    // Call the channels.list method to retrieve information about the
    // currently authenticated user's channel.
    $channelsResponse = $youtube->channels->listChannels('contentDetails', array(
      'mine' => 'true',
    ));

      if (isset($yapidata['sil']) && isset($yapidata['video_id']) && $yapidata['sil'] == 1 && strlen($yapidata['video_id']) == 11) {
   $youtube->videos->delete($yapidata['video_id']);
  }

    $htmlBody = '';
    foreach ($channelsResponse['items'] as $channel) {
      // Extract the unique playlist ID that identifies the list of videos
      // uploaded to the channel, and then call the playlistItems.list method
      // to retrieve that list.
      $uploadsListId = $channel['contentDetails']['relatedPlaylists']['uploads'];

      $playlistItemsResponse = $youtube->playlistItems->listPlaylistItems('snippet', array(
        'playlistId' => $uploadsListId,
        'maxResults' => 50
      ));

      $htmlBody .= "<h3>Videolar</h3><div class=\"row\">";
      foreach ($playlistItemsResponse['items'] as $playlistItem) {
        $htmlBody .=  '<div class="col-sm-3 col-md-3">
    <div class="thumbnail">
      <img src="https://i.ytimg.com/vi/'.$playlistItem['snippet']['resourceId']['videoId'].'/default.jpg" style="width:100%;" class="img-rounded">
      <div class="caption">
        <h5>'.$playlistItem['snippet']['title'].'</h5>
         
        <p><a href="https://www.youtube.com/edit?o=U&video_id='.$playlistItem['snippet']['resourceId']['videoId'].'"  target="_blank"  class="btn btn-primary btn-mini ytvid" role="button">Düzenle</a>
        <a href="'.SITE_URL.'Admin/Video/YoutubeSil/'.$playlistItem['snippet']['resourceId']['videoId'].'"  class="btn btn-danger btn-mini" role="button">Sil</a>  </p>
      </div>
    </div>
  </div>';
            
      }
      $htmlBody .= '</div>';
    }
  } catch (Google_Service_Exception $e) {
    $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
      htmlspecialchars($e->getMessage()));
  } catch (Google_Exception $e) {
    $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
      htmlspecialchars($e->getMessage()));
  }

  $_SESSION['token'] = $client->getAccessToken();
} else {
  $state = mt_rand();
  $client->setState($state);
  $_SESSION['state'] = $state;

  $authUrl = $client->createAuthUrl();
  $htmlBody = <<<END
  <h3>Google hesabınızla giriş yapmalısınız</h3>
  <p>Giriş yapmak için <a href="$authUrl">Tıklayınız</a> <p>
END;
}
return $htmlBody;
}