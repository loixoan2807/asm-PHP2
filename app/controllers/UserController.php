<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\User;
class UserController extends BaseController{
    protected $user;
    public function __construct()
    {
        $this->user= new User();
    }
    public function showUser(){
        $products= $this->user->showUser();
        $this->render("user.user",compact("products"));
    }
    public function addUser(){
        if(isset($_POST["btn-adduser"])){
            $err=[];
           
            $this->user->addUser($_POST["email"],$_POST["pass"],$_POST["username"]);
            redirect("success","Thêm Thành Công","user");
        }
        $this->render("user.adduser");
    }
    public function deleteUser($id){
        if(isset($id)){
            $this->user->deleteUser($id);
            redirect("success","Xóa Thành Công","user");
        }
    }
    public function updateUser($id){
        $showUpdate= $this->user->showUserUpdate($id);
        if(isset($_POST["btn-updateuser"])){
            $this->user->updateUser($id,$_POST["email"],$_POST["pass"],$_POST["username"]);
            redirect("success","Cập Nhật Thành Công","user");
        }
        $this->render('user.updateuser',compact('showUpdate'));
    }
}