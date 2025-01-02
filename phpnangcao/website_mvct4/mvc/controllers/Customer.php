<?php 
class Customer extends Controller{
    public function getshow(){
        $obj=$this->model("LoginModel");
        $data=$obj->getCustomerAccount();
        $this -> view("Manager_View",['page'=>"CustomerView", "customers"=>$data]);
    }
    public function update($id){
        $obj=$this->model("LoginModel");
        $userlist=$obj->getUserID($id);
        $name =isset($_POST["txt_name"])?$_POST["txt_name"]:$userlist["name"];
        $email =isset($_POST["txt_email"])?$_POST["txt_email"]:$userlist["email"];
        $password =isset($_POST["txt_password"])?$_POST["txt_password"]:$userlist["password"];
        $user_type =isset($_POST["txt_user_type"])?$_POST["txt_user_type"]:$userlist["user_type"];
        $phone =isset($_POST["txt_phone"])?$_POST["txt_phone"]:$userlist["phone"];
        $sex =isset($_POST["txt_sex"])?$_POST["txt_sex"]:$userlist["sex"];
        $address =isset($_POST["txt_address"])?$_POST["txt_address"]:$userlist["address"];
        //var_dump($userlist);
        $this->view("Manager_View",["page"=>"UserView_edit","users"=>$userlist]);
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $obj->updateUser($id,$name,$email,$password,$user_type,$phone,$sex,$address);
            header("location:..");
            exit();
        }
    } 
    public function delete($id){
        $obj=$this->model("LoginModel");
        $obj->deleteUser($id);
        header("location:..");
        exit();
    } 
    public function search() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $keyword = isset($_POST['txt_keyword']) ? $_POST['txt_keyword'] : '';
            $status = isset($_POST['txt_status']) ? $_POST['txt_status'] : '';
            $obj = $this->model("LoginModel");
            $data = $obj->searchCustomer($keyword, $status); 
            $this->view("Manager_View", ["page" => "CustomerView", "customers" => $data ?: []]);
        }
    }    
}