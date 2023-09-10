<?php

namespace models\database;

use Dotenv\Dotenv;

class SqlConfig
{
    public static function getConfig()
    {
        $envs = Dotenv::createImmutable('../')->load();
        $config = [
            'dsn' => $envs['SQL_DSN'],
            'user' => $envs['SQL_USERNAME'],
            'password' => $envs['SQL_PASSWORD']
        ];

        return $config;

    }
}