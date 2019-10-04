<?php
namespace History;

use Navigation;
use Shared\BaseController;

class Controller extends BaseController
{
    public function index()
    {
        $this -> handle(Navigation::$status);
        $s = new Stuff('it\'s a thing');
        $this -> handle($s -> showthings());
    }
}