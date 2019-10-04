<?php
namespace Profile;

use Shared\AuthController;

class Controller extends AuthController
{
    public function __construct($logged_in)
    { parent::__construct($logged_in); }

    public function index()
    {
        $profile = new Profile('Bob');
        $this -> handle("Your profile is not complete: {$profile -> name}");
    }
}