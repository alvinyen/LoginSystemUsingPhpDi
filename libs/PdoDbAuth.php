<?php
namespace LoginSystemUsingPhpDi\libs;
include_once __DIR__ . "/Auth.php" ;
use \LoginSystemUsingPhpDi\libs\Auth ;
use \PDO ;

class PdoDbAuth implements Auth
{
    protected $databaseHandler ;
    protected $statement ;

    public function __construct(string $dsn, string $user, string $password)
    {
        try{
            $this->databaseHandler = new PDO($dsn, $user, $password) ;
        }catch (\PDOException $e){
            echo "Connection Failed" . $e->getMessage() ;
        }
    }

    function check(string $user, string $password):bool{
        $check = false ;

        $query = "SELECT count(*) " ;
        $query .= "FROM " . Auth::TABLE_NAME . " " ;
        $query .= "WHERE user=:user AND password=:password ;" ;

        $statement = $this->databaseHandler->prepare($query);
        $statement->bindValue(':user', $user);
        $statement->bindValue(':password', $password);
        $statement->execute() ;

        if($statement->fetchColumn()){
            $check = true ;
        }

        return $check ;
    }
}

