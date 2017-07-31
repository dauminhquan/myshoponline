<?php
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
class IndexController extends AbstractActionController {
    public function indexAction() {
        $_SESSION['name'] = 'Quân';
        $this->layout('layout/layout');
        return new ViewModel();
    }
}
