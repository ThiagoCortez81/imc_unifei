<?php

namespace App;

class DB extends \PDO
{
    public function __construct($dsn = null, $username = null, $password = null, $options = array())
    {
        $dsn = ($dsn != null) ? $dsn : sprintf('mysql:dbname=%s;host=%s', MYSQL_DBNAME, MYSQL_HOST, array(
            \PDO::ATTR_EMULATE_PREPARES => false,
            \PDO::MYSQL_ATTR_DIRECT_QUERY => false,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        ));
        $username = ($username != null) ? $username : MYSQL_USER;
        $password = ($password != null) ? $password : MYSQL_PASSWORD;

        parent::__construct($dsn, $username, $password, $options);
    }
}