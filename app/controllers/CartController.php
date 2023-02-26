<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Cart;

class CartController extends BaseController
{
    protected $cart;
    public function __construct()
    {
        $this->cart = new Cart();
    }
    public function showCart()
    {
        $products = $this->cart->showCart();
        $this->render("cart.cart", compact("products"));
    }
    public function deleteCart($id)
    {
        if (isset($id)) {
            $this->cart->deleteCart($id);
            redirect("success","Xóa Thành Công","cart");
        }
    }
    public function updateCart($id)
    {
        $showUpdate = $this->cart->showCartUpdate($id);
        if (isset($_POST["btn-updatecart"])) {
            $this->cart->updateCart($id, $_POST["id_sp"], $_POST["soluong"]);
            redirect("success","Cập Nhật Thành Công","cart");
        }
        $this->render('cart.updatecart', compact('showUpdate'));
    }
    public function addCart()
    {
        $loadAll = $this->cart->showCart();
        if (isset($_POST["btn-addcart"])) {
            $flag=false;
            $soLuong = 0;
            $id = 0;
            foreach ($loadAll as $item => $value) {
                if ($value["id_nameproduct"] == $_POST["id_product"]) {
                    $soLuong = $value["so_luong"] += $_POST["soluong"];
                    $id = $value["id"];
                    $flag=true;
                }
            }
            if($flag){
                $this->cart->InquantityCart($id,$soLuong);
                redirect("success","Cập Nhật Giỏ Hàng Thành Công","cart");
            }
            else{
                $this->cart->addCart($_POST["id_product"],$_POST["soluong"]);
                redirect("success","Thêm Thành Công","cart");
            }
        }

        $this->render("cart.addcart");
    }
}
