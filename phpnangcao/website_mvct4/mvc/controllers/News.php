<?php
$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header("Location: ../Login/"); 
}
class News extends Controller{
    public function getshow(){
        $obj = $this -> model("NewsModel");
        $data = $obj -> getNew();
        $this -> view("Manager_View",["page"=>"NewsView","news"=>$data]);
    }
    public function insert(){
        $obj = $this -> model("NewsModel");
        $data = $obj -> getNew();

        $title = isset($_POST["txt_title"])?($_POST["txt_title"]):"";
        $summary = isset($_POST["txt_summary"])?($_POST["txt_summary"]):"";
        $content = isset($_POST["txt_content"])?($_POST["txt_content"]):"";

        if(isset($_FILES["txt_thumbnail"])){
            $thumbnail=isset($_FILES["txt_thumbnail"])?$_FILES["txt_thumbnail"]["name"]:"";
            //if($_SERVER["REQUEST_METHOD"]=="POST"){
                $file_tmp=$_FILES["txt_thumbnail"]["tmp_name"];
                $file_size = $_FILES["txt_thumbnail"]["size"];
                $file_ext = strtolower(pathinfo($thumbnail, PATHINFO_EXTENSION));
                $allowed_extensions = ["jpg", "jpeg", "png", "gif"];    
                if (!in_array($file_ext, $allowed_extensions)) {
                    echo "Hình ảnh phải có định dạng .jpg, .jpeg, .png, hoặc .gif.";
                } 
                elseif ($file_size > 10485760) {
                    echo "Dung lượng hình ảnh phải nhỏ hơn 10MB.";
                } else {
                move_uploaded_file($file_tmp,"./public/images/".$thumbnail);
                }
                // echo "bạn đã upload thành công";
                //}
            }

        $author = isset($_POST["txt_author"])?($_POST["txt_author"]):"";
        $status = isset($_POST["txt_status"])?($_POST["txt_status"]):"";

        $this -> view("Manager_View",["page"=>"NewsView_insert","news"=>$data]);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $obj -> insertNew(null, $title, $summary, $content, $thumbnail, $author, $status);
            header("location:..");  
            exit();
        }
    }   
    public function update($id) {
        $obj = $this->model("NewsModel");
        $newList = $obj->getNewID($id);
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = isset($_POST["txt_title"]) ? $_POST["txt_title"] : $newList["title"];
            $summary = isset($_POST["txt_summary"]) ? $_POST["txt_summary"] : $newList["summary"];
            $content = isset($_POST["txt_content"]) ? $_POST["txt_content"] : $newList["content"];
            $thumbnail = $newList["thumbnail"]; 
            if (isset($_FILES["txt_thumbnail"]) && $_FILES["txt_thumbnail"]["name"] !== "") {
                $thumbnail = $_FILES["txt_thumbnail"]["name"];
                $file_tmp = $_FILES["txt_thumbnail"]["tmp_name"];
                $file_size = $_FILES["txt_thumbnail"]["size"];
                $file_ext = strtolower(pathinfo($thumbnail, PATHINFO_EXTENSION));
                $allowed_extensions = ["jpg", "jpeg", "png", "gif"];
    
                if (!in_array($file_ext, $allowed_extensions)) {
                    echo "Hình ảnh phải có định dạng .jpg, .jpeg, .png, hoặc .gif.";
                } elseif ($file_size > 10485760) {
                    echo "Dung lượng hình ảnh phải nhỏ hơn 10MB.";
                } else {
                    move_uploaded_file($file_tmp, "./public/images/" . $thumbnail);
                }
            }
            $author = isset($_POST["txt_author"]) ? $_POST["txt_author"] : $newList["author"];
            $status = isset($_POST["txt_status"]) ? $_POST["txt_status"] : $newList["status"];
    
            if (isset($_FILES["txt_thumbnail"]) && $_FILES["txt_thumbnail"]["name"] !== "") {
                $thumbnail = $_FILES["txt_thumbnail"]["name"];
                move_uploaded_file($_FILES["txt_thumbnail"]["tmp_name"], "./public/images/" . $thumbnail);
            }
            $obj->updateNew($id, $title, $summary, $content, $thumbnail, $author, $status);
            header("Location: ..");
            exit();
        }
        $this->view("Manager_View", ["page" => "NewsView_edit", "news" => $newList]);
    }
    public function delete($id){
        $obj=$this->model("NewsModel");
        $obj->deleteNew($id);
        header("location:..");
        exit();
    } 
}   