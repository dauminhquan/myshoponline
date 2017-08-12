<?php
namespace Admin\Factory;
use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Admin\Controller\LoginController;
use Admin\Model\Authentication;
class LoginControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        return new LoginController($container->get(Authentication::class));
    }

}
