<?php

namespace Redirect;

class Redirect
{
    public static function go($shortLink)
    {
        $url = db()->getFullUrl($shortLink);

        header('Location:' . $url);
    }
}