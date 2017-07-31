<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Test\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Test\Model\Test;
class TestController extends AbstractActionController {

    private $data;
    function __construct(Test $data) {
        $this->data = $data;
    }
    public function indexAction() {
        print_r($this->data->getHello());
        //echo $this->data->getHello();
        $this->layout('layout/test');
        //return new ViewModel();
    }
    

}
