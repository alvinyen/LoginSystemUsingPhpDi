<?php

namespace LoginSystemUsingPhpDi\libs;

require_once __DIR__ . "/../../vendor/autoload.php";

use DI ;

echo __DIR__ . PHP_EOL ;
echo __FILE__ . PHP_EOL ;

//var_dump($GLOBALS['container']) ;

var_dump($GLOBALS['container'] ->get(App::class)->login());