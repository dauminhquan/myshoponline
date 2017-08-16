<?php
namespace Admin\Model;
use Admin\ModelInterface\TableInterface;
use Zend\Db\TableGateway\TableGateway;
class BangNguoiDung implements TableInterface
{
    private $table;
    public function __construct(TableGateway $table) {
        $this->table = $table;
    }

    public function LaytheoId($id) {
        try
        {
            $dt= $this->table->select(array('id_nguoidung' =>$id));
            return $dt->current();
        } catch (Exception $ex) {
            echo "ok";
            return false;
        }
        
    }

    public function Laytoanbo() {
        return $this->table->select();
    }

    public function Luu(NguoiDung $nguoidung) {
        
            $data = $nguoidung->getarray();
            $id_nguoidung = (int) $nguoidung->id_nguoidung;
        if ($id_nguoidung == 0) {
            $taikhoan = $data['taikhoan'];
            $check = $this->table->select(array('taikhoan'=>$taikhoan))->current();
            if(isset($check))
            {
                echo 'Lỗi trùng tài khoản';
                die();
            }
            $this->table->insert($data);
            
        } else {
            if ($this->LaytheoId($id_nguoidung)) {
                $this->table->update($data, array('id_nguoidung' => $id_nguoidung));
            } else {
                throw new \Exception('Không thể update bảng');
            }
        }
    }

    public function Xoa($id) {
        $check = $this->table->select(array('id_nguoidung'=> $id))->current();
        if(!isset($check))
        {
            return false;
        }
        $this->table->delete(array('id_nguoidung' => $id));
    }

}

