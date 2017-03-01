<?php
/**
 * Created by PhpStorm.
 * User: KJ-Yen
 * Date: 2017/1/20
 * Time: 下午3:06
 */

namespace LoginSystemUsingPhpDi\libs\auth;

//include_once __DIR__ . "/Auth.php";

require_once __DIR__ . "/../../../vendor/autoload.php";

use LoginSystemUsingPhpDi\libs\auth\Auth ;
use ORM ;

class IdiormDbAuth implements Auth
{
    public function __construct(string $dsn, string $user, string $password)
    {

        ORM::configure(
            array(
                'connection_string' => $dsn ,
                'username' => $user ,
                'password' => $password
            )
        );

        ORM::configure('return_result_sets', true);
    }

    public function check(string $user, string $password):bool
    {
        $check =false ;
        $whereConditionArray = array( 'user' => $user , 'password' => $password );
        if (ORM::forTable(Auth::TABLE_NAME)->where($whereConditionArray)->findOne()) {
            $check = true ;
        }

        return $check ;
    }
}
