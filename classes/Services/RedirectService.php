<?php

namespace Services;

use Route\Redirect;

class RedirectService
{
    public function handle($link)
    {
        Redirect::go($link);
    }
}