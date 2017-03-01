<?php

namespace LoginSystemUsingPhpDi\libs\httpData;

//include_once "HttpData.php";

require_once __DIR__ . "/../../../vendor/autoload.php";

use LoginSystemUsingPhpDi\libs\httpData\HttpData ;

class HttpGetData implements HttpData
{
    public function parse():array
    {
        $httpGetDataArray = $_GET ;
        return $httpGetDataArray ;
    }
}
