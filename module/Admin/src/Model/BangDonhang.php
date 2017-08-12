<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Model;

use Zend\Db\Adapter\AdapterInterface;
class BangDonhang {
    private $adapter;
    public function __construct(AdapterInterface $adapter) {
        $this->adapter = $adapter;
    }
    public function LaytheoId($id) {
        try
        {
           $sql = 'SELECT B2.id_donhang,B2.ngaydatdonhang,B2.tinhtrang,B2.ho,B2.ten,B2.diachi,B2.sodienthoai,B2.email,sanpham.id_sanpham,B2.soluong,sanpham.tensanpham FROM
(SELECT B1.id_donhang,ngaydatdonhang,tinhtrang,ho,ten,diachi,sodienthoai,email,id_sanpham,soluong From (SELECT * FROM donhang WHERE id_donhang = '.$id.') AS B1
INNER JOIN donhang_sanpham ON B1.id_donhang = donhang_sanpham.id_donhang) AS B2 INNER JOIN sanpham ON B2.id_sanpham = sanpham.id_sanpham';
           $result = $this->adapter->query($sql)->execute();
           $cr = $result->current();
           $data = array(
             'id_donhang' => $cr['id_donhang'],
               'ngaydatdonhang' =>$cr['ngaydatdonhang'],
               'tinhtrang' => $cr['tinhtrang'],
               'ho' => $cr['ho'],
               'ten' => $cr['ten'],
               'diachi' => $cr['diachi'],
               'sodienthoai' => $cr['sodienthoai'],
               'email' => $cr['email'],
               'danhsachsanpham' => array()
           );
           foreach ($result as $row)
           {    
               array_push($data['danhsachsanpham'], array(
                   'id_sanpham' => $row['id_sanpham'],
                   'soluong' => $row['soluong'],
                   'tensanpham' =>$row['tensanpham']
               ));
           }
           return $data;
        } catch (Exception $ex) {
            echo "ok";
            return false;
        }
        
    }

    public function Laytoanbo() {
        $sql = 'SELECT id_donhang,ngaydatdonhang,tinhtrang,ho,ten FROM donhang';
        $data = $this->adapter->query($sql)->execute();
        return $data;
    }

//    public function Luu(Donhang $donhang) {
//        
//            $data = $donhang->getarray();
//            
//            $id_nhomsanpham = (int) $nhomsanpham->id_nguoidung;
//        if ($id_nhomsanpham == 0) {
//            $this->table->insert($data);
//        } else {
//            if ($this->LaytheoId($id_nhomsanpham)) {
//                $this->table->update($data, array('id_nhomsanpham' => $id_nhomsanpham));
//            } else {
//                throw new \Exception('Không thể update bảng');
//            }
//        }
//    }
//
//    public function Xoa($id) {
//        $this->table->delete(array('id_nhomsanpham' => $id));
//    }
}
