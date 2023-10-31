<?php
namespace App\Models;
class Product extends BaseModel{
    protected $table = "product";
    public function getProduct(){
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    function getDetailProduct($id){
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadAllRows([$id]);

    }
    public function addProduct($id,$tenSP,$gia){
        $sql = "INSERT INTO $this->table VALUES (?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id,$tenSP,$gia]);
    }
    public function updateProduct($id,$tenSP,$gia){
        $sql = "UPDATE $this->table SET ten_sp=?,gia=? WHERE id=?";
        $this->setQuery($sql);
        return $this->execute([$tenSP,$gia,$id]);
    }
    public function deleteProduct($id){
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}