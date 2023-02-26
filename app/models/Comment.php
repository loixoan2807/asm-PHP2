<?php
namespace App\Models;
use App\Models\BaseModel;
class Comment extends BaseModel{
    protected $table="tbl_comment";
    public function showComment(){
        $sql="SELECT * FROM $this->table";
        return $this->getData($sql);
    }
    public function addComment($binh_luan,$id_ngdung){
        $sql="INSERT INTO $this->table VALUES('','$binh_luan','$id_ngdung')";
        return $this->getData($sql);
    }
    public function deleteComment($id){
        $sql="DELETE FROM $this->table WHERE id='$id'";
        return $this->getData($sql);
    }
    public function updateComment($id,$binh_luan,$id_ngdung){
        $sql="UPDATE  $this->table SET binh_luan='$binh_luan' ,id_nguoidung='$id_ngdung' WHERE id='$id'";
        return $this->getData($sql);
    }
    public function showCommentUpdate($id){
        $sql="SELECT * FROM $this->table WHERE id='$id'";
        return $this->getData($sql,false);
    }
}