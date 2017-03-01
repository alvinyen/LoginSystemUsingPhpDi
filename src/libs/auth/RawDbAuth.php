<?php

namespace LoginSystemUsingPhpDi\libs\auth;

//include_once __DIR__ . "/Auth.php";

require_once __DIR__ . "/../../../vendor/autoload.php";

use LoginSystemUsingPhpDi\libs\auth\Auth ;

class RawDbAuth implements Auth
{
    protected $connection = null ;


    public function __construct(string $dbHost, string $dbUser, string $dbPassword, string $dbName)
    {
        $connection = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName) ;
        if (!$connection) {
            die("connection failed" . mysqli_error($this->connection));
        }
        $this->connection = $connection ;
    }

    public function check(string $user, string $password):bool
    {
        $check = false ;

        $query = "SELECT * " ;
        $query .= "FROM " . Auth::TABLE_NAME . " " ;
        $query .= "WHERE user='{$user}' AND password='{$password}' ;" ;

        $result = mysqli_query($this->connection, $query) ;

        if (!$result) {
            die("mysqli query failed" . mysqli_error($this->connection));
        } elseif (mysqli_num_rows($result)) {
            $check = true ;
        }

        return $check ;
    }
}
