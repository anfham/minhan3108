<?php
$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header("Location: ../Login/"); 
}
class AdProductType extends Controller{
    function getShow(){
        $obj=$this->model("AdProductTypeModel");
        $data=$obj->getAdProductType();
        //$this->view("AdProductTypeView",$data);  
        $this->view("Manager_View",["page"=>"AdProductTypeView","productType"=>$data]);
    }
    public function delete($ma_loaisp){
        $obj=$this->model("AdProductTypeModel");
        $obj->deleteAdProductType($ma_loaisp);
        header("location:..");
        exit();
    }
    public function insert() {
        $obj = $this->model("AdProductTypeModel");
        $ma_loaisp = isset($_POST["txt_maloaisp"]) ? $_POST["txt_maloaisp"] : "";
        $ma_loaispnew = str_replace(" ", "", $ma_loaisp); 
        $ten_loaisp = isset($_POST["txt_tenloaisp"]) ? $_POST["txt_tenloaisp"] : "";
        $mota_loaisp = isset($_POST["txt_motaloaisp"]) ? $_POST["txt_motaloaisp"] : "";

        if ($obj->checkProductTypeExists($ma_loaispnew)) {
            // Gán thông báo vào session
            $_SESSION['message'][] = "Mã loại sản phẩm đã tồn tại!";
            header("Location: ./AdProductType"); 
            exit();
        }
        $obj->insertAdProductType($ma_loaispnew, $ten_loaisp, $mota_loaisp);
        $_SESSION['message'][] = "Thêm mới loại sản phẩm thành công!";
        header("Location: ./AdProductType");
        exit();
    }

    public function update($ma_loaisp){
        $obj=$this->model("AdProductTypeModel");
        $productTypeList=$obj->getAdProductTypeID($ma_loaisp);
        $ten_loaisp=isset($_POST["txt_tenloaisp"])?$_POST["txt_tenloaisp"]:$productTypeList["ten_loaisp"];
        $mota_loaisp=isset($_POST["txt_motaloaisp"])?$_POST["txt_motaloaisp"]:$productTypeList["mota_loaisp"];
        //var_dump($productTypeList);
        $this->view("Manager_View",["page"=>"AdProductTypeView_edit","productType"=>$productTypeList]);
        //$this->view("AdProductTypeView_edit",$productTypeList);
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $obj->updateAdProductType($ma_loaisp,$ten_loaisp,$mota_loaisp);
            header("location:..");
            exit();
        }
    }
}