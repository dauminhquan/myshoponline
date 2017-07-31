<?php

namespace Admin\Model;
use Admin\ModelInterface\LoaisanphamInterface;
class Nhomsanpham implements LoaisanphamInterface {

    public $id_nhomsanpham, $tennhomsanpham, $thongtinnhomsanpham,$id_loaisanpham;

    public function Copydata($data) {
        $this->id_nhomsanpham = (!empty($data['id_nhomsanpham'])) ? $data['id_nhomsanpham'] : null;
        $this->tennhomsanpham = (!empty($data['tennhomsanpham'])) ? $data['tennhomsanpham'] : null;
        $this->thongtinnhomsanpham = (!empty($data['thongtinnhomsanpham'])) ? $data['thongtinnhomsanpham'] : null;
        $this->id_loaisanpham = (!empty($data['id_loaisanpham'])) ? $data['id_loaisanpham'] : null;
        
    }

    public function getarray() {
        return array(
            'id_nhomsanpham' => $this->id_nhomsanpham,
            'tennhomsanpham' => $this->tennhomsanpham,
            'thongtinnhomsanpham' => $this->thongtinnhomsanpham,
            'id_loaisanpham' =>$this->id_loaisanpham,
        );
    }

}
