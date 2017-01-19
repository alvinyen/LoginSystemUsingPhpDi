<?php
include_once __DIR__ . "/libs/Request.php" ;
include_once __DIR__ . "/libs/RawDbAuth.php";
include_once __DIR__ . "/libs/PdoDbAuth.php";

use \LoginSystemUsingPhpDi\libs\Request ;
use \LoginSystemUsingPhpDi\libs\RawDbAuth ;
use \LoginSystemUsingPhpDi\libs\PdoDbAuth ;

define("DBMS_INSTANCE","mysql");
define("DB_PORT","3306");
define("DB_HOST",'127.0.0.1');
//define("DB_HOST",'localhost');
define("DB_USER",'root');
define("DB_PASSWORD",'root');
define("DB_NAME",'login_system');

$request = new Request($_SERVER['REQUEST_METHOD']) ;
$dataArray = $request->getDataArray() ;
$user = $dataArray['user'] ;
$password = $dataArray['password'] ;

$auth = new RawDbAuth(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) ;
if($auth->check($user, $password)){
    echo 'y' . PHP_EOL ;
}else{
    echo 'n' . PHP_EOL ;
}

$dsn = sprintf(
    "%s:host=%s;dbname=%s" ,
    DBMS_INSTANCE ,
    DB_HOST ,
    DB_NAME
);

$auth = new PdoDbAuth($dsn,DB_USER,DB_PASSWORD) ;
if($auth->check($user, $password)){
    echo 'y' ;
}else{
    echo 'n' ;
}


