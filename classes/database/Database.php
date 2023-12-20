<?php

namespace Database;

use RedBeanPHP\R as R;

class Database 
{
    private static $instance = null;

    private function __construct()
    {
        $dbhost = config('db.host');
        $dbname = config('db.name');

        $connectionString = "mysql:host={$dbhost};dbname={$dbname}";

        $login = config('db.login');
        $password = config('db.password');

        R::setup($connectionString, $login, $password);
    }

    public static function getInstance()
    {
        if(static::$instance === null)
        {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function __destruct()
    {
        R::close();
    }

    private function __clone()
    {

    }

    public function insertUrls($url, $shortUrl)
    {
        R::exec("INSERT INTO urls (url, short_url) VALUES(?, ?)", [$url, $shortUrl]);
    }

    public function getFullUrl($url)
    {
        return R::getCell("SELECT url FROM urls WHERE short_url = ?", [$url]);
    }
}