<?php

namespace Admin\Model;
use Admin\ModelInterface\LoaisanphamInterface;
class Loaisanpham implements LoaisanphamInterface{

    public $id_loaisanpham, $tenloaisanpham, $thongtinloaisanpham;

    public function Copydata($data) {
        $this->id_loaisanpham = (!empty($data['id_loaisanpham'])) ? $data['id_loaisanpham'] : null;
        $this->tenloaisanpham = (!empty($data['tenloaisanpham'])) ? $data['tenloaisanpham'] : null;
        $this->thongtinloaisanpham = (!empty($data['thongtinloaisanpham'])) ? $data['thongtinloaisanpham'] : null;
        
    }

    public function getarray() {
        return array(
            'id_loaisanpham' => $this->id_loaisanpham,
            'tenloaisanpham' => $this->tenloaisanpham,
            'thongtinloaisanpham' => $this->thongtinloaisanpham,
        );
    }

}
