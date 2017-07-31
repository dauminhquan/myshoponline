<?php
namespace Admin\Model;

use Zend\Db\TableGateway\TableGateway;
class BangNhomsanpham
{
    private $table;
    public function __construct(TableGateway $table) {
        $this->table = $table;
    }

    public function LaytheoId($id) {
        try
        {
            $dt= $this->table->select(array('id_nhomsanpham' =>$id));
            foreach ($dt as $row)
            {
                return $row;
            }
        } catch (Exception $ex) {
            echo "ok";
            return false;
        }
        
    }

    public function Laytoanbo() {
        return $this->table->select();
    }

    public function Luu(Nhomsanpham $nhomsanpham) {
        
            $data = $nhomsanpham->getarray();
            
            $id_nhomsanpham = (int) $nhomsanpham->id_nguoidung;
        if ($id_nhomsanpham == 0) {
            $this->table->insert($data);
        } else {
            if ($this->LaytheoId($id_nhomsanpham)) {
                $this->table->update($data, array('id_nhomsanpham' => $id_nhomsanpham));
            } else {
                throw new \Exception('Không thể update bảng');
            }
        }
    }

    public function Xoa($id) {
        $this->table->delete(array('id_nhomsanpham' => $id));
    }

}

