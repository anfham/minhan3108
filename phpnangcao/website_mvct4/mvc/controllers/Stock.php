<?php
$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header("Location: ../Login/"); 
}
class Stock extends Controller{
    public function getshow(){
        $obj=$this->model("AdProductModel");
        $data=$obj->getAdProduct();
        $this->view("Manager_View",["page"=>"StockView","product"=>$data]);
    }
    public function search() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $keyword = isset($_POST['txt_keyword']) ? $_POST['txt_keyword'] : '';
            $status = isset($_POST['txt_status']) ? $_POST['txt_status'] : '';
            $obj = $this->model("AdProductModel");
            $data = $obj->searchAdProduct($keyword, $status); 
            $this->view("Manager_View", ["page" => "StockView", "product" => $data]);
        }
    }
    public function updateStock() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $masp = $_POST['masp'];
            $newStock = $_POST['soluong'];
            $obj = $this->model("AdProductModel");
            $obj->updateStock($masp, $newStock); 
            header("Location: ../Stock/"); 
            exit();
        }
    }
}