<?php

namespace Admin\Model;

use Admin\ModelInterface\NguoiDungInterface;

class NguoiDung implements NguoiDungInterface {

    public $id_nguoidung, $taikhoan, $matkhau, $ho, $tendem,
            $ten, $diachi, $sodienthoai, $email, $ngaythangnamsinh, $quyentruycap;

    public function Copydata($data) {
        $this->id_nguoidung = (!empty($data['id_nguoidung'])) ? $data['id_nguoidung'] : null;
        $this->taikhoan = (!empty($data['taikhoan'])) ? $data['taikhoan'] : null;
        $this->matkhau = (!empty($data['matkhau'])) ? $data['matkhau'] : null;
        $this->ho = (!empty($data['ho'])) ? $data['ho'] : null;
        $this->tendem = (!empty($data['tendem'])) ? $data['tendem'] : null;
        $this->ten = (!empty($data['ten'])) ? $data['ten'] : null;
        $this->diachi = (!empty($data['diachi'])) ? $data['diachi'] : null;
        $this->sodienthoai = (!empty($data['sodienthoai'])) ? $data['sodienthoai'] : null;
        $this->email = (!empty($data['email'])) ? $data['email'] : null;
        $this->ngaythangnamsinh = (!empty($data['ngaythangnamsinh'])) ? $data['ngaythangnamsinh'] : null;
        $this->quyentruycap = (!empty($data['quyentruycap'])) ? $data['quyentruycap'] : null;
    }
    
    
    
    public function setdiachi($data) {
        $this->diachi = $data;
    }

    public function setemail($data) {
        $this->email = $data;
    }

    public function setho($data) {
        $this->ho = $data;
    }

    public function setmatkhau($data) {
        $this->matkhau = $data;
    }

    public function setngaythangnamsinh($data) {
        $this->ngaythangnamsinh = $data;
    }

    public function setquyentruycap($data) {
        $this->quyentruycap = $data;
    }

    public function setsodienthoai($data) {
     $this->sodienthoai = $data;   
    }

    public function setten($data) {
        $this->ten = $data;
    }

    public function settendem($data) {
        $this->tendem = $data;
    }

    public function getarray() {
        return array(
            'id_nguoidung' => $this->id_nguoidung,
            'taikhoan' => $this->taikhoan,
            'matkhau' => $this->matkhau,
            'ho' =>$this->ho,
            'tendem' => $this->tendem,
            'ten' =>$this->ten,
            'diachi' =>$this->diachi,
            'email' =>$this->email,
            'ngaythangnamsinh' => $this->ngaythangnamsinh,
            'quyentruycap' =>$this->quyentruycap
        );
    }

}
