<?php
/**
 * Created by PhpStorm.
 * User: KJ-Yen
 * Date: 2017/1/18
 * Time: 上午10:04
 */

namespace LoginSystemUsingPhpDi\libs;
use LoginSystemUsingPhpDi\libs\Request ;


class HttpGetRequest extends Request
{
    protected function parseData():array{
        $this->data = $_GET ;
        var_dump($this->data) ;
        echo "<br><br>";
        return $this->data ;
    }
}