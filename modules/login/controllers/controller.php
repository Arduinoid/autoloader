<?php
namespace Login;

use Shared\AuthController;

class Controller extends AuthController
{
    public function __construct($logged_in)
    { parent::__construct($logged_in); }

    public function index()
    {
        $msg = new Message();
        $r = new \Net\Http();
        $d = new \Foo\Bar\Baz\Dude();


        $this -> handle($d -> msg);
        $this -> handle($msg -> output());
        $this -> handle($r -> request());
    }
}