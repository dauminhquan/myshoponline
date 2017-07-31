<?php

namespace Admin;

use Admin\Controller\IndexController;
use Admin\ModelInterface\TableInterface;
use Zend\Router\Http\Segment;
use Zend\Router\Http\Literal;
use Zend\ServiceManager\Factory\InvokableFactory;
use Admin\Factory\ProductTableControllerFactory;
use Admin\Factory\UserTableControllerFactory;
use Admin\Controller\UserTableController;
use Admin\Controller\ProductTableController;
use Admin\Controller\LoginController;
use Admin\Factory\LoginControllerFactory;
return [
    'router' => [
        'routes' => [
            'admin' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/administrators',
                    'defaults' => [
                        'controller' => IndexController::class,
                        'action' => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'usertable' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/usertable[/:action]',
                            'defaults' => [
                                'controller' => Controller\UserTableController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                    'producttable' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/producttable[/:action]',
                            'defaults' => [
                                'controller' => ProductTableController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                    'login' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/login',
                            'defaults' => [
                                'controller' => LoginController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            IndexController::class => InvokableFactory::class,
            UserTableController::class => UserTableControllerFactory::class,
            LoginController::class => LoginControllerFactory::class,
            //ProductTableController::class => ProductTableControllerFactory::class,
        ],
    ],
    'service_manager' => [ // đăng ký server ----------------
        'aliases' => [
            TableInterface::class => Model\BangNguoiDung::class,
        ],
        'factories' => [
            Model\BangNguoiDung::class => Factory\BangNguoiDungFactory::class,
            Model\BangSanpham::class => Factory\BangSanphamFactory::class,
            Model\BangNhomsanpham::class => Factory\BangNhomsanphamFactory::class,
            Model\BangLoaisanpham::class => Factory\BangLoaisanphamFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/adminlayout.phtml',
            'layout/login' => __DIR__ . '/../view/layout/loginlayout.phtml',
            'admin/index/index' => __DIR__ . '/../view/admin/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'module_layouts' => array(
        'admin' => array(
            'defaults' => 'layout/layout',
            'login' =>'layout/login'
        )
        
    ),
];
