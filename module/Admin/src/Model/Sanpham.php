<?php

namespace Admin\Model;

class Sanpham {

    public $id_sanpham, $tensanpham, $id_nhomsanpham,$gioitinh,$xuatxu,$kichco,$thongtinsanpham,$soluong,$ngaythemvao;

    public function Copydata($data) {
        $this->id_sanpham = (!empty($data['id_sanpham'])) ? $data['id_sanpham'] : null;
        $this->tensanpham = (!empty($data['tensanpham'])) ? $data['tensanpham'] : null;
        $this->id_nhomsanpham = (!empty($data['id_nhomsanpham'])) ? $data['id_nhomsanpham'] : null;
        $this->gioitinh = (!empty($data['gioitinh'])) ? $data['gioitinh'] : null;
        $this->xuatxu = (!empty($data['xuatxu'])) ? $data['xuatxu'] : null;
        $this->kichco = (!empty($data['kichco'])) ? $data['kichco'] : null;
        $this->thongtinsanpham = (!empty($data['thongtinsanpham'])) ? $data['thongtinsanpham'] : null;
        $this->soluong = (!empty($data['soluong'])) ? $data['soluong'] : null;
        $this->ngaythemvao = (!empty($data['ngaythemvao'])) ? $data['ngaythemvao'] : null;
    }

    public function getarray() {
        return array(
            'id_sanpham' => $this->id_sanpham,
            'tensanpham' => $this->tensanpham,
            'id_nhomsanpham' => $this->id_nhomsanpham,
            'gioitinh' =>$this->gioitinh,
            'xuatxu' => $this->xuatxu,
            'kichco' =>$this->kichco,
            'thongtinsanpham' =>$this->thongtinsanpham,
            'soluong' =>$this->soluong,
            'ngaythemvao' => $this->ngaythemvao
        );
    }

}
