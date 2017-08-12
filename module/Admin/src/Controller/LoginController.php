<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Admin\Model\Authentication;

class LoginController extends AbstractActionController {

    private $authen;

    public function __construct(Authentication $authen) {
        $this->authen = $authen;
    }

    public function indexAction() {

//        if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
//            header('Local ' . $this->redirect()->toRoute('admin', ['action' => 'index']));
//        }
        $this->layout('layout/login');
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $this->authen->setIdentity($username, $password);
            if ($this->authen->hasIdentity()) {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['id'] = $this->authen->getIdentityAdapter()->getResultRowObject()->id_nguoidung;
                header('Local ' . $this->redirect()->toRoute('admin', ['action' => 'index']));
            } else {

                return new ViewModel(array(
                    'loi' => 'Tên tài khoản hoặc mật khẩu không đúng!'
                ));
            }
        }
        $this->authen->clearIdentity();
        return new ViewModel();
    }

}
