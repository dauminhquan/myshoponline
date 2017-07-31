<?php
namespace Admin\ModelInterface;
use Admin\Model\NguoiDung;
interface TableInterface
{
    public function Laytoanbo();
    public function LaytheoId($id);
    public function Luu(NguoiDung $data);//sua
    public function Xoa($id);
}