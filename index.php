<?php
namespace LoginSystemUsingPhpDi ;
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers:Content-Type");
// !!!!!debug!!!!!

//include_once __DIR__ . "/libs/Request.php";
//include_once __DIR__ . "/libs/auth/auth.php";
//include_once __DIR__ . "/libs/auth/RawDbAuth.php";
//include_once __DIR__ . "/libs/auth/PdoDbAuth.php";
//include_once __DIR__ . "/libs/App.php";
//include_once __DIR__ . "/res/Setting.php";
//include_once __DIR__ . "/config/dbConfig.php";

require_once __DIR__ . "/vendor/autoload.php";

//use LoginSystemUsingPhpDi\libs\Request ;
//use LoginSystemUsingPhpDi\libs\auth\Auth ;
//use LoginSystemUsingPhpDi\libs\auth\RawDbAuth ;
//use LoginSystemUsingPhpDi\libs\auth\PdoDbAuth ;
//use LoginSystemUsingPhpDi\res\Setting ;
use LoginSystemUsingPhpDi\libs\App ;
use DI ;
use LoginSystemUsingPhpDi\libs\Router;

// !!!!!debug!!!!!

//set_exception_handler(function ($e){
////    $code = $e->getCode() ?: 400 ;
//    $code = $e->getCode() ;
//    echo $e->getCode() ;
//    header("Content-Type: application/json", NULL, $code);
//    echo json_encode([ "error" => $e->getMessage() ]) ;
////    echo json_encode([ "error" => $e->getCode() ]) ;
//    exit ;
//});

$builder = new DI\ContainerBuilder();
$builder->addDefinitions(__DIR__ . '/src/config/containerConfig.php');
$GLOBALS['container'] =  $builder->build() ;

//$dsn = sprintf(
//    "%s:host=%s;dbname=%s" ,
//    Setting::DBMS_INSTANCE ,
//    Setting::DB_HOST ,
//    Setting::DB_NAME
//);

//var_dump((new App($container->get(Request::class), $container->get(auth::class)))->login()) ;

// !!!!!debug!!!!!
//var_dump($GLOBALS['container'] ->get(App::class)->login());

//var_dump((new App( (new Request($_SERVER['REQUEST_METHOD'])) , ( new PdoDbAuth($dsn,Setting::DB_USER,Setting::DB_PASSWORD) ) ))->login());
//var_dump((new App( (new Request($_SERVER['REQUEST_METHOD'])) , ( new RawDbAuth(Setting::DB_HOST,Setting::DB_USER,Setting::DB_PASSWORD,Setting::DB_NAME) ) ))->login());

// !!!!!debug!!!!!
//if ($_SERVER['PATH_INFO'] == null) {
//    echo 'no path info ';
//} elseif ($_SERVER['PATH_INFO']) {
//    $url_pieces = explode('/', $_SERVER['PATH_INFO']) ;
//    print_r($url_pieces);
//    echo $_SERVER['REQUEST_METHOD'] . PHP_EOL ;
//} else {
//}

// !!!!!debug!!!!!
//echo $_SERVER['PATH_INFO'] . PHP_EOL ;

// !!!!!debug!!!!!
// if ($url_pieces[1] != 'users') {
//     throw new \Exception('unknown endpoint', 404);
// }

// !!!!!debug!!!!!
$uri = $_SERVER['PATH_INFO'] ;
$method = $_SERVER['REQUEST_METHOD'] ;

// !!!!!debug!!!!!
//try {
//    $routeTarget = $GLOBALS['container'] -> get('ROUTE_RULES')[$uri] ;
//} catch (DI\NotFoundException $e) {
//    echo "no rule" ;
//}


(new Router($uri, $method))->submit();

// var_dump($GLOBALS['container']->get('xyz')) ;
//<b>Fatal error</b>:  Uncaught DI\NotFoundException: No entry or class found for 'xyz' in /Users/KJ-Yen/PhpstormProjects/LoginSystemUsingPhpDi/vendor/php-di/php-di/src/DI/Container.php:119

//var_dump($_SERVER['PATH_INFO']) ; // NULL

//var_dump(test('xyz')) ;
//
//function test($key){
//    try {
//        DI\get("ROUTE_RULES")[$key] ;
//        return true ;
//    } catch( DI\NotFoundException $e ) {
//        echo $e->getMessage() . PHP_EOL ;
//        return false ;
//    }
//}
