<?php

namespace App\System\Routes;

interface RouteInterface
{
    public function processRequest(String $method, String $path, Array $params);
}