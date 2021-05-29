<?php

namespace Forum\Gravatar;


class CurlService
{

    public function curlGravatar(string $email)
    {
        $size = 40;
        $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=identicon" . "&s=" . $size;

//
//        //  Initiate curl handler
//        $ch = curl_init();
//
//        // Will return the response, if false it print the response
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//
//        // Set the url
//        curl_setopt($ch, CURLOPT_URL, $grav_url);
//
//        // Execute
//        $data = curl_exec($ch);
//
//        // Closing
//        curl_close($ch);

        return $grav_url;
    }

//    public function getMultipleCurls ($fetchURL, $dateArray, $fetchURLPart2)
//    {
//        $mh = curl_multi_init();
//        $multiCurl = [];
//        $curlArray = [];
//
//        foreach($dateArray as $i => $date) {
//            $URL = $fetchURL . $date . $fetchURLPart2;
//            $multiCurl[$i] = curl_init();
//            curl_setopt($multiCurl[$i], CURLOPT_URL, $URL);
//            curl_setopt($multiCurl[$i], CURLOPT_HEADER, 0);
//            curl_setopt($multiCurl[$i], CURLOPT_RETURNTRANSFER, 1);
//            curl_multi_add_handle($mh, $multiCurl[$i]);
//        }
//        $index = null;
//        do {
//            curl_multi_exec($mh, $index);
//        } while ($index > 0);
//
//        foreach ($multiCurl as $k => $ch) {
//            $result[$k] = curl_multi_getcontent($ch);
//            array_push($curlArray, json_decode($result[$k], true));
//            curl_multi_remove_handle($mh, $ch);
//        }
//        curl_multi_close($mh);
//        return $curlArray;
//    }
}
