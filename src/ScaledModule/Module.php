<?php

namespace ScaledModule;

use DoctrineModule\Service\DriverFactory;
use DoctrineModule\Service\EventManagerFactory;
use DoctrineORMModule\Service\ConfigurationFactory;
use DoctrineORMModule\Service\DBALConnectionFactory;
use DoctrineORMModule\Service\EntityManagerFactory;
use DoctrineORMModule\Service\EntityResolverFactory;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements ConfigProviderInterface, ServiceProviderInterface {

    public function getConfig() {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function getServiceConfig() {
        return array(
            'aliases' => array(
                'orm_scaledmodule' => 'doctrine.entitymanager.orm_scaledmodule'
            ),
            'factories' => array(
                'doctrine.entitymanager.orm_scaledmodule' => new EntityManagerFactory('orm_scaledmodule'),
                'doctrine.connection.orm_scaledmodule' => new DBALConnectionFactory('orm_scaledmodule'),
                'doctrine.configuration.orm_scaledmodule' => new ConfigurationFactory('orm_scaledmodule'),
                'doctrine.driver.orm_scaledmodule' => new DriverFactory('orm_scaledmodule'),
                'doctrine.eventmanager.orm_scaledmodule' => new EventManagerFactory('orm_scaledmodule'),
                'doctrine.entity_resolver.orm_scaledmodule' => new EntityResolverFactory('orm_scaledmodule'),
            )
        );
    }

}