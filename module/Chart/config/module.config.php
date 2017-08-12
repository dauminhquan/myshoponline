<?php 
namespace Chart;

use Zend\Router\Http\Segment;
use Chart\Controller\IndexController;
use Zend\ServiceManager\Factory\InvokableFactory;
return [
    'controllers' => [
        'factories' => [
            IndexController::class => InvokableFactory::class,
        ],
    ],

    // The following section is new and should be added to your file:
    'router' => [
        'routes' => [
            'chart' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/chart[/:action]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ],
                    'defaults' => [
                        'controller' => IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/chartlayout' => __DIR__ . '/../view/layout/chart.phtml',
            'chart/index/index' => __DIR__ . '/../view/chart/index/index.phtml',
            'chart/index/test' => __DIR__ . '/../view/chart/index/test.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            'chart' => __DIR__ . '/../view',
        ],
        'strategies' => array ( 'ViewJsonStrategy'),
    ],
];
?>