<?php
namespace LoginSystemUsingPhpDi\libs\auth;

require_once __DIR__ . "/../../../vendor/autoload.php";

interface Auth
{
    const TABLE_NAME = "Member";

    public function check(string $user, string $password):bool;
}
