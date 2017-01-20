<?php

namespace LoginSystemUsingPhpDi\libs;

require_once __DIR__ . "/../vendor/autoload.php";


interface HttpData
{
    function parse():array ;
}