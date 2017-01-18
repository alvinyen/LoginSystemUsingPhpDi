<?php
include_once "./libs/Request.php";
use \LoginSystemUsingPhpDi\libs\Request ;

echo 'LoginSystemUsingPhpDi\index.php<br><br>' ;
$request = new Request($_SERVER['REQUEST_METHOD']) ;
print_r($request->getData());