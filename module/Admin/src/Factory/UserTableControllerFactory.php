<?php
namespace Admin\Factory;
use Admin\Controller\UserTableController;
use Zend\ServiceManager\Factory\FactoryInterface;
use Admin\Model\BangNguoiDung;
use Interop\Container\ContainerInterface;
class UserTableControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        
        return new UserTableController($container->get(BangNguoiDung::class));
    }
}
