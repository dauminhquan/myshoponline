<?php
namespace Admin\Factory;
use Admin\Controller\ProductTableController;
use Zend\ServiceManager\Factory\FactoryInterface;
class TestFactory implements FactoryInterface
{
    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null) {
        return new ProductTableController();
    }
}
