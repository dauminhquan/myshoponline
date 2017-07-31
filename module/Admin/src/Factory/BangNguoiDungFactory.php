<?php
namespace Admin\Factory;
use Zend\Db\Adapter\AdapterInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Zend\Db\TableGateway\TableGateway;
use Admin\Model\BangNguoiDung;
class BangNguoiDungFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $adapter = $container->get(AdapterInterface::class);
        $tablegetway = new TableGateway('nguoidung',$adapter);
        return new BangNguoiDung($tablegetway);
    }

}

