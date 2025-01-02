<?php
class ProductModel extends DB{
    public function getAdProduct(){
        $sql="SELECT * FROM ad_product ";
        $stm=$this->Connect()->prepare($sql);
        $stm->execute();
        $product=$stm->fetchAll();
        return $product;
    }
    public function searchProduct($keyword) {
        $sql = "SELECT * FROM ad_product WHERE tensp LIKE ?";     
        $stm = $this->Connect()->prepare($sql);
        $stm->execute(['%' . $keyword . '%']);
        return $stm->fetchAll();
    }
}