<?php
namespace LoginSystemUsingPhpDi\libs;

interface Auth
{
    function check(string $user, string $password):bool;
}