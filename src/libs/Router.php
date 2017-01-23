<?php

namespace LoginSystemUsingPhpDi\libs;

require_once __DIR__ . "/../../vendor/autoload.php";

use DI ;

class Router
{
    protected $uri ;
    protected $method ;
    protected $routeTarget ;

//    public function __construct(string $uri, string $method, string $routeTarget)
    public function __construct(string $uri, string $method)
    {
        $this->uri = $uri ;
        $this->method = $method ;
//        $this->routeTarget = $routeTarget ;
        echo $this->uri . PHP_EOL ;
        echo $this->method . PHP_EOL ;
//        echo $this->routeTarget . PHP_EOL ;

    }

    public function submit(){
        if($this->match()){
//            $this->redirect() ;
            $this->redirectTo($this->routeTarget) ;
//            echo "yo" . PHP_EOL ;
        }else{
            throw new \Exception('no uri or method matched', 404) ;
        }
    }

    private function match(){
//        try {
//            DI\get("ROUTE_RULES")[$this->uri] ;
//              return true ;
//        } catch( DI\NotFoundException $e ) {
//            echo $e->getMessage() . PHP_EOL ;
//            return false ;
//        }
        $match = false ;
        $this->routeTarget = $GLOBALS['container'] -> get('ROUTE_RULES')[$this->uri] ;
        echo "routeTarget " . $this->routeTarget . PHP_EOL ;
        if($this->routeTarget){
            $match = true ;
        }
        return $match ;
    }

//    private function redirectTo($callback){
    private function redirectTo($path){
//        call_user_func($callback);
        echo __DIR__ . $path . PHP_EOL ;
        include __DIR__ . $path ;
    }
}