<?php
namespace App\Helpers;

class AppHelper
{
    // Function to determine if the connection is secure or not
    public function isSecure()
    {
        return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
            || (!empty($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443);
    }

    public static function instance()
    {
        return new AppHelper();
    }
}