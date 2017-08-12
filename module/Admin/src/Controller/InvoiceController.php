<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Admin\Model\BangDonhang;

class InvoiceController extends AbstractActionController {

    private $table;

    public function __construct(BangDonhang $table) {
        $this->table = $table;
    }

    function indexAction() {
        $data = $this->table->Laytoanbo();
        foreach ($data as $row) {
            print_r($row);
        }
        $this->layout('layout/admin');
        return new ViewModel();
    }

}
