<?php

namespace Chart\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;
use Zend\Db\Adapter\Adapter;
use Zend\EventManager\EventManager;
class IndexController extends AbstractActionController {

    public function IndexAction() {
        $this->layout('layout/chartlayout');
        $dt = new \File\File();
    }

    public function TestAction() {
        $this->layout('layout/chartlayout');
//        $events = new EventManager();
//        $events->attach('do', function ($e) {
//            $event = $e->getName();
//            $params = $e->getParams();
//            printf(
//                    'Handled event "%s", with parameters %s', $event, json_encode($params)
//            );
//        });
//
//        $params = ['foo' => 'bar', 'baz' => 'bat'];
//        $events->trigger('do', null, $params);
            $e = new \Admin\Factory\AuthenticationFactory;
            $e->getIdentityAdapter();
       
        return new ViewModel();
    }

}
