<?php

namespace App\Service;

class GetField
{
    public function getFieldName()
    {
        return $this->has('email') ? 'email' : 'name' ;
    }
}
