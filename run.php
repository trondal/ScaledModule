<?php

chdir(dirname(__DIR__));

// Setup autoloading
require 'vendor/autoload.php';

$config = array(
    'modules' => array(
        'ScaledModule',
        'AssetManager',
        'EdpModuleLayouts',
        'DoctrineModule',
        'DoctrineORMModule'
    ),
    'module_listener_options' => array(
        'config_glob_paths' => array(
            __DIR__ . '/config/local.php',
        ),
        'module_paths' => array(
            'src',
            'vendor'
        )
    ),
);

// Run the application!
Zend\Mvc\Application::init($config)->run();