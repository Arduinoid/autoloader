<?php
namespace History;

class Stuff
{
    private $things;

    public function __construct($things)
    { $this -> things = $things; }

    public function showThings()
    { return $this -> things; }
}