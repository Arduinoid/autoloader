<?php

namespace Net;

use Shared\BaseModel;

class Http extends BaseModel
{
    public function request()
    {
        return $this -> result(json_encode(['message' => 'Hello from HTTP!']));
    }
}