<?php
class NewsDetail extends Controller{
    public function getshow(){
        $obj = $this -> model("NewsModel");
        $data = $obj -> getNew();
        $this -> view("HomeView",["page"=>"NewsViewUser","news"=>$data]);
    }
    public function getNewsDetail($id) {
        $newsModel = $this->model("NewsModel");
        $data = $newsModel->getNewID($id); // Lấy tin tức theo ID
        if ($data) {
           
            $this -> view("HomeView",["page"=>"NewsDetailView","newsDetail"=>$data]);
        } else {
            echo "Tin tức không tồn tại.";
        }
    }

}
?>