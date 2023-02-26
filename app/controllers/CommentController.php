<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Comment;

class CommentController extends BaseController
{
    protected $comment;
    public function __construct()
    {
        $this->comment = new Comment();
    }
    public function showComemnt()
    {
        $products = $this->comment->showComment();
        $this->render("comment.comment", compact("products"));
    }
    public function addComment()
    {
        $err = [];
        if (isset($_POST["btn-addcomment"])) {
            if (empty($_POST["id_ngdung"])) {
                $err["id_ngdung"] = "Bạn chưa nhập ID Người dùng";
            }
            if (empty($_POST["binh_luan"])) {
                $err["binh_luan"] = "Bạn chưa nhập Bình Luận";
            }
            else if (count($err) == 0) {
                $this->comment->addComment($_POST["binh_luan"], $_POST["id_ngdung"]);
                redirect("success","Thêm Thành Công","comment");
            }
        }
        $this->render("comment.addcomment", compact("err"));
    }
    public function deleteComment($id)
    {
        if(isset($id)){
            $this->comment->deleteComment($id);
            redirect("success","Xóa Thành Công","comment");
        }
        
    }
    public function updateComment($id)
    {
        $showUpdate = $this->comment->showCommentUpdate($id);
        
        if (isset($_POST["btn-updatecomment"])) {
            $this->comment->updateComment($id, $_POST["binh_luan"], $_POST["id_ngdung"]);
            redirect("success","Cập Nhật Thành Công","comment");
        }
        $this->render('comment.updatecomment', compact('showUpdate'));
    }
}
