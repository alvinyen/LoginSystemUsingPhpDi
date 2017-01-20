<?php
namespace LoginSystemUsingPhpDi ;

include_once __DIR__ . "/libs/Request.php" ;
include_once __DIR__ . "/libs/Auth.php" ;
include_once __DIR__ . "/libs/RawDbAuth.php";
include_once __DIR__ . "/libs/PdoDbAuth.php";
include_once __DIR__ . "/libs/App.php";
include_once __DIR__ . "/res/Setting.php";
include_once __DIR__ . "/config/config.php";

require_once __DIR__ . "/vendor/autoload.php";

use LoginSystemUsingPhpDi\libs\Request ;
use LoginSystemUsingPhpDi\libs\Auth ;
use LoginSystemUsingPhpDi\libs\RawDbAuth ;
use LoginSystemUsingPhpDi\libs\PdoDbAuth ;
use LoginSystemUsingPhpDi\libs\App ;
use LoginSystemUsingPhpDi\res\Setting ;
use DI ;

$builder = new DI\ContainerBuilder();
$builder->addDefinitions( __DIR__ . '/config/config.php');
$container = $builder->build() ;

//$dsn = sprintf(
//    "%s:host=%s;dbname=%s" ,
//    Setting::DBMS_INSTANCE ,
//    Setting::DB_HOST ,
//    Setting::DB_NAME
//);

//var_dump((new App($container->get(Request::class), $container->get(Auth::class)))->login()) ;
var_dump($container->get(App::class)->login());
//var_dump((new App( (new Request($_SERVER['REQUEST_METHOD'])) , ( new PdoDbAuth($dsn,Setting::DB_USER,Setting::DB_PASSWORD) ) ))->login());
//var_dump((new App( (new Request($_SERVER['REQUEST_METHOD'])) , ( new RawDbAuth(Setting::DB_HOST,Setting::DB_USER,Setting::DB_PASSWORD,Setting::DB_NAME) ) ))->login());



