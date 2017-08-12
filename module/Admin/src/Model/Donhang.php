<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Model;

/**
 * Description of Donhang
 *
 * @author Quan
 */
class Donhang {
    public $id_donhang,$ngaydatdonhang,$tinhtrang,$ho,$ten,$diachi,$sodienthoai,$email,$danhsachmathang,$id_nguoidung;
    public function copydata($data)
    {
        $this->id_nguoidung =(!empty($data['id_nguoidung'])) ? $data['id_nguoidung'] : null;
        $this->id_donhang = (!empty($data['id_donhang'])) ? $data['id_donhang'] : null;
        $this->ngaydatdonhang = (!empty($data['ngaydatdonhang'])) ? $data['ngaydatdonhang'] : null;
        $this->tinhtrang = (!empty($data['tinhtrang'])) ? $data['tinhtrang'] : null;
        $this->ho = (!empty($data['ho'])) ? $data['ho'] : null;
        $this->ten = (!empty($data['ten'])) ? $data['ten'] : null;
        $this->diachi = (!empty($data['diachi'])) ? $data['diachi'] : null;
        $this->sodienthoai = (!empty($data['sodienthoai'])) ? $data['sodienthoai'] : null;
        $this->email = (!empty($data['email'])) ? $data['email'] : null;
        $this->danhsachmathang = (!empty($data['danhsachmathang'])) ? $data['danhsachmathang'] : null;
    }
    public function getarray()
    {
        return array(
            'id_donhang' =>$this->id_donhang,
            'ngaydatdonhang' =>$this->ngaydatdonhang,
            'tinhtrang' =>$this->tinhtrang,
            'ho' => $this->ho,
            'ten' => $this->ten,
            'diachi' => $this->diachi,
            'sodienthoai' => $this->sodienthoai,
            'email' => $this->email,
            'danhsachmathang' => $this->danhsachmathang,
        );
    }
}
