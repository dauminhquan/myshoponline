<?php
namespace Admin\Model;

use Admin\ModelInterface\TableInterface;
class Table implements TableInterface
{
    protected $table;
    public function __construct(TableGatewayInterface $table) {
        $this->table = $table;
    }
    public function LaytheoId($id) {
        
    }

    public function Laytoanbo() {
        
    }

    public function Luu($data) {
        
    }

    public function Xoa($id) {
        
    }

}
