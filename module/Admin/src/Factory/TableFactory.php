<?php

namespace Admin\Factory;
use Zend\Db\Adapter\AdapterInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Admin\Model\BangKhachhang;
class TableFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        return new BangKhachhang($container->get(AdapterInterface::class));
    }

}
