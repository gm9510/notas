<?php

namespace notas\src\core;

abstract class Model
{
    public function loadData(array $data) 
    {
        foreach ($data as $key => $value) {
            if(property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    abstract public function rules(): array;

    public function validate() 
    {
    }

}
