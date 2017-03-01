<?php

namespace LoginSystemUsingPhpDi\libs\httpData;

require_once __DIR__ . "/../../../vendor/autoload.php";


interface HttpData
{
    public function parse():array ;
}
