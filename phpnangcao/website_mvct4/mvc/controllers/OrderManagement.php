<?php
$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header("Location: ../Login/"); 
}
class OrderManagement extends Controller{
    public function getshow(){
        $obj=$this->model("OrderModel");
        $data=$obj->getOrder();
        $this->view("Manager_View",["page"=>"OrderManagementView","order"=>$data]);
    }
    public function updateStatus(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $statuses = $_POST['order_status'] ?? [];
            $obj = $this->model("OrderModel");
    
            foreach ($statuses as $id => $status) {
                if ($status) {
                    $obj->updateStatus($id, $status);
                }
            }
            header("Location: ../OrderManagement/");
            exit();
        }
    }
    public function delete($id){
        $obj=$this->model("OrderModel");
        $obj->deleteOrder($id);
        header("location:..");
        exit();
    }
}