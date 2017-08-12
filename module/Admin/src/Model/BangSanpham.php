<?php
namespace Admin\Model;

use Zend\Db\TableGateway\TableGateway;
use Admin\Model\Sanpham;
class BangSanpham
{
    private $table;
    public function __construct(TableGateway $table) {
        $this->table = $table;
    }

    public function LaytheoId($id) {
        try
        {
            $dt= $this->table->select(array('id_sanpham' =>$id));
            foreach ($dt as $row)
            {
                return $row;
            }
        } catch (Exception $ex) {
            echo "Lỗi";
            return false;
        }
        
    }

    public function Laytoanbo() {
        return $this->table->select();
    }

    public function Luu(Sanpham $sanpham) {
        
            $data = $sanpham->getarray();
            
            $id_sanpham = (int) $sanpham->id_nguoidung;
        if ($id_sanpham == 0) {
            $this->table->insert($data);
        } else {
            if ($this->LaytheoId($id_sanpham)) {
                $this->table->update($data, array('id_sanpham' => $id_sanpham));
            } else {
                throw new \Exception('Không thể update bảng');
            }
        }
    }

    public function Xoa($id) {
        $this->table->delete(array('id_sanpham' => $id));
        
    }

}

