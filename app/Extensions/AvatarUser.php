<?php

namespace App\Extensions;

use Illuminate\Contracts\Auth\Authenticatable;

class AvatarUser implements Authenticatable
{
    public function getAuthIdentifierName()
    {
        ;
    }
    public function getAuthIdentifier()
    {
        ;
    }
    public function getAuthPassword()
    {
        ;
    }
    public function getRememberToken()
    {
        ;
    }
    public function setRememberToken($value)
    {
        ;
    }
    public function getRememberTokenName()
    {
        ;
    }
}