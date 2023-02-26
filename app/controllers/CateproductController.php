<?php

namespace App\Controllers;

use App\Models\Cateproduct;
use App\Controllers\BaseController;

class CateproductController extends BaseController
{
    protected $cateProduct;
    public function __construct()
    {
        $this->cateProduct = new Cateproduct();
    }

    public function showCateProduct()
    {
        $products = $this->cateProduct->showCateProduct();
        $this->render("cateproduct.cateproduct", compact("products"));
    }
    public function addCateProduct()
    {
        $err = [];
        
        if (isset($_POST["btn-addcateproduct"])) {
            if (empty($_POST["name_cateproduct"])) {
                $err["name"] = "Bạn chưa nhập Tên Danh Mục";

            } else if (count($err) == 0) {
                $this->cateProduct->addCateProduct($_POST["name_cateproduct"]);
                redirect("success","Thêm Thành Công","cate-product");
            }
        }
        $this->render("cateproduct.addcateproduct", compact("err"));
        
    }
    public function deleteCateProduct($id)
    {
        $parent = $this->cateProduct->showParentProduct($id);
        
        if(count($parent)==0) {
            $this->cateProduct->deleteCateProduct($id);
            redirect("success","Xóa Thành Công","cate-product");
        }
        else{
            setcookie('err_delete',"Bạn cần phải xóa Parent id ở Product trc khi xóa Danh mục",time()+1,'/');
            redirect("success","Xóa Thất Bại","cate-product");
        }
        
        
    }

    public function updateCateProduct($id)
    {
        $showUpdate = $this->cateProduct->showCateProductUpdate($id);
        if (isset($_POST["btn-updatecateproduct"])) {
            $this->cateProduct->updateCateProduct($id, $_POST["name_product"]);
            redirect("success","Cập Nhật Thành Công","cate-product");
        }
        $this->render('cateproduct.updatecateproduct', compact('showUpdate'));
    }
}
