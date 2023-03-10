<?php
namespace App\Models;
use App\Models\BaseModel;
class Product extends BaseModel{
    protected $login="tbl_login";
    protected $showProduct="tbl_product";
    public function index(){
        $sql="SELECT * FROM $this->login";
        return $this->getData($sql);
    }
    public function showProduct(){
        $sql="SELECT * FROM $this->showProduct";
        return $this->getData($sql);
    }
    public function addProduct($name,$dongia,$parentID){
        $sql="INSERT INTO $this->showProduct VALUES('','$name','$dongia','$parentID')";
        return $this->getData($sql);
    }
    public function deleteProduct($id){
        $sql="DELETE FROM $this->showProduct WHERE id='$id'";
        return $this->getData($sql);
    }
    public function updateProduct($id,$name,$dongia,$parentID){
        $sql="UPDATE  $this->showProduct SET name='$name' ,dongia='$dongia', parent_id='$parentID' WHERE id='$id'";
        return $this->getData($sql);
    }
    public function showProductUpdate($id){
        $sql="SELECT * FROM $this->showProduct WHERE id='$id'";
        return $this->getData($sql,false);
    }
    public function signup($name,$email,$password){
        $sql="INSERT INTO $this->login VALUES('','$name','$email','$password','1')";//Form đăng ký chỉ có người dùng bên client đăng ký thì mặc định sẽ để role thành 1
//        $this->setQuery($sql);
//        return $this->execute();
        return $this->getData($sql);
    }

    public function searchKeyProduct($keyword){
        $sql="SELECT * FROM $this->showProduct WHERE name LIKE '%$keyword%' OR id LIKE '$keyword' or dongia LIKE '$keyword' or parent_id LIKE '$keyword'";
        return $this->getData($sql);
    }
    
}


?>