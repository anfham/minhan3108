<?php
class Detail extends Controller{
    public function getshow($masp){
        $obj = $this -> model("AdProductModel");
        $data = $obj -> getAdProductID($masp);
        $this->view("HomeView", ["page" => "Detailview", "product" => $data]);
    }
}