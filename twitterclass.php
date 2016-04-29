<?php>
ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');


/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "1873526065-aRnTtjD6P4owo8SvvBn687tIcoD2Vzxh2I9aqus",
    'oauth_access_token_secret' => "3x7UIjQBeigYFadXBanlMnyyjE8WrE73epThX5q0QJeUH",
    'consumer_key' => "FqHhzRmbQEESVk9f7NLdom76u",
    'consumer_secret' => "3FGLE7157JZjrqIJv9JrVvlgWegLNSA3gXwFyn5e6wMKsJoWnX"
);

/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
$url = 'https://api.twitter.com/1.1/blocks/create.json';
$requestMethod = 'POST';

/** POST fields required by the URL above. See relevant docs as above **/
$postfields = array(
    'screen_name' => 'usernameToBlock', 
    'skip_status' => '1'
);

/** Perform a POST request and echo the response
$twitter = new TwitterAPIExchange($settings);
echo $twitter->buildOauth($url, $requestMethod)
             ->setPostfields($postfields)
             ->performRequest();
              **/

/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$getfield = '?%23=#baseball';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();
             