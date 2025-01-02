<?php
$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header("Location: ../Login/"); 
}
class OrderReporter extends Controller{
    public function getshow(){
        $obj=$this->model("OrderModel");
        $data=$obj->getRevenueByMonth();
        $dataByDay = $obj->getRevenueByDay();
        $dataByYear = $obj->getRevenueByYear();
        $this->view("Manager_View",["page"=>"OrderReporterView","report"=>$data,"reportByDay" => $dataByDay,"reportByYear" => $dataByYear]);
    }
}