<?php

namespace Admin;

use Zend\Db\Adapter\AdapterInterface;
use Admin\Model\BangSanpham;
use Admin\Controller\ProductTableController;
use Admin\Model\BangNhomsanpham;
use Admin\Model\BangLoaisanpham;
use Zend\Mvc\MvcEvent;

class Module {

    const VERSION = '3.0.3-dev';

    public function getConfig() {

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

    public function getControllerConfig() {

        return array(
            'factories' => [
                Controller\ProductTableController::class => function ($container) {
                    //die('dangchay');
                    return new ProductTableController(
                            $container->get(BangSanpham::class), $container->get(BangNhomsanpham::class), $container->get(BangLoaisanpham::class)
                    );
                },]
        );
    }

    public function onBootstrap(MvcEvent $event) {
        session_start();
        $eventManager = $event->getApplication()->getEventManager();
        
        $eventManager->attach(MvcEvent::EVENT_ROUTE, function ($e) {
            $controllerName = $e->getRouteMatch()->getParam('controller', null);
            if (Controller\IndexController::class === $controllerName || ProductTableController::class === $controllerName) {
                $auth = $e->getApplication()
                        ->getServiceManager()
                        ->get(Model\Authentication::class);
                if (false === $auth->hasIdentity()) {
                    $url = $e->getRouter()->assemble(array(), array('name' => 'admin/login'));
                    $response = $e->getResponse();
                    $response->getHeaders()->addHeaderLine('Location', $url);
                    $response->setStatusCode(302);
                    $response->sendHeaders();
                    return $response;
                }
            }
        }, -100);
    }

    function onDispatchError(MvcEvent $e) {
        $viewModel = $e->getViewModel();
        $viewModel->setTemplate('layout/error');
    }

}
