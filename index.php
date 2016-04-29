<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>J586 Homework</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script src="http://codeorigin.jquery.com/jquery-2.0.3.min.js" type="text/javascript"></script>


    <link href="style.css" rel="stylesheet">

  </head>
  <body>

    <?php
    ini_set('display_errors', 1);
    require_once('TwitterAPIExchange.php');

    /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
    $settings = array(
        'oauth_access_token' => "16192753-C3Ah2Dg9JJLaaOZHyzFxPqW4jYF9iVTdq5alkSfBa",
        'oauth_access_token_secret' => "zAM5whJiLbi9d97EZkC5Ty5akHifwsYudXEkVi54",
        'consumer_key' => "7DupEseAPvT0aGaA9zwuKA",
        'consumer_secret' => "9Va802Pnpfd5nkz23ZIsqkQJjz2ZqLUxuAxzXQSI"
    );

    /** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
    $url = 'https://api.twitter.com/1.1/blocks/create.json';
    $requestMethod = 'POST';

    /** POST fields required by the URL above. See relevant docs as above **/
    $postfields = array(
        'screen_name' => 'usernameToBlock',
        'skip_status' => '1'
    );

    /** Perform a POST request and echo the response **/
    // $twitter = new TwitterAPIExchange($settings);
    // echo $twitter->buildOauth($url, $requestMethod)
    //              ->setPostfields($postfields)
    //              ->performRequest();



    /** Perform a GET request and echo the response **/
    /** Note: Set the GET field BEFORE calling buildOauth(); **/
    $url = 'https://api.twitter.com/1.1/search/tweets.json';
    $getfield = '?q=%23#thelifeofpablo';
    $requestMethod = 'GET';
    $twitter = new TwitterAPIExchange($settings);
    // echo $twitter->setGetfield($getfield)
    //              ->buildOauth($url, $requestMethod)
    //              ->performRequest();

    $tweetData = json_decode($twitter->setGetfield($getfield)
                ->buildOauth($url, $requestMethod)
                ->performRequest(),$assoc = TRUE);


                 foreach($tweetData['statuses'] as $items) //we added this
                 {
                 $entitiesArray = $items['entities'];
                 echo "<div class='tweet'>" . $items['text'] . "</br>";
                 echo "When: " . $items['created_at'] . "</div></br>";
                //  echo "Where: " . $items['location'] . "</br>";
                //echo "A";
                if (isset($entitiesArray['media'])) {
                  // echo "inside if";

                  $mediaArray = $entitiesArray['media'];
                  $tweetMedia = $mediaArray[0];
                  echo"<a target='_blank' href='" . $tweetMedia['expanded_url']. "'><img class='twitter-media' target= '_blank' src='" . $tweetMedia['media_url']."'></a>";
                }

              }

              echo "<script>pageComplete();</script>;"

              ?>

              <script>

                      $('.tweet').tweetLinkify();

              </script>

           <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
           <!-- Include all compiled plugins (below), or include individual files as needed -->
           <script src="js/bootstrap.min.js"></script>
           </body>
           </html>
