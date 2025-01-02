<?php
class App{
    protected $controller="Home";
    protected $action="getShow";
    protected $param;
    function __construct(){
        if(isset($_GET["url"])){
            $arr=$this->urlprocess();
           //var_dump($arr);
           //kiểm tra tra file trong thư mục controller có tồn tại ko
           if(file_exists("./mvc/controllers/".$arr[0].".php")){
                $this->controller=$arr[0];
                unset($arr[0]);
           }
           require_once "./mvc/controllers/".$this->controller.".php";
           $this->controller= new $this->controller;
           if(isset($arr[1])){
                if(method_exists($this->controller,$arr[1])){
                    $this->action=$arr[1];
                }
           }
           unset($arr[1]);
           $this->param =$arr?array_values($arr):array();
          // var_dump($this->param);
          call_user_func_array(array($this->controller,$this->action),$this->param);
        }
        else{
            header("locatio: ./Home");
            exit();
        }
    }
    //viết phương thức chuyển một chuỗi URL thành array
    public function urlprocess(){
        if(isset($_GET["url"])){
           return explode('/',  
           filter_var(trim($_GET["url"],'/')));
        }
    }
}