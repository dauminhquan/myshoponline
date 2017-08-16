<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Admin\Model\BangNguoiDung;
use Admin\Model\NguoiDung;
class UserTableController extends AbstractActionController {

    private $bangnguoidung;
    private $crid;
    public function __construct(BangNguoiDung $bangnguoidung) {
        $this->bangnguoidung = $bangnguoidung;
    }
    public function indexAction() {
        $result = $this->bangnguoidung->Laytoanbo();
        $data = array();
        foreach ($result as $row) {
            if($row['id_nguoidung'] != $_SESSION['id'])
            {
                array_push($data, $row);
            }
            
        }
        $_SESSION['themejs'] = '<script type="text/javascript" src="/shop/public/assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="/shop/public/assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="/shop/public/assets/js/core/app.js"></script>
	<script type="text/javascript" src="/shop/public/assets/js/pages/datatables_api.js"></script>';
        $this->layout('layout/admin');
        return new ViewModel(array(
            'table' => $data,
        ));
    }
    public function addAction()
    {
        $this->layout('layout/admin');
        $user = new NguoiDung();
        if(isset($_POST['taikhoan']))
        {
            $user->Copydata($_POST);
            try{
                $this->bangnguoidung->Luu($user);
                header('Local ' . $this->redirect()->toRoute('admin/usertable', ['action' => 'index']));
            } catch (Exception $ex) {
                echo 'Lỗi';
            };
           
        }
         
    }
    public function profileAction()
    {
        
    }

    public function editAction() {
        $this->layout('layout/admin');
        if($this->getRequest()->isPost())
        {
            $user = new NguoiDung();
//            print_r($this->getRequest()->getPost());
//            die();
            $user->Copydata($this->getRequest()->getPost());
            $this->bangnguoidung->Luu($user);
            return $this->redirect()->toRoute('admin/usertable', ['action' => 'index']);
        }
        if(!isset($_GET['id']))
        {
            return $this->redirect()->toRoute('admin/usertable', ['action' => 'index']);
        }

        $table = $this->bangnguoidung->LaytheoId($_GET['id']);
        $data = $table;
        if(!$data)
        {
            echo 'loi';
            die();
        }
        return new ViewModel($data);
    }
    public function deleteAction()
    {
        if (isset($_POST['id'])) {
            
            if(!$this->bangnguoidung->Xoa($_POST['id']))
            {
                return new \Zend\View\Model\JsonModel(array('id'=>FALSE));
            }
                return new \Zend\View\Model\JsonModel(array('id'=>TRUE));
            
        }
        return new \Zend\View\Model\JsonModel(array('id'=>FALSE));
    }
}
