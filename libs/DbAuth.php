<?php

namespace LoginSystemUsingPhpDi\libs;
include_once "Auth.php" ;
use \LoginSystemUsingPhpDi\libs\Auth ;

class DbAuth implements Auth
{
    protected $connection = null ;
    public function __construct(string $host, string $id, string $password, string $dbname)
    {
        $connection = mysqli_connect($host, $id, $password, $dbname) ;
        if(!$connection){
            die("connection failed");
        }
        $this->$connection =$connection ;
    }

    public function check():bool{
        $check = true ;
        // do something ..
        return $check ;
    }
}