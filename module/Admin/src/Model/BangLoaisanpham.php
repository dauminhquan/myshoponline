<?php
namespace Admin\Model;

use Zend\Db\TableGateway\TableGateway;
class BangLoaisanpham 
{
    private $table;
    public function __construct(TableGateway $table) {
        $this->table = $table;
    }
    public function LaytheoId($id) {
        try
        {
            $dt= $this->table->select(array('id_loaisanpham' =>$id));
            foreach ($dt as $row)
            {
                return $row;
            }
        } catch (Exception $ex) {
            echo "lỗi";
            return false;
        }
        
    }

    public function Laytoanbo() {
        return $this->table->select();
    }

    public function Luu(Loaisanpham $loaisanpham) {
        
            $data = $loaisanpham->getarray();
            
            $id_loaisanpham = (int) $loaisanpham->id_loaisanpham;
        if ($id_loaisanpham == 0) {
            $this->table->insert($data);
        } else {
            if ($this->LaytheoId($id_loaisanpham)) {
                $this->table->update($data, array('id_loaisanpham' => $id_loaisanpham));
            } else {
                throw new \Exception('Không thể update bảng');
            }
        }
    }
    public function Xoa($id) {
        $this->table->delete(array('id_loaisanpham' => $id));
    }

}

