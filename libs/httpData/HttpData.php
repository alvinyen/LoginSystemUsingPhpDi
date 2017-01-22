<?php

namespace LoginSystemUsingPhpDi\libs\httpData;

require_once __DIR__ . "/../../vendor/autoload.php";


interface HttpData
{
    function parse():array ;
}