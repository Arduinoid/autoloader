<?php

namespace Shared;
use Autoload\ModuleClassLoader;

class BaseController
{
    protected function handle($text)
    { echo $text . PHP_EOL; }
}