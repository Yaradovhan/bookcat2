<?php

Class ConfigApp
{
    const HOST = 'localhost';
    const USER = 'root';
    const PASS = '';
    const DB = 'bookcat_db';

    public static function adminPath()
    {
        return self::getBaseUrl().'/admin/index.php';
    }

    public static function mainPath()
    {
        return 'http://' . $_SERVER['HTTP_HOST'] . "/bookcat2/index.php";
    }

    public static function getBaseUrl()
    {
        $currentPath = $_SERVER['PHP_SELF'];

        $pathInfo = pathinfo($currentPath);

        $hostName = $_SERVER['HTTP_HOST'];

        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https://' ? 'https://' : 'http://';

        return $protocol . $hostName . $pathInfo['dirname'] . "";
    }

    public static function dd($data)
    {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }
}