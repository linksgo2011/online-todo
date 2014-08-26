<?php

class DATABASE_CONFIG {
    public $default = array(
        'datasource' => 'Database/Mysql',
        'persistent' => false,
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'todo',
        'prefix' => '',
        'encoding' => 'UTF8',
    );

    // 主数据库
    public $master = array(
        'datasource' => 'Database/Mysql',
        'persistent' => false,
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'todo',
        'prefix' => '',
        'encoding' => 'UTF8',
    );
}