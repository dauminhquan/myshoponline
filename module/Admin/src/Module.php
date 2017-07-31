<?php


namespace Admin;
use Zend\Db\Adapter\AdapterInterface;
use Admin\Model\BangSanpham;
use Admin\Controller\ProductTableController;
use Admin\Model\BangNhomsanpham;
use Admin\Model\BangLoaisanpham;
class Module
{
    const VERSION = '3.0.3-dev';

    public function getConfig()
    {
        
        return include __DIR__ . '/../config/module.config.php';
    }
    public function getServiceConfig() {
        
        return array(
            'factories' => array(
                // gọi file kết nối cơ sở dữ liệu ra
                Model\BangKhachhang::class => function ($sm) {
                    $dbAdapter = $sm->get(AdapterInterface::class);
                    return new Model\BangKhachhang($dbAdapter);
         
                }
            )
        );
    }
    public function getControllerConfig()
    {
        
        return array(
            'factories' =>[
        Controller\ProductTableController::class => function ($container)
        {
            //die('dangchay');
            return new ProductTableController(
                $container->get(BangSanpham::class),
                $container->get(BangNhomsanpham::class),
                $container->get(BangLoaisanpham::class)
                );
        },]
        );
    }

}
