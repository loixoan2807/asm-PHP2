<?php
    namespace App\Models;
    use App\Models\BaseModel;
    class Cart extends BaseModel{
        protected $table="tbl_cart";
        public function showCart(){
            $sql="SELECT c.id,c.id_nameproduct,p.name,p.dongia,c.so_luong,p.parent_id  FROM tbl_cart c INNER JOIN tbl_product p ON c.id_nameproduct = p.id";
            return $this->getData($sql);
        }
        public function addCart($idname,$soluong){
            $sql="INSERT INTO $this->table VALUES('','$idname','$soluong')";
            return $this->getData($sql);
        }
        public function deleteCart($id){
            $sql="DELETE FROM $this->table WHERE id='$id'";
            return $this->getData($sql);
        }
        public function updateCart($id,$idname,$soluong){
            $sql="UPDATE  $this->table SET id_nameproduct='$idname',so_luong='$soluong' WHERE id='$id'";
            return $this->getData($sql);
        }
        public function showCartUpdate($id){
            $sql="SELECT * FROM $this->table c INNER JOIN tbl_product p ON c.id_nameproduct = p.id WHERE c.id='$id'";
            return $this->getData($sql,false);
        }
        public function InquantityCart($id,$soluong){
            $sql="UPDATE $this->table SET so_luong='$soluong' WHERE id='$id'";
            return $this->getData($sql);
        }
        public function showCart1(){
            $sql="SELECT c.id,p.name,p.dongia,c.so_luong,p.parent_id  FROM tbl_cart c INNER JOIN tbl_product p ON c.id_nameproduct = p.id";
            return $this->getData($sql);
        }
    }



