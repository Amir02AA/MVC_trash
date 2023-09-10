<?php

namespace models;

use core\Model;

class Login extends Model
{
    protected $username = '';
    protected $password = '';

    public function rules()
    {
        return [
            'username' => [self::Required_Rule],
            'password' => [self::Required_Rule, [self::Min_Rule, 'min' => 5]],
        ];
    }
}