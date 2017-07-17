<?php 

    require "twitteroauth/autoload.php";

    use Abraham\TwitterOAuth\TwitterOAuth;

    $consumerkey = "6fDMsu244uyNBvE8vWAXW3FhP";
    $consumersecret = "mCjaDzTFLNZE3cZDHymUtTzJWqXcutO0ofi6YIkajpMe0YbOah";
    $accesstoken = "886842236687843334-01Mw6B2a4g1QlVy4aBK0thqc4g3IRfB";
    $accesstokensecret = "M7YxpXUUAkgh7ZJWubkJPni6AMVAEWizYK0JdXFGbul2C";

    $connection = new TwitterOAuth($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
    $content = $connection->get("account/verify_credentials");

    $statuses = $connection->post("statuses/update", ["status" => "This came from my twitter app"]);

    $statuses = $connection->get("statuses/home_timeline", ["count" => 25, "exclude_replies" => true]);

    foreach($statuses as $tweet) {

        if($tweet->favorite_count >= 2) {
             $status = $connection->get("statuses/oembed", ["id" => $tweet->id]);
            echo $status->html;
        }
        
    }

?>