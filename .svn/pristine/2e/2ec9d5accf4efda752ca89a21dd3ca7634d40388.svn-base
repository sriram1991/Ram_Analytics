<?php

$url = "https://youtu.be/jTGb3ubedgU";
curl_get("https://www.youtube.com/oembed?url=".rawurlencode($url)."&format=json&callback=foo");
exit();

function curl_get($url) {
            // $this->load->library('curl');
            echo "URL is : ".$url."\n";
	    $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_TIMEOUT, 30);
            $return = curl_exec($curl);
            curl_close($curl);
            echo "\n";
            var_dump($return);
}
?>
