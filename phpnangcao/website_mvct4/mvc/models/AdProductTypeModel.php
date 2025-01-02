<?php 
class AdProductTypeModel extends DB{
    //hiển thị  dữ liệu
    public function getAdProductType(){
        $sql="SELECT * FROM producttype ";
        $stm=$this->Connect()->prepare($sql);
        $stm->execute();
        $productType=$stm->fetchAll();
        return $productType;
    }
    public function checkProductTypeExists($ma_loaisp) {
        $sql = "SELECT COUNT(*) FROM producttype WHERE ma_loaisp = :ma_loaisp";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':ma_loaisp', $ma_loaisp);
        $stm->execute();
        return $stm->fetchColumn() > 0; 
    }
    public function deleteAdProductType($ma_loaisp){
        $sql ="DELETE FROM  producttype WHERE ma_loaisp='$ma_loaisp'";
        $this->Connect()->exec($sql);
    }
    public function insertAdProductType($ma_loaisp,$ten_loaisp,$mota_loaisp){
        $sql ="INSERT INTO producttype (ma_loaisp,ten_loaisp,mota_loaisp)";
        $sql.="VALUES ('$ma_loaisp','$ten_loaisp','$mota_loaisp')";
        $this->Connect()->exec($sql);
    }
    public function getAdProductTypeID($ma_loaisp){
        $sql="SELECT * FROM producttype WHERE ma_loaisp='$ma_loaisp'";
        $stm=$this->Connect()->prepare($sql);
        $stm->execute();
        $productTypeID=$stm->fetch();
        return $productTypeID;
    }
    public function updateAdProductType($ma_loaisp,$ten_loaisp,$mota_loaisp){
        $sql="UPDATE producttype SET ";
        $sql.="ten_loaisp ='$ten_loaisp', mota_loaisp ='$mota_loaisp'";
        $sql.="WHERE ma_loaisp='$ma_loaisp'";
        $this->Connect()->exec($sql);
    }
}