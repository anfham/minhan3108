<?php
$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header("Location: ../Login/"); 
}
class Admin extends Controller{
    public function getShow(){      
        //var_dump($_SESSION['admin_type']);
        $this -> view("Manager_View",["page"=>"Adminview"]);
    }
}