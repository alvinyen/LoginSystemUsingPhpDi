<?php
include_once __DIR__ . "/libs/Request.php" ;
include_once __DIR__ . "/libs/RawDbAuth.php";
include_once __DIR__ . "/libs/PdoDbAuth.php";
include_once __DIR__ . "/libs/App.php";
include_once __DIR__ . "/res/Setting.php";

use \LoginSystemUsingPhpDi\libs\Request ;
use \LoginSystemUsingPhpDi\libs\RawDbAuth ;
use \LoginSystemUsingPhpDi\libs\PdoDbAuth ;
use \LoginSystemUsingPhpDi\libs\App ;
use \LoginSystemUsingPhpDi\res\Setting ;

$dsn = sprintf(
    "%s:host=%s;dbname=%s" ,
    Setting::DBMS_INSTANCE ,
    Setting::DB_HOST ,
    Setting::DB_NAME
);

var_dump((new App( (new Request($_SERVER['REQUEST_METHOD'])) , ( new PdoDbAuth($dsn,Setting::DB_USER,Setting::DB_PASSWORD) ) ))->login());

//$request = new Request($_SERVER['REQUEST_METHOD']) ;
//$dataArray = $request->getDataArray() ;
//$user = $dataArray['user'] ;
//$password = $dataArray['password'] ;
//
//$auth = new RawDbAuth(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) ;
//if($auth->check($user, $password)){
//    echo 'y' . PHP_EOL ;
//}else{
//    echo 'n' . PHP_EOL ;
//}
//
//$dsn = sprintf(
//    "%s:host=%s;dbname=%s" ,
//    DBMS_INSTANCE ,
//    DB_HOST ,
//    DB_NAME
//);
//
//$auth = new PdoDbAuth($dsn,DB_USER,DB_PASSWORD) ;
//if($auth->check($user, $password)){
//    echo 'y' ;
//}else{
//    echo 'n' ;
//}


