<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Db\TableGateway\TableGateway;

class LoginController extends AbstractActionController {

    private $table;

    public function __construct(TableGateway $bangnguoidung) {
        $this->table = $bangnguoidung;
    }

    public function indexAction() {
        $this->layout('layout/login');
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $data = $this->table->select(array('taikhoan' => $username, 'matkhau' => $password));
            $row = $data->current();
            if (isset($row)) {
                die('ok');
            } else {
                
                return new ViewModel(array(
                    'loi' => 'Tên tài khoản hoặc mật khẩu không đúng!'
                ));
            }
        }
        
        return new ViewModel();
    }

}
