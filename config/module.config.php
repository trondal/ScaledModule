<?php

namespace ScaledModule;

return array(
    'router' => array(
        'routes' => array(
            'ScaledModule' => array(
                'type' => 'Zend\Mvc\Router\Http\Hostname',
                'options' => array(
                    'route' => 'scaledmodule.[:opt1.][:opt2.][:opt3.][:opt4.]:tld',
                    'defaults' => array(
                        '__NAMESPACE__' => 'ScaledModule\Controller',
                        'action' => 'index'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'index' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/',
                            'defaults' => array(
                                'controller' => 'ScaledModule\Controller\IndexController',
                                'action' => 'index'
                            ),
                        )
                    )
                )
            )
        )
    ),
    'service_manager' => array(
        'aliases' => array(
          'translator' => 'MvcTranslator'
        ),
        'invokables' => array(),
        'factories' => array()
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'phparray',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.php',
                'text_domain' => __NAMESPACE__
            ),
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'ScaledModule\Controller\IndexController' => 'ScaledModule\Controller\IndexController',
        ),
        'factories' => array()
    ),
    'view_manager' => array(
        'template_map' => array(
            'layout/layout' =>  __DIR__ . '/../view/layout.phtml',
            'scaled-module/index/index' => __DIR__ . '/../view/index.phtml',
        ),
        'strategies' => array(
            'ViewJsonStrategy'
        )
    ),
    'module_layouts' => array('ScaledModule' => 'layout/layout'),
    'doctrine' => array(
        'configuration' => array(
            'orm_scaledmodule' => array(
                'metadata_cache' => 'array',
                'query_cache' => 'array',
                'result_cache' => 'array',
                'driver' => 'orm_scaledmodule',
                'generate_proxies' => true,
                'proxy_dir' => sys_get_temp_dir(),
                'proxy_namespace' => 'DoctrineORMModule\Proxy',
                'filters' => array()
            )
        ),
        'driver' => array(
            __NAMESPACE__ . '_Driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/' . __NAMESPACE__ . '/Entity'
                )
            ),
            'orm_scaledmodule' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\DriverChain',
                'drivers' => array(
                    'ScaledModule\Entity' => __NAMESPACE__ . '_Driver'
                )
            ),
        ),
        'entitymanager' => array(
            'orm_scaledmodule' => array(
                'connection' => 'orm_scaledmodule',
                'configuration' => 'orm_scaledmodule'
            )
        ),
        'eventmanager' => array(
            'orm_scaledmodule' => array()
        ),
        'sql_logger_collector' => array(
            'orm_scaledmodule' => array(),
        ),
        'entity_resolver' => array(
            'orm_scaledmodule' => array()
        ),
    ),
    'asset_manager' => array(
        'resolver_configs' => array(
            'paths' => array(
                'scaledmodule' => realpath(__DIR__ . '/../public'),
            ),
            /*'prefix_map' => array(
                'scaledmodule' => sys_get_temp_dir() . '/ScaledModule'
            )*/
        ),
        /*'resolvers' => array(
            'ScaledModule\Service\PathPrefixResolver' => 3000
        )*/
    ),
);