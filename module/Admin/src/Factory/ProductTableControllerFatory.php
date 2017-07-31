<?php
namespace Admin\Factory;
use Admin\Controller\ProductTableController;
use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Admin\Model\BangSanpham;
use Admin\Model\BangNhomsanpham;
use Admin\Model\BangLoaisanpham;
class ProductTableControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        return new ProductTableController(
                $container->get(BangSanpham::class),
                $container->get(BangNhomsanpham::class),
                $container->get(BangLoaisanpham::class)
                );
    }
}
