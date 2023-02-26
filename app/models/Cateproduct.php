<?php
namespace App\Models;
use App\Models\BaseModel;
class Cateproduct extends BaseModel{
    protected $table="tbl_cateproduct";
   
    public function showCateProduct(){
        $sql="SELECT * FROM $this->table";
        return $this->getData($sql);
    }
    public function addCateProduct($name){
        $sql="INSERT INTO $this->table VALUES('','$name')";
        return $this->getData($sql);
    }
    public function deleteCateProduct($id){
        $sql="DELETE FROM $this->table WHERE id='$id'";
        return $this->getData($sql);
    }
    public function showParentProduct($id){
        $sql="SELECT * FROM `tbl_cateproduct` INNER JOIN tbl_product ON tbl_product.parent_id=tbl_cateproduct.id WHERE tbl_cateproduct.id='$id'";
        return $this->getData($sql);
    }
    public function updateCateProduct($id,$name){
        $sql="UPDATE  $this->table SET name='$name' WHERE id='$id'";
        return $this->getData($sql);
    }
    public function showCateProductUpdate($id){
        $sql="SELECT * FROM $this->table WHERE id='$id'";
        return $this->getData($sql,false);
    }
}