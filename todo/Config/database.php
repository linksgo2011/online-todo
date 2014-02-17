<?php

class DATABASE_CONFIG {
    public $default = array(
        'datasource' => 'Database/Mysql',
        'persistent' => false,
        // 'host' => 'yinuoinfo.8866.org',
        'host' => 'yinuoinfo.f3322.org',
        'login' => 'ecode_yn',
        'password' => 'ecode_aa_098yn',
        'database' => 'rt_todo',
        // 'host' => 'localhost',
        // 'login' => 'root',
        // 'password' => '',
        // 'database' => 'rt_todo',
        'prefix' => '',
        'encoding' => 'UTF8',
    );

    // 主数据库
    public $master = array(
        'datasource' => 'Database/Mysql',
        'persistent' => false,
        'host' => '10.241.86.26',
        'login' => 'yinuoinfo_salary',
        'password' => 'E4Pjp5yNV9qpS4R',
        'database' => 'yinuoinfo_salary',
        'prefix' => '',
        'encoding' => 'UTF8',
    );
    // 从数据库（如果有多个从数据库，则自然增加，如 $slave2, $slave3 ...）
    public $slave1 = array(
        'datasource' => 'Database/Mysql',
        'persistent' => false,
        'host' => '10.241.86.26',
        'login' => 'yinuoinfo_salary',
        'password' => 'E4Pjp5yNV9qpS4R',
        'database' => 'yinuoinfo_salary',
        'prefix' => '',
        'encoding' => 'UTF8',
    );

}