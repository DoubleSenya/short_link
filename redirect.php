<?php

    require __DIR__.'/vendor/autoload.php';
    require_once  __DIR__.'/functions/facades.php';

    spl_autoload_register(function ($file) {
        $file = $_SERVER['DOCUMENT_ROOT'] . '/classes/' . str_replace("\\", "/", $file) . '.php';

        if(file_exists($file))
        {
            require_once $file;
        }
    }); 

    use Route\Redirect;

    $shortLink = $_GET['key'];

    Redirect::go($shortLink);