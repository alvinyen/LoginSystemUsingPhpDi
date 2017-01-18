<?php
include_once "./libs/Request.php";
use \LoginSystemUsingPhpDi\libs\Request ;

echo 'LoginSystemUsingPhpDi\index.php<br><br>' ;
$request = new Request($_SERVER['REQUEST_METHOD']) ;
$dataArray = $request->getDataArray() ;
print_r($dataArray) ;
var_dump($dataArray);
echo "<br><br>" ;
echo $dataArray["id"] ;

