<?php
session_start();
//BASE DIR
define('BASE_PATH', dirname(__FILE__));

//ACESSO AO BD
define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DBNAME', 'thiagoco_imc');

//PHP config
ini_set('display_errors', true);
error_reporting(E_ERROR);

date_default_timezone_set('America/Sao_Paulo');