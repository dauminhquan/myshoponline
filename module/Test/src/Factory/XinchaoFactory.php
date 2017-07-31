<?php
namespace Test\Factory;
use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Test\Model\Xinchao;
use Test\Model\Test;
class XinchaoFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        
        return new Test($container->get(Xinchao::class));
    }

}