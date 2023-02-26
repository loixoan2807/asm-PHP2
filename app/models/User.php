<?php
namespace App\Models;
use App\Models\BaseModel;
class User extends BaseModel{
    protected $table="tbl_login";
    
    public function showUser(){
        $sql="SELECT * FROM $this->table";
        return $this->getData($sql);
    }
    public function addUser($email,$pass,$username){
        $sql="INSERT INTO $this->table VALUES('','$email','$pass','$username')";
        return $this->getData($sql);
    }
    public function deleteUser($id){
        $sql="DELETE FROM $this->table where id ='$id'";
        return $this->getData($sql);
    }
    public function updateUser($id,$email,$pass,$username){
        $sql="UPDATE $this->table SET email='$email',pass='$pass',username='$username'";
        return $this->getData($sql);
    }
    public function showUserUpdate($id){
        $sql="SELECT * FROM $this->table WHERE id='$id'";
        return $this->getData($sql,false);
    }
}