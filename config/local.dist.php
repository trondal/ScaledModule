<?php

return array(
    'doctrine' => array(
        'connection' => array(
            'orm_ScaledModule' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOPgSql\Driver',
                'params' => array(
                    'host' => 'localhost',
                    'port' => '5432',
                    'user' => '',
                    'password' => '',
                    'dbname' => '',
                )
            )
        )
    )
);