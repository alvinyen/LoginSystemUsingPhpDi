<?php

namespace LoginSystemUsingPhpDi\libs;

use DI ;

class Router
{
    protected $uri ;
    protected $method ;
//    protected $routeTarget ;

    public function __construct(array $uri, string $method, string $routeTarget)
    {
        $this->uri = $uri ;
        $this->method = $method ;
//        $this->routeTarget = $routeTarget ;
    }

    public function submit(){
        if($this->match()){
//            $this->redirect() ;
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

        $rules = DI\get("ROUTE_RULES") ; // hint!!! $rules = DI\get("ROUTE_RULES")[$this->uri] ;

        foreach ($rules as $key => $value)
        {
            if( $key === $this->uri && $value['method'] === $this->method ) // [ uri1 => [ method => method1 , routeTarget => routeTarget1 ] , .... ]
            {
                return true ;
            }
        }
        return false ;

    }

//    private function redirectTo($callback){
    private function redirectTo($path){
//        call_user_func($callback);
        include $path ;
    }
}