<?php

return array(
    'doctrine' => array(
        'connection' => array(
            'orm_scaledmodule' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOPgSql\Driver',
                'params' => array(
                    'host' => 'localhost',
                    'port' => '5432',
                    'user' => 'mcms',
                    'password' => 'mcms',
                    'dbname' => 'mcms',
                )
            )
        )
    )
);