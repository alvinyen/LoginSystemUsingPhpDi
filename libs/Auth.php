<?php
namespace LoginSystemUsingPhpDi\libs;

require_once __DIR__ . "/../vendor/autoload.php";

interface Auth
{
    const TABLE_NAME = "Member";

    function check(string $user, string $password):bool;
}