<?php

namespace Test\Factory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Test\Controller\TestController;
use Interop\Container\ContainerInterface;
use Test\Model\Test;

class TestControllerFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        
        return new TestController($container->get(Test::class));
    }

}
