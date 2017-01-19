<?php

namespace LoginSystemUsingPhpDi\libs;
include_once __DIR__ . "/Request.php" ;
include_once __DIR__ . "/Auth.php" ;
use \LoginSystemUsingPhpDi\libs\Request ;
use \LoginSystemUsingPhpDi\libs\Auth ;



class App
{
    protected $request = null ;
    protected $auth = null ;

    public function __construct(Request $request, Auth $auth)
    {
        $this->request = $request ;
        $this->auth = $auth ;
    }

    public function login():bool {
        $dataArray = $this->request->getDataArray() ;
        $user = $dataArray['user'] ;
        $password = $dataArray['password'] ;
        return $this->auth->check($user,$password) ;
    }
}