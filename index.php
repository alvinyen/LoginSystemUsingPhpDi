<?php
include_once "./libs/Request.php" ;
include_once "./libs/DbAuth.php" ;
use \LoginSystemUsingPhpDi\libs\Request ;
use \LoginSystemUsingPhpDi\libs\DbAuth ;
define("DB_HOST",'localhost:8889');
define("DB_USER",'root');
define("DB_PASSWORD",'root');
define("DB_NAME",'LoginSystemUsingPhpDi');

$request = new Request($_SERVER['REQUEST_METHOD']) ;
$dataArray = $request->getDataArray() ;
$user = $dataArray['user'] ;
$password = $dataArray['password'] ;
//print_r($dataArray) ;
//var_dump($dataArray);
//echo "<br><br>" ;
//echo "{$user} <br><br>";
//echo "{$password} <br><br>";
$auth = new DbAuth(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) ;
if($auth->check($user, $password)){
    echo 'y' ;
}else{
    echo 'n' ;
}


