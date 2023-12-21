<?php

namespace Validators;

class UrlValidator
{
    private $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function check()
    {
        if (filter_var($this->url, FILTER_VALIDATE_URL)) {

            return true;
        }

        return false;
    }
}