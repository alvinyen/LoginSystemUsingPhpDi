<?php
include_once "./libs/Request.php";
use \LoginSystemUsingPhpDi\libs\Request ;

echo 'LoginSystemUsingPhpDi\index.php<br><br>' ;
$request = new Request($_SERVER['REQUEST_METHOD']) ;
$dataArray = $request->getDataArray() ;
$id = $dataArray['id'] ;
$password = $dataArray['password'] ;
//print_r($dataArray) ;
//var_dump($dataArray);
//echo "<br><br>" ;
echo "{$id} <br>";
echo "{$password} <br>";
