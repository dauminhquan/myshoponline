<?php
namespace Admin\Factory;
use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\AdapterInterface;
use Admin\Controller\LoginController;
use Zend\Db\TableGateway\TableGateway;
class LoginControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $adapter = $container->get(AdapterInterface::class); 
        $tablegetway = new TableGateway('nguoidung',$adapter);
        return new LoginController($tablegetway);
    }

}
