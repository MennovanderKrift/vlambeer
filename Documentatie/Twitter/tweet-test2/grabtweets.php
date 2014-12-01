<? require_once ('codebird.php'); 
$CONSUMER_KEY = '5pnLjJoC5HxzSxQy5NuiEclef';     
$CONSUMER_SECRET = 'nIk7CD93bdq100H5Rwp9bm0Q45B3tvSNCyg8HszwUTpCPPYL61';     
$ACCESS_TOKEN = '2882866588-nvWrQ02sYdOkv3aBz9jf3PlEzQyCQMweer5xNHE';     
$ACCESS_TOKEN_SECRET = 'R64l0CcIkSgAkG2d4y6RTepMNVdjRqa8gsCGQwD3MAPT0';       
Codebird::setConsumerKey($CONSUMER_KEY, $CONSUMER_SECRET);     
$cb = Codebird::getInstance();     
$cb->setToken($ACCESS_TOKEN, $ACCESS_TOKEN_SECRET);
//retrieve posts
$q = $_POST['q'];
$count = $_POST['count'];
$api = $_POST['api'];
//https://dev.twitter.com/docs/api/1.1/get/statuses/user_timeline
//https://dev.twitter.com/docs/api/1.1/get/search/tweets
$params = array(
'screen_name' => $q,
'q' => $q,
'count' => $count
);
//Make the REST call
$data = (array) $cb->$api($params);
//Output result in JSON, getting it ready for jQuery to process
echo json_encode($data);
?>