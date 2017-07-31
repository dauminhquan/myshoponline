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

    public function __construct(BangNguoiDung $bangnguoidung) {
        $this->bangnguoidung = $bangnguoidung;
    }

    public function indexAction() {
        $result = $this->bangnguoidung->Laytoanbo();
        $data = array();
        foreach ($result as $row) {
            array_push($data, $row);
        }
        $_SESSION['name'] = 'Quân';
        $_SESSION['scriptfile'] = '<script type="text/javascript" src="http://localhost:8081/shop/public/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="http://localhost:8081/shop/public/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="http://localhost:8081/shop/public/js/core/app.js"></script>
	<script type="text/javascript" src="http://localhost:8081/shop/public/js/pages/datatables_api.js"></script>';
        $this->layout('layout/layout');
        return new ViewModel(array(
            'table' => $data,
        ));
    }

    public function editAction() {
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
        $_SESSION['scriptfile'] = '<script type="text/javascript" src="http://localhost:8081/shop/public/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="http://localhost:8081/shop/public/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="http://localhost:8081/shop/public/js/core/app.js"></script>
	<script type="text/javascript" src="http://localhost:8081/shop/public/js/pages/form_select2.js"></script>
        	<script type="text/javascript" src="http://localhost:8081/shop/public/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="http://localhost:8081/shop/public/js/pages/form_inputs.js"></script>';
        $table = $this->bangnguoidung->LaytheoId($_GET['id']);
        $data = array();
        foreach ($table as $data)
        {
            break;
        }
        if(!$data)
        {
            echo 'loi';
            die();
        }
        return new ViewModel($data);
    }
    public function deleteAction()
    {
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');//neu khong co kieu bien thi se mac dinh gan 
            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                if(!$id)
                {
                    return $this->redirect()->toRoute('admin/usertable', ['action' => 'index']);
                }
                $this->bangnguoidung->Xoa($id);
            }
            // Redirect to list of albums
            return $this->redirect()->toRoute('admin/usertable', ['action' => 'index']);
        }
        $_SESSION['scriptfile'] = '<script type="text/javascript" src="http://localhost:8081/shop/public/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="http://localhost:8081/shop/public/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="http://localhost:8081/shop/public/js/core/app.js"></script>
	<script type="text/javascript" src="http://localhost:8081/shop/public/js/pages/form_select2.js"></script>
        	<script type="text/javascript" src="http://localhost:8081/shop/public/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="http://localhost:8081/shop/public/js/pages/form_inputs.js"></script>';
        return new ViewModel();
    }
}
