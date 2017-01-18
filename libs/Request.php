<?php

namespace LoginSystemUsingPhpDi\libs;
include_once __DIR__ . "/HttpData.php";
include_once __DIR__ . "/HttpGetData.php";
include_once __DIR__ . "/HttpPostData.php";
use \LoginSystemUsingPhpDi\libs\HttpData ;
use \LoginSystemUsingPhpDi\libs\HttpGetData ;
use \LoginSystemUsingPhpDi\libs\HttpPostData ;


class Request
{
    protected $method = null ;
    const HTTP_METHOD_GET = "GET" ;
    const HTTP_METHOD_POST = "POST" ;

    public function __construct(string $method)
    {
        $this->method = $method ;
    }

    public function getData():array
    {
        $dataArray = $this->createHttpData()->parse() ;
        return $dataArray;
    }

    protected function createHttpData():HttpData
    {
        switch($this->method)
        {
            case self::HTTP_METHOD_GET :
                return new HttpGetData() ;
                break ;
            case self::HTTP_METHOD_POST :
                return new HttpPostData($_SERVER['CONTENT_TYPE']) ; // 把需要做的設定放在constructor，讓方法盡可能乾淨
                break ;
            default :
                echo 'no http method been matched.' ;
        }
    }
}