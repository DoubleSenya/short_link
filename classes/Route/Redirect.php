<?php

namespace Route;

class Redirect
{
    public static function go($shortLink)
    {
        // $shortLink = str_replace('http://' . $_SERVER['HTTP_HOST'] . '/q/', '', $shortLink);
        $url = db()->getFullUrl($shortLink);

        if (empty($url)) {
            header('location:' . '/404.php');
            return;
        }

        header('location:' . $url);
    }
}