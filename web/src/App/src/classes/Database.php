<?php

declare(strict_types=1);

namespace App\classes;

class Database
{
    /**
     * @var \PDO
     */
    protected $instance;

    public function __construct()
    {
        $this->instance = new \PDO("mysql:host=mysql;dbname=sogg_db;charset=utf8", "root", "root");
        $this->instance->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
        $this->instance->setAttribute( \PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ );
    }
}
