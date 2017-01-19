<?php
namespace LoginSystemUsingPhpDi\libs;

interface Auth
{
    const TABLE_NAME = "Member";
    function check(string $user, string $password):bool;
}