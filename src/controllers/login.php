<?php

namespace LoginSystemUsingPhpDi\libs;

require_once __DIR__ . "/../../vendor/autoload.php";

use DI ;

// !!!!!debug!!!!!
//echo __DIR__ . PHP_EOL ;
//echo __FILE__ . PHP_EOL ;

//var_dump($GLOBALS['container']) ;

// !!!!!debug!!!!!
//var_dump($GLOBALS['container'] ->get(App::class)->login());
// 是上面這一行印出return的true或false
//echo PHP_EOL ;

$isLogin = $GLOBALS['container']->get(App::class)->login() ;
if($isLogin){
    echo json_encode(array('auth' => 'ok'));
}else{
    echo json_encode(array('auth' => 'die'));
}

