<?php

namespace Admin;

use Admin\Controller\IndexController;
use Admin\ModelInterface\TableInterface;
use Zend\Router\Http\Segment;
use Zend\Router\Http\Literal;
use Admin\Factory\UserTableControllerFactory;
use Admin\Controller\UserTableController;
use Admin\Controller\ProductTableController;
use Admin\Controller\LoginController;
use Admin\Factory\LoginControllerFactory;
use Admin\Factory\IndexControllerFactory;
use Admin\Controller\LogoutController;
use Zend\ServiceManager\Factory\InvokableFactory;
use Admin\Controller\InvoiceController;
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
                            'route' => '/user[/:action]',
                            'defaults' => [
                                'controller' => Controller\UserTableController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                    'producttable' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/product[/:action]',
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
                    'logout' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/logout',
                            'defaults' => [
                                'controller' => LogoutController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                    'profile' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/profile[/:action]',
                            'defaults' => [
                                'controller' => Controller\ProfileController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                    'invoice' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/invoice[/:action]',
                            'defaults' => [
                                'controller' => Controller\InvoiceController::class,
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
            IndexController::class => IndexControllerFactory::class,
            UserTableController::class => UserTableControllerFactory::class,
            LoginController::class => LoginControllerFactory::class,
            LogoutController::class=>  InvokableFactory::class,
            Controller\ProfileController::class => InvokableFactory::class,
            InvoiceController::class => Factory\InvoiceControllerFactory::class,
            
            
        ],
    ],
    'service_manager' => [ // đăng ký server ----------------
        'aliases' => [
            TableInterface::class => Model\BangNguoiDung::class,
             ModelInterface\AuthenticationInterface::class => Model\Authentication::class,
        ],
        'factories' => [
            Model\BangNguoiDung::class => Factory\BangNguoiDungFactory::class,
            Model\BangSanpham::class => Factory\BangSanphamFactory::class,
            Model\BangNhomsanpham::class => Factory\BangNhomsanphamFactory::class,
            Model\BangLoaisanpham::class => Factory\BangLoaisanphamFactory::class,
            Model\BangDonhang::class => Factory\BangDonhangFactory::class,
            Model\Authentication::class => Factory\AuthenticationFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/admin' => __DIR__ . '/../view/layout/adminlayout.phtml',
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
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
