<?php
namespace LoginSystemUsingPhpDi\config ;

include_once __DIR__ . "/../libs/Request.php" ;
include_once __DIR__ . "/../libs/Auth.php" ;
include_once __DIR__ . "/../libs/RawDbAuth.php";
include_once __DIR__ . "/../libs/PdoDbAuth.php";
include_once __DIR__ . "/../libs/App.php";

require_once __DIR__ . "/../vendor/autoload.php" ;

use DI ;
use LoginSystemUsingPhpDi\libs\App ;
use LoginSystemUsingPhpDi\libs\Request ;
use LoginSystemUsingPhpDi\libs\Auth ;
use LoginSystemUsingPhpDi\libs\RawDbAuth ;
use LoginSystemUsingPhpDi\libs\PdoDbAuth ;

//echo Auth::class ;
//echo RawDbAuth::class . PHP_EOL ;
//echo PdoDbAuth::class . PHP_EOL ;

return [
    "DBMS_INSTANCE" => "mysql" ,
    "DB_HOST" => "127.0.0.1" ,
    "DB_USER" => "root" ,
    "DB_PASSWORD" => "root" ,
    "DB_NAME" => "login_system" ,
    "REQUEST_METHOD" => $_SERVER['REQUEST_METHOD'] ,
    "DSN" => DI\string('{DBMS_INSTANCE}:host={DB_HOST};dbname={DB_NAME}') ,

    Request::class => DI\object()->constructor(DI\get('REQUEST_METHOD')) ,
    RawDbAuth::class => DI\object(RawDbAuth::class)->constructor(DI\get('DB_HOST'), DI\get('DB_USER'), DI\get('DB_PASSWORD'), DI\get('DB_NAME')) ,
    PdoDbAuth::class => DI\object(PdoDbAuth::class)->constructor(DI\get('DSN'), DI\get('DB_USER'), DI\get('DB_PASSWORD')) ,
    App::class => DI\object()->constructor(DI\get(Request::class), DI\get(PdoDbAuth::class) ) , // paras of definition !!
] ;

//interface Setting{
//    const DBMS_INSTANCE = "mysql";
//    const DB_HOST = "127.0.0.1";
//    const DB_USER = "root";
//    const DB_PASSWORD = "root";
//    const DB_NAME = "login_system";
//}