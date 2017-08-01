<?php
    /**
     * Created by PhpStorm.
     * User: tony
     * Date: 2017/8/1
     * Time: 上午11:13
     */

    function get_db_config()
    {
        if (getenv('IS_IN_HEROKU')) {
            $url = parse_url(getenv("DATABASE_URL"));

            return $db_config = [
                'connetion' => 'pgsql',
                'host'      => $url["host"],
                'database'  => substr($url["path"], 1),
                'username'  => $url["user"],
                'password'  => $url["pass"],
            ];
        } else {
            return $db_config = [
                'connetion' => env('DB_CONNECTION', 'mysql'),
                'host'      => env('DB_HOST', 'localhost'),
                'database'  => env('DB_DATABASE', 'forge'),
                'username'  => env('DB_USERNAME', 'forge'),
                'password'  => env('DB_PASSWORD', ''),
            ];
        }
    }