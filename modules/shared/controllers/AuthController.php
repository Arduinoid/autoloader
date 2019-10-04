<?php

namespace Shared;

class AuthController extends BaseController
{
    public function __construct($logged_in)
    {
        $output = $logged_in ? 'User logged in' : 'Not logged in';
        echo $output . PHP_EOL;
    }
}