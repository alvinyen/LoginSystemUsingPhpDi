<?php

namespace LoginSystemUsingPhpDi\libs ;

//include_once __DIR__ . "/httpData/httpData.php";
//include_once __DIR__ . "/httpData/HttpGetData.php";
//include_once __DIR__ . "/httpData/HttpPostData.php";

require_once __DIR__ . "/../../vendor/autoload.php";

use LoginSystemUsingPhpDi\libs\httpData\HttpData ;
use LoginSystemUsingPhpDi\libs\httpData\HttpGetData ;
use LoginSystemUsingPhpDi\libs\httpData\HttpPostData ;

class Request
{
    protected $method = null ;
    const HTTP_METHOD_GET = "GET" ;
    const HTTP_METHOD_POST = "POST" ;

    public function __construct(string $method)
    {
        $this->method = $method ;
    }

    public function getDataArray():array
    {
        $dataArray = $this->createHttpData()->parse() ;
        return $dataArray;
    }

    protected function createHttpData():HttpData
    {
        $httpData = null ;
        // !!!!!debug!!!!!
//        echo $this->method ;
        switch ($this->method) {
            case self::HTTP_METHOD_GET:
                $httpData = new HttpGetData() ;
                break ;
            case self::HTTP_METHOD_POST:
                $httpData = new HttpPostData($_SERVER['CONTENT_TYPE']) ; // 把需要做的設定放在constructor，讓方法盡可能乾淨
                break ;
            default:
                echo 'no http method been matched.' ;
        }
        return $httpData ;
    }
}
