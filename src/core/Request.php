<?php

namespace notas\src\core;

class Request
{
    public function getPath() 
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path,'?');
        if(!$postion) {
            return $path;
        }
        $path = substr($path, 0, $position);
        return $path;
    }

    public function getMethod()
    {
    }
}
