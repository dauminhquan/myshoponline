<?php
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Admin\Model\BangNguoiDung;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\AdapterInterface;

class IndexController extends AbstractActionController {
    private $adapter;
    public function __construct(AdapterInterface $adapter) {
        $this->adapter = $adapter;
        $_SESSION['themejs'] = '<script type="text/javascript" src="/shop/public/assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script type="text/javascript" src="/shop/public/assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script type="text/javascript" src="/shop/public/assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="/shop/public/assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="/shop/public/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>

	<script type="text/javascript" src="/shop/public/assets/js/plugins/pickers/daterangepicker.js"></script>

	<script type="text/javascript" src="/shop/public/assets/js/core/app.js"></script>
	
        

';
    }

    public function indexAction() {
        
        $id = $_SESSION['id'];
        $tablenguoidung = new TableGateway('nguoidung',$this->adapter);
        $nguoidung = new BangNguoiDung($tablenguoidung);
        $ten = $nguoidung->LaytheoId($id)->ten;
        $_SESSION['name'] = $ten;
        $date = date('Y-m-d');
        $songuoidangkymoi = $this->adapter->query('SELECT COUNT(*) as count FROM nguoidung where ngaydangky = "'.$date.'"')->execute()->current()['count'];
        $songuoidung = $this->adapter->query('SELECT COUNT(*) as count FROM nguoidung')->execute()->current()['count'];
        $sodonhang = $this->adapter->query('SELECT COUNT(*) as count FROM donhang')->execute()->current()['count'];
        $sodonhangmoi = $this->adapter->query('SELECT COUNT(*) as count FROM donhang WHERE tinhtrang = 1')->execute()->current()['count'];
        $sosanpham = $this->adapter->query('SELECT COUNT(*) as count FROM sanpham')->execute()->current()['count'];
        $donhangmoi = $this->adapter->query('SELECT id_donhang,ngaydatdonhang,ho,ten FROM donhang WHERE tinhtrang = 1')->execute();

        
        
//print_r($sodonhangmoi->execute()->current());
        
        $this->layout('layout/admin');
        return new ViewModel(
                array(
                    'songuoidung' => $songuoidung,
                    'songuoidangkymoi' =>$songuoidangkymoi,
                    'sodonhangmoi' => $sodonhangmoi,
                    'sosanpham' => $sosanpham,
                    'sodonhang' =>$sodonhang,
                    'donhangmoi' => $donhangmoi,
                )
                );
    }
}
