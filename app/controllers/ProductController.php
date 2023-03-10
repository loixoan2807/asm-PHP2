<?php

namespace App\Controllers;

use App\Models\Product;
use App\Controllers\BaseController;

class ProductController extends BaseController
{
    protected $product;
    public function __construct()
    {
        $this->product = new Product();
    }
    public function index()
    {
        if (isset($_SESSION["login"])) {
            if ($_SESSION["login"]) {
                route("dashboard");
            }
        }
        $email = $this->product->index();
        $err = [];
        if (isset($_POST["btn-login"])) {
            if (empty($_POST['email'])) {
                $err["email"] = "Bạn chưa nhập Email";
            }
            if (empty($_POST['password'])) {
                $err["password"] = "Bạn chưa nhập Password";
            }
            if (count($err) == 0) {
                foreach ($email as $item => $value) {
                    if ($_POST["email"] == $value["email"] && $_POST["password"] == $value["pass"]) {
                        $_SESSION["username"] = $value["username"];
                        $_SESSION["login"] = true;
                        if (isset($_POST["remember"])) {
                            setcookie("email", $_POST["email"], time() + 86400, '/');
                            setcookie("pass", $_POST["password"], time() + 86400, '/');
                        }
                        if($value['role']==0){
                            route("dashboard");
                        }
                        else{
                            echo "Đây là trang Client";
                            die();
                        }

                    } else {
                        echo "<script>alert('Dữ liệu nhập k chính xác')</script>";
                    }
                }
            }
        }
        $this->render("product.signin", compact("err"));
    }
    public function signup(){
        $err = [];
        if(isset($_POST['btn-signup'])){
            if (empty($_POST['username'])) {
                $err["name"] = "Bạn chưa nhập Name";
            }
            if (empty($_POST['email'])) {
                $err["email"] = "Bạn chưa nhập Email";
            }
            if (empty($_POST['password'])) {
                $err["password"] = "Bạn chưa nhập Password";
            }
            else{
                $this->product->signup($_POST['username'],$_POST['email'],$_POST['password']);
                redirect('success','Đăng ký thành công','');
            }
        }
         $this->render('product.signup',compact('err'));
    }
    public function dashboard()

    {
        if ($_SESSION["login"] == false) {
            route("");
        }
        $this->render('product.home');
    }
    public function showProduct()
    {
        $products = $this->product->showProduct();
        if (isset($_POST["btn-search"])) {
            $products = $this->product->searchKeyProduct($_POST["key-search"]);
        }
        $this->render("product.product", compact("products"));
    }
    public function addProduct()
    {
        if (isset($_POST["btn-addproduct"])) {
            if (empty($_POST["dongia_product"])) {
                redirect('err_price', "Bạn chưa nhập Đơn Giá", "add-product");
            }
            if (empty($_POST["name_product"])) {
                redirect('err_name', "Bạn chưa nhập Tên Sản Phẩm", "add-product");
            }
            if (empty($_POST["parent_id"])) {
                redirect('err_id', "Bạn chưa nhập Parent ID", "add-product");
            } else {
                $this->product->addProduct($_POST["name_product"], $_POST["dongia_product"], $_POST["parent_id"]);
                redirect("success", "Thêm Thành Công", "product");
            }
        }
        $this->render("product.addproduct");
    }
    public function deleteProduct($id)
    {
        $this->product->deleteProduct($id);
        redirect("success", "Xóa Thành Công", "product");
    }
    public function updateProduct($id)
    {
        $showUpdate = $this->product->showProductUpdate($id);
        if (isset($_POST["btn-updateproduct"])) {
            $this->product->updateProduct($id, $_POST["name_product"], $_POST["dongia_product"], $_POST["parent_id"]);
            redirect("success", "Cập Nhật Thành Công", "product");
        }
        $this->render('product.updateproduct', compact('showUpdate'));
    }
}
