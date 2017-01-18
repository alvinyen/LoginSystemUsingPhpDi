<?php

namespace LoginSystemUsingPhpDi\libs;
include_once "Auth.php" ;
use \LoginSystemUsingPhpDi\libs\Auth ;

class DbAuth implements Auth
{
    protected $connection = null ;
    const TABLE_NAME = "Member";

    public function __construct(string $dbHost, string $dbUser, string $dbPassword, string $dbName)
    {
        $connection = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName) ;
        if(!$connection){
            die("connection failed" . mysqli_error($this->connection));
        }
        echo 'connecting to db' . PHP_EOL ;
        $this->connection = $connection ;
    }

    public function check(string $user, string $password):bool
    {

        $check = false ;
        $tableName = self::TABLE_NAME ;

        $query = "SELECT * " ;
        $query .= "FROM {$tableName} " ;
        $query .= "WHERE user='{$user}' AND password='{$password}' ;" ;
//        echo $query . PHP_EOL ;

        $result = mysqli_query($this->connection, $query) ;

        if(!$result){
            die("query failed" . mysqli_error($this->connection));
        }else if(mysqli_num_rows($result)>0){
            $check = true ;
        }

        return $check ;
    }
}