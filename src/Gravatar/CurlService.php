<?php

namespace Forum\Gravatar;


class CurlService
{

    public function curlGravatar(string $email)
    {
        $size = 40;
        $grav_url = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?d=identicon" . "&s=" . $size;

        return $grav_url;
    }
}
