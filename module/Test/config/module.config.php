<?php

namespace Test;
use Test\Model\Test;
use Test\Model\TestInterface;
use Zend\Router\Http\Segment;
use Test\Model\Xinchao;
use Test\Factory\XinchaoFactory;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'test' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/test[/:action]',
                    'defaults' => [
                        'controller' => Controller\TestController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\TestController::class => Factory\TestControllerFactory::class,
             //Factory\TestControllerFactory::class => Model\XinchaoFactory::class,
          
        ],
    ],
    'service_manager' => [ // đăng ký server ----------------
        'aliases' => [
            //TestInterface::class => Test::class,
        ],
        'factories' => [
             Test::class => InvokableFactory::class,
             //Xinchao::class => InvokableFactory::class,//hàm khởi tạo không biến số
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/test' => __DIR__ . '/../view/layout/testlayout.phtml',
            'test/index/index' => __DIR__ . '/../view/test/index/index.phtml',
            'test/index/add' => __DIR__ . '/../view/test/index/add.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
