<?php>
require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "1873526065-7fm3tB5pAPsUbyULik6ufXNT3reSmuNgFRM8IqW",
    'oauth_access_token_secret' => "sfmEjnWUIFEpdlOy2zwOsz11O8KsmdL9Euy4Pmqr6Cu9j",
    'consumer_key' => "Ag9OBucVTsFfJIeNlfyidIpR6",
    'consumer_secret' => "wVy2aekOSGWN50hpJX6dHxIsCeqgvGjeFqh2glWtoCDEAfHg6M"
);

/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$requestMethod = 'POST';

/** POST fields required by the URL above. See relevant docs as above **/
$postfields = array(
    'screen_name' => 'usernameToBlock', 
    'skip_status' => '1'
);

/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$getfield = '?%23=#thelifeofpablo';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();

/** Perform a POST request and echo the response **/
$twitter = new TwitterAPIExchange($settings);
echo $twitter->buildOauth($url, $requestMethod)
             ->setPostfields($postfields)
             ->performRequest();
              



