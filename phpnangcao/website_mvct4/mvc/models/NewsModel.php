<?php
class NewsModel extends DB{
    public function getNew(){
        $sql="SELECT * FROM news ";
        $stm=$this->Connect()->prepare($sql);
        $stm->execute();
        $news=$stm->fetchAll();
        return $news;
    }
    public function getNewID($id) {
        $sql = "SELECT * FROM news WHERE id = :id";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT); 
        $stm->execute();
        $newID = $stm->fetch(PDO::FETCH_ASSOC); 
        return $newID;
    }
    public function insertNew($id, $title, $summary, $content, $thumbnail, $author, $status){
        $sql = "INSERT INTO news (title, summary, content, thumbnail, author, status) VALUES (:title, :summary, :content, :thumbnail, :author, :status)";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->execute([':title' => $title, ':summary' => $summary, ':content' => $content, ':thumbnail' => $thumbnail, ':author' => $author, ':status' => $status,]);
    }
    public function updateNew($id, $title, $summary, $content, $thumbnail, $author, $status){
        $sql="UPDATE news set title = '$title', summary = '$summary', content = '$content', ";
        $sql.="thumbnail = '$thumbnail', author = '$author', status = '$status' WHERE id = '$id'";
        $this->Connect()->exec($sql);
    }
    public function deleteNew($id){
        $sql="DELETE FROM news WHERE id = '$id'";
        $this->Connect()->exec($sql);
    }
}