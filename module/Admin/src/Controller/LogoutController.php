<?php
namespace Admin\Controller;
use Zend\Mvc\Controller\AbstractActionController;
class LogoutController extends AbstractActionController
{
    public function indexAction() {
        session_start();
        session_destroy();
        header('Local '.$this->redirect()->toRoute('admin/login',['controller'=>'index','action'=>'index']));
    }
}
