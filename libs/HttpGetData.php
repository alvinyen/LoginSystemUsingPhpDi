<?php

namespace LoginSystemUsingPhpDi\libs ;
include_once "HttpData.php" ;
use LoginSystemUsingPhpDi\libs\HttpData ;


class HttpGetData implements HttpData
{
    public function parse():array
    {
        $httpGetDataArray = $_GET ;
        return $httpGetDataArray ;
    }
}